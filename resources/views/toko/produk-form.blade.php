@extends('base')

@section('body')
<div class="row">
<div class="col-sm-12">
<h1 class="text-center">{{$judul}}</h1>
{!! Form::model($produk, array('route'=>'postProduk', 'method'=>'post', 'class'=>'form-horizontal col-sm-8 col-sm-offset-2')) !!}
    {!! csrf_field() !!}
<div class="form-group">
    {!! Form::label('nama', 'Nama Item', array('class'=>'col-sm-3 control-label')) !!}
    <div class="col-sm-7">
    {!! Form::text('nama', null, array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('kategori_id', 'Kategori', array('class'=>'col-sm-3 control-label')) !!}
    <div class="col-sm-7">
    {!! Form::select('kategori_id', $kategoris, null, array('placeholder'=>'Pilih kategori', 'class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('deskripsi', 'Deskripsi', array('class'=>'col-sm-3 control-label')) !!}
    <div class="col-sm-7">
    {!! Form::textarea('deskripsi', null, array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('stock', 'Stock', array('class'=>'col-sm-3 control-label')) !!}
    <div class="col-sm-7">
    {!! Form::number('stock', null, array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('harga', 'Harga per Item', array('class'=>'col-sm-3 control-label')) !!}
    <div class="col-sm-7">
    {!! Form::number('harga', null, array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    <div class="text-right">
        {!! Form::submit('Simpan', array('class'=>'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}
</div>
</div>
@endsection
