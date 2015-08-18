<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PembayaranController extends Controller
{
    public function confirm(Request $request) {
        $id = $request->id;
        return 'confirmasi pembayaran ' . $id;
    }
}
