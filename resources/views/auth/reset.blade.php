@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-12">
        <h1 class="text-center">Reset Password</h1>
        <form method="POST" action="{{route('postResetPasswordToken')}}" class="form-horizontal col-sm-8 col-sm-offset-2">
            {!! csrf_field() !!}
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label class="col-sm-3 control-label" for="email">Email</label>
                <div class="col-sm-9">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="password">Password</label>
                <div class="col-sm-9">
                <input type="password" name="password" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="password_confirmation">Confirm Password</label>
                <div class="col-sm-9">
                <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-9">
                <button type="submit" class="btn btn-default form-control">
                    Reset Password
                </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
