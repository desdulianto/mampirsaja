@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-12">
<h1 class="text-center">Account Configuration for {{Auth::user()->username}}</h1>
        {!! Form::model($account, array('url'=>route('ubahInfo'), 'method'=>'post', 'class'=>'form-horizontal col-sm-8 col-sm-offset-2', 'files'=>true)) !!}
            {!! csrf_field() !!}
        <div class="form-group">
            {!! Form::label('nama_depan', 'Nama Depan', array('class'=>'col-sm-3 control-label')) !!}
            <div class="col-sm-7">
            {!! Form::text('nama_depan', null, array('class'=>'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('nama_belakang', 'Nama Belakang', array('class'=>'col-sm-3 control-label')) !!}
            <div class="col-sm-7">
            {!! Form::text('nama_belakang', null, array('class'=>'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('username', 'User Name', array('class'=>'col-sm-3 control-label')) !!}
            <div class="col-sm-7">
                <p class="form-control-static">{{$account->username}}</p>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('foto', 'Foto', array('class'=>'col-sm-3 control-label')) !!}
            <div class="col-sm-7">
            @if ($account->info != null && $account->info->foto != null)
            <div class="row">
            <img src="/uploads/{{$account->info->foto}}" width="480">
            </div>
            @endif
            {!! Form::file('foto', null, array('class'=>'form-control')) !!}
            <div class="checkbox">
            <label>
            {!! Form::checkbox('hapus_foto', null, false) !!} Hapus Foto
            </label>
            </div>
            </div>
        </div>
        <div class="form-group">
        {!! Form::label('gender', 'Gender', array('class'=>'col-sm-3 control-label')) !!}
        <div class="controls col-sm-6 form-inline">
            <div class="radio">
                <label>
                    {!! Form::radio('gender', 'female') !!} Female
                </label>
            </div>
            <div class="radio">
                <label>
                    {!! Form::radio('gender', 'male') !!} Male
                </label>
            </div>
        </div>
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email', array('class'=>'col-sm-3 control-label')) !!}
            <div class="col-sm-7">
            {!! Form::text('email', null, array('class'=>'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('alamat', 'Alamat', array('class'=>'col-sm-3 control-label')) !!}
            <div class="col-sm-7">
            @if ($account->info != null)
            {!! Form::text('alamat', $account->info->alamat, array('class'=>'form-control')) !!}
            @else
            {!! Form::text('alamat', null, array('class'=>'form-control')) !!}
            @endif
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('kota', 'Kota', array('class'=>'col-sm-3 control-label')) !!}
            <div class="col-sm-7">
            @if ($account->info != null)
            {!! Form::text('kota', $account->info->kota, array('class'=>'form-control')) !!}
            @else
            {!! Form::text('kota', null, array('class'=>'form-control')) !!}
            @endif
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('propinsi', 'Propinsi', array('class'=>'col-sm-3 control-label')) !!}
            <div class="col-sm-7">
            @if ($account->info != null)
            {!! Form::select('propinsi', $propinsi, $account->info->propinsi, array('class'=>'form-control')) !!}
            @else
            {!! Form::select('propinsi', $propinsi, null, array('class'=>'form-control')) !!}
            @endif
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('kode_pos', 'Kode Pos', array('class'=>'col-sm-3 control-label')) !!}
            <div class="col-sm-7">
            @if ($account->info != null)
            {!! Form::text('kode_pos', $account->info->kode_pos, array('class'=>'form-control')) !!}
            @else
            {!! Form::text('kode_pos', null, array('class'=>'form-control')) !!}
            @endif
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('telepon', 'Telepon', array('class'=>'col-sm-3 control-label')) !!}
            <div class="col-sm-7">
            @if ($account->info != null)
            {!! Form::text('telepon', $account->info->telepon, array('class'=>'form-control')) !!}
            @else
            {!! Form::text('telepon', null, array('class'=>'form-control')) !!}
            @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-8">
            {!! Form::submit('Simpan', array('class'=>'btn btn-primary')) !!}
            </div>
        </div>
        {!! Form::close() !!}
        <form method="post" action="{{route('ubahPassword')}}" class="form-horizontal col-sm-8 col-sm-offset-2">
            {!! csrf_field() !!}
        <div class="form-group">
            {!! Form::label('old_password', 'Password Sekarang', array('class'=>'col-sm-3 control-label')) !!}
            <div class="col-sm-7">
            {!! Form::password('old_password', null, array('class'=>'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password Baru', array('class'=>'col-sm-3 control-label')) !!}
            <div class="col-sm-7">
            {!! Form::password('password', null, array('class'=>'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('confirm_password', 'Konfirmasi Password', array('class'=>'col-sm-3 control-label')) !!}
            <div class="col-sm-7">
            {!! Form::password('confirm_password', null, array('class'=>'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-8">
            {!! Form::submit('Ubah Password', array('class'=>'btn btn-danger')) !!}
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
