@extends('base')

@section('body')
<div class="row">
<div class="col-sm-12">
<h1 class="text-center">Toko</h1>
{!! Form::model($toko, array('route'=>'postToko', 'method'=>'post', 'class'=>'form-horizontal col-sm-8 col-sm-offset-2')) !!}
    {!! csrf_field() !!}
<div class="form-group">
    {!! Form::label('nama', 'Nama Toko', array('class'=>'col-sm-3 control-label')) !!}
    <div class="col-sm-7">
    {!! Form::text('nama', null, array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('nama_bank', 'Nama Bank', array('class'=>'col-sm-3 control-label')) !!}
    <div class="col-sm-7">
    {!! Form::text('nama_bank', null, array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('atas_nama', 'Atas Nama', array('class'=>'col-sm-3 control-label')) !!}
    <div class="col-sm-7">
    {!! Form::text('atas_nama', null, array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('nomor_rekening', 'Nomor Rekening', array('class'=>'col-sm-3 control-label')) !!}
    <div class="col-sm-7">
    {!! Form::text('nomor_rekening', null, array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('propinsi', 'Provinsi', array('class'=>'col-sm-3 control-label')) !!}
    <div class="col-sm-7">
    {!! Form::select('propinsi', $propinsi, null, array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('kota', 'Kota', array('class'=>'col-sm-3 control-label')) !!}
    <div class="col-sm-7">
    {!! Form::select('kota', $kota, null, array('class'=>'form-control')) !!}
    </div>
</div>
@if (count($toko->pesanan_items()) == 0)
<div class="form-group">
    <div class="text-right">
        {!! Form::submit('Simpan', array('class'=>'btn btn-default')) !!}
    </div>
</div>
@endif
{!! Form::close() !!}
</div>
</div>
@endsection
