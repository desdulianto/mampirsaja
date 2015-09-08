<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $users = User::get();
        return view('admin.users', ['users'=>$users]);
    }

    public function detail(Request $request) {
        $user = User::where('username', $request->username)->first();

        if ($user == null)
            abort(404);

        return view('admin.user', ['user'=>$user]);
    }
}
