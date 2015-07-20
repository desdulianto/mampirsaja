@extends('base')

@section('body')
<div class="row">

<div class="col-sm-offset-4 col-sm-4 panel panel-default">
<div class="panel-body">
    <h1 class="text-center">Lupa Password</h1>
<form method="POST" action="/password/email" class="form-horizontal">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
        </div>
    </div>

    <p class="text-right"><a href="{{route('register')}}">Belum daftar, yuk daftar!</a></p>
    <div class="form-group">
        <div class="col-sm-offset-6 col-sm-6">
        <button type="submit" class="btn btn-default">
            Reset Password
        </button>
        </div>
    </div>
</form>
</div>
</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$("[name='email']").focus();
</script>
@endsection
