@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title text-center">User {{$user->nama_lengkap()}}</h1>
            </div>
            <div class="panel-body">
                <div class="row">
                <div class="col-sm-5">
                <dl class="dl-horizontal">
                    <dt>Nama Lengkap</dt>
                    <dd>{{$user->nama_lengkap()}}</dd>
                    <dt>Username</dt>
                    <dd>{{$user->username}}</dd>
                    <dt>Gender</dt>
                    <dd>{{$user->gender}}</dd>
                    <dt>role</dt>
                    <dd>{{$user->role}}</dd>
                    <dt>Email</dt>
                    <dd>{{$user->email}}</dd>
                    <dt>Registered</dt>
                    <dd>{{$user->registered()}}</dd>
                    <dt>Last Login</dt>
                    <dd>{{$user->latest_login()}}</dd>
                </dl>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
