<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pesanan;
use App\Threads;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

        return 'Order id: ' . $order_id . ' Toko id: ' . $toko_id;
    }
}
