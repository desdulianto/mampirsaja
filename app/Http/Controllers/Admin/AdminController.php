<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pesanan;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function orders(Request $request) {
        $orders = Pesanan::get();

        return view('admin.orders', ['orders'=>$orders]);
    }
}
