@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-12">
        <h1 class="text-center">Halaman Support</h1>
        <h2 class="text-center">Order No. {{$order->id}}</h2>
        <h2 class="text-center">Toko {{$toko->nama}}</h2>

        {!! Form::open(array('route'=>array('postNewSupportPost', 'order_id'=>$order->id, 'toko_id'=>$toko->id), 'files'=>true, 'class'=>'form-horizontal col-sm-8 col-sm-offset-2')) !!}
    {!! csrf_field() !!}

            <div class="form-group">
            <label for="subjek" class="col-sm-2">Subjek</label>
            <div class="col-sm-10">
                <input type="text" name="subjek" id="subjek" class="form-control">
            </div>
            </div>
            <div class="form-group">
            <label for="pesan" class="col-sm-2">Pesan</label>
            <div class="col-sm-10">
                <textarea name="pesan" id="pesan" class="form-control" rows="5"></textarea>
            </div>
            </div>
            <div class="form-group">
            <label for="lampiran" class="col-sm-2">Lampiran</label>
            <div class="col-sm-10">
                {!! Form::file('lampiran', null, array('class'=>'form-control')) !!}
            </div>
            </div>
            <div class="col-sm-3 col-sm-offset-9">
            <a href="" class="btn btn-primary">Tutup Ticket</a>
            <input type="submit" value="Kirim" class="btn btn-default">
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
