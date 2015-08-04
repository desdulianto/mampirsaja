@extends('base')

@section('body')
<div class="row">
<div class="col-sm-offset-4 col-sm-4 panel panel-default">
<div class="panel-body">
<form method="POST" action="/auth/login" class="form-horizontal">
    {!! csrf_field() !!}
    <h1 class="text-center">Login</h1>
    <div class="form-group">
        <label for="username" class="col-sm-3 control-label">Username</label>
        <div class="col-sm-9">
        <input type="text" name="username" value="{{ old('username') }}" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-9">
        <input type="password" name="password" id="password" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-8 col-sm-4">
            <div class="checkbox">
            <input type="checkbox" name="remember"> Remember Me
            </div>
        </div>
    </div>
    <p class="text-right"><a href="{{route('resetPassword')}}">Lupa Password</a></p>
    <p class="text-right"><a href="{{route('register-role')}}">Belum daftar, yuk daftar!</a></p>
    <div class="form-group">
        <div class="col-sm-offset-8 col-sm-4">
            <button type="submit" class="btn btn-default">Login</button>
        </div>
    </div>
</form>
</div>
</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$("[name='username']").focus();
</script>
@endsection
