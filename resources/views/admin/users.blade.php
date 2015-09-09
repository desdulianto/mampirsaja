@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-12">
        <h1 class="text-center">Daftar User</h1>
        <table class="table table-striped">
            <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Tanggal Register</th>
            <th>Terakhir Login</th>
            <th>Aksi</th>
            </tr>
            @foreach ($users as $user)
            <tr>
            <td><a href="{{route('user', ['username'=>$user->username])}}">{{$user->nama_lengkap()}}</a></td>
            <td><a href="{{route('user', ['username'=>$user->username])}}">{{$user->username}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->status()}}</td>
            <td>{{$user->registered()}}</td>
            <td>{{$user->latest_login()}}</td>
            <td>@if ($user->role != 'admin')
                @if ($user->status() == 'Aktif')
                <a href="{{route('blockUser', ['username'=>$user->username])}}" title="Block user"><span class="glyphicon glyphicon-remove"></span></a>
                @else
                <a href="{{route('unblockUser', ['username'=>$user->username])}}" title="Unblock user"><span class="glyphicon glyphicon-ok"></span></a>
                @endif
                @endif
            </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
