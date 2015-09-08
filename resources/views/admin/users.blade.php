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
            <th>Aksi</th>
            </tr>
            @foreach ($users as $user)
            <tr>
            <td>{{$user->nama_lengkap()}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->status()}}</td>
            <td>{{$user->registered()}}</td>
            <td>@if ($user->role != 'admin')
                <a href="" title="Block user"><span class="glyphicon glyphicon-remove"></span></a>
                @endif
            </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
