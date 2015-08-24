<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;

use App\Pesanan;
use App\Toko;
use App\Threads;
use App\Posts;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function uniqueFilename($name, $ext) {
        $output = $name;
        $basename = basename($name, '.' . $ext);
        $i = 2;
        while(File::exists('uploads/lampiran' . '/' . $output)) {
            $output = $basename . $i . '.' . $ext;
            $i ++;
        }
        return $output;
    }


    public function listSupportPosts(Request $request) {
        $order_id = $request->id;
        $order = Pesanan::where('id', $order_id)->first();

        if ($order->count() == 0)
            abort(404);

        return view('support.list', ['order'=>$order]);
    }

    public function supportPosts(Request $request) {
        $order_id = $request->order_id;
        $toko_id  = $request->toko_id;

        $order = Pesanan::where('id', $order_id)->first();
        $toko = Toko::where('id', $toko_id)->first();

        if (! $order)
            abort(404);

        if (! $toko)
            abort(404);

        $thread = $order->get_thread($toko_id);

        return view('support.thread', ['order'=>$order, 'toko'=>$toko, 'thread'=>$thread]);
    }


    public function newPost(Request $request) {
    $order_id = $request->order_id;
        $toko_id  = $request->toko_id;

        $order = Pesanan::where('id', $order_id)->first();
        $toko = Toko::where('id', $toko_id)->first();

        if (! $order)
            abort(404);

        if (! $toko)
            abort(404);

        $file = null;
        if ($request->isMethod('post')) {
            $subjek = $request->subjek;
            $pesan  = $request->pesan;

            if ($request->hasFile('lampiran')) {
                if ($request->file('lampiran')->isValid()) {
                    $dstPath = 'uploads/lampiran';
                    $name = $request->file('lampiran')->getClientOriginalName();
                    $ext = $request->file('lampiran')->getClientOriginalExtension();
                    $file = $this->uniqueFilename($name, $ext);
                    $request->file('lampiran')->move($dstPath, $file);
                }
            }
            $thread = Threads::create([
                'pembeli_id' => $request->user()->id,
                'penjual_id' => $toko->user->id,
                'toko_id'    => $toko->id,
                'pesanan_id' => $order->id,
                'status'     => 'open'
                ]);
            $post = new Posts(['tanggal'   =>date('Y-m-d'),
                               'dari'      =>$request->user()->id,
                               'ref_post'  => null,
                               'subjek'    =>$subjek,
                               'pesan'     =>$pesan,
                               'lampiran'  =>$file]);
            $thread->posts()->save($post);
            return redirect()->route('supportPost', ['order_id'=>$order->id, 'toko_id'=>$toko_id])->with('alert-info', 'Pesan telah terkirim');
        } else 
            return view('support.new', ['order'=>$order, 'toko'=>$toko]);
    }

    public function replyPost(Request $request) {
        $order_id = $request->order_id;
        $toko_id  = $request->toko_id;

        $order = Pesanan::where('id', $order_id)->first();
        $toko = Toko::where('id', $toko_id)->first();

        if (! $order)
            abort(404);

        if (! $toko)
            abort(404);

        $file = null;
        $thread = $order->get_thread($toko->id);
        if ($request->isMethod('post')) {
            $subjek = $request->subjek;
            $pesan  = $request->pesan;

            if ($request->hasFile('lampiran')) {
                if ($request->file('lampiran')->isValid()) {
                    $dstPath = 'uploads/lampiran';
                    $name = $request->file('lampiran')->getClientOriginalName();
                    $ext = $request->file('lampiran')->getClientOriginalExtension();
                    $file = $this->uniqueFilename($name, $ext);
                    $request->file('lampiran')->move($dstPath, $file);
                }
            }
            $post = new Posts(['tanggal'   =>date('Y-m-d'),
                               'dari'      =>$request->user()->id,
                               'ref_post'  => $thread->id,
                               'subjek'    =>$subjek,
                               'pesan'     =>$pesan,
                               'lampiran'  =>$file]);
            $thread->status = 'open';
            $thread->posts()->save($post);
            $thread->save();
            return redirect()->route('supportPost', ['order_id'=>$order->id, 'toko_id'=>$toko_id])->with('alert-info', 'Pesan telah terkirim');
        } else
            return view('support.reply', ['order'=>$order, 'toko'=>$toko]);
    }

    public function tutupTicket(Request $request) {
        $thread = Threads::where('pesanan_id', $request->order_id)->where('toko_id', $request->toko_id)->first();

        if (! $thread)
            abort(404);

        $thread->status = 'closed';
        $thread->save();

        return redirect()->route('supportPost', ['order_id'=>$thread->pesanan_id, 'toko_id'=>$thread->toko_id])->with('alert-info', 'Ticket Support telah ditutup');
    }
}
