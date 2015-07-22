@extends('base')

@section('body')
<div class="row">
<div class="col-sm-offset-3 col-sm-6 panel panel-default">
<div class="panel-body">
    <h1 class="text-center">Registrasi</h1>
    <div class="text-center">
        <a href="{{route('register', ['role'=>'pembeli'])}}" class="btn btn-primary btn-lg">Pembeli</a>
        <a href="{{route('register', ['role'=>'penjual'])}}" class="btn btn-primary btn-lg">Penjual</a>
    </div>
</div>
</div>
</div>
@endsection
