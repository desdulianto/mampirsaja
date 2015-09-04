<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MessageIndex;
use App\Message;
use App\User;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $messages = Message::select(DB::raw('messages.*'))->
            join('message_indices', 'messages.thread', '=', 
            'message_indices.id')->
            where('message_indices.user1_id', $user->id)->
            orWhere('message_indices.user2_id', $user->id)->
            groupBy('thread')->get();

        return view('message.index', ['messages'=>$messages]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'subjek'        => 'required|max:255',
            'kepada'        => 'required|exists:users,username',
            'pesan'         => 'required|max:4096',
        ]);
    }


    public function compose(Request $request)
    {
        $user = $request->user();

        if ($request->isMethod('POST')) {
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                $this->throwValidationException(
                    $request, $validator
                );
            }

            $kepada = User::where('username', $request->kepada)->first();
            if ($kepada == null)
                return 'nulll';
            $thread = MessageIndex::create(['user1_id'=>$user->id,
                'user2_id'=>$kepada->id]);
            $message = new Message(['subjek'   =>$request->subjek,
                                    'dari_id'  =>$user->id,
                                    'kepada_id'=>$kepada->id,
                                    'waktu'    =>date("Y-m-d H:i:s"),
                                    'pesan'    =>$request->pesan]);
            $thread->messages()->save($message);

            return redirect()->route('messages')->with('alert-info', 'Pesan telah terkirim');
        } else {
            return view('message.compose');
        }
    }

    public function read(Request $request) {
        $thread = MessageIndex::where('id', $request->id)->first();
        $user = $request->user();

        if ($thread == null)
            return redirect()->route('messages')->with('alert-warning', 'Pesan tidak ditemukan');

        $messages = Message::where('thread', $thread->id)->orderBy('waktu', 'desc')->get();

        foreach($messages as $message) {
            if ($message->kepada_id == $user->id && ! $message->baca) {
                $message->baca = true;
                $message->save();
            }
        }

        return view('message.read', ['messages'=>$messages, 'thread_id'=>$thread->id]);
    }

    public function reply(Request $request)
    {
        $thread = MessageIndex::where('id', $request->id)->first();

        if ($thread == null)
            abort(404);

        $user = $request->user();

        if ($user->id == $thread->user1_id)
            $kepada_id = $thread->user2_id;
        else
            $kepada_id = $thread->user1_id;

        $kepada = User::where('id', $kepada_id)->first();

        if ($request->isMethod('post')) {
            $request->merge(['kepada'=>$kepada->username]);
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                $this->throwValidationException(
                    $request, $validator
                );
            }


            $message = new Message(['subjek'   =>$request->subjek,
                                    'dari_id'  =>$user->id,
                                    'kepada_id'=>$kepada_id,
                                    'waktu'    =>date("Y-m-d H:i:s"),
                                    'pesan'    =>$request->pesan]);
            $thread->messages()->save($message);

            return redirect()->route('messages')->with('alert-info', 'Pesan telah terkirim');
        } else {
            return view('message.reply', ['kepada'=>$kepada, 'thread_id'=>$thread->id]);
        }
    }
}
