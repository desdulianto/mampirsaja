@extends('base')

@section('body')
<div class="row">
<div class="col-sm-offset-3 col-sm-6 panel panel-default">
<div class="panel-body">
<form method="POST" action="/auth/register" class="form-horizontal">
    {!! csrf_field() !!}
    <h1 class="text-center">Register</h1>
    <div class="form-group">
        <label for="nama_depan" class="col-sm-3 control-label">Nama Depan</label>
        <div class="col-sm-6">
        <input type="text" name="nama_depan" value="{{ old('nama_depan') }}" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="nama_belakang" class="col-sm-3 control-label">Nama Belakang</label>
        <div class="col-sm-6">
        <input type="text" name="nama_belakang" value="{{ old('nama_belakang') }}" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label for="gender" class="col-sm-3 control-label">Gender</label>
        <div class="controls col-sm-6 form-inline">
            <div class="radio">
                <label>
                    <input type="radio" name="gender" id="gender_female" value="female" checked> Female
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" id="gender_male" value="male"> Male
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-6">
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-5">
        <input type="password" name="password" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="col-sm-3 control-label">Confirm Password</label>
        <div class="col-sm-5">
        <input type="password" name="password_confirmation" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label for="username" class="col-sm-3 control-label">Username</label>
        <div class="col-sm-6">
        <input type="text" name="username" value="{{old('username')}}"class="form-control">
        </div>
    </div>

    <p>Dengan mengklik Register, secara otomatis Anda telah menyetujui <a href="#">Term of Use</a> dan <a href="#">Kebijakan Privasi</a></p>

    <div class="form-group">
        <div class="col-sm-offset-10 col-sm-2">
            <button type="submit" class="btn btn-default">Register</button>
        </div>
    </div>

</form>
</div>
</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$("[name='nama_depan']").focus();
</script>
@endsection
