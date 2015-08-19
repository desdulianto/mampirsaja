@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-12">
    <h1 class="text-center">Kirim Order</h1>
    <h2 class="text-center"><u>Invoice Order No. {{$order->id}}</u></h2>
    <h3 class="text-center">mampirsaja.com</h3>
    @if ($order->lunas())
    <div class="well well-lg"><h3 class="text-center">LUNAS</h3></div>
    @endif

    <p>Kepada Yth</p>
    <p>{{$order->nama}}</p>
    <p>{{$order->email}}</p>
    <p>{{$order->telepon}}</p>
    <p>{{$order->alamat}}</p>
    <p>{{$order->kota}}, {{$order->propinsi}}</p>
    <p>{{$order->kode_pos}}</p>

    <p>Tanggal Order: {{$order->tanggal}}</p>

    <table class="table">
        <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Harga Satuan</th>
            <th>Qty</th>
            <th>Berat (total)</th>
            <th>Sub Total</th>
        </tr>
        @foreach ($items as $item)
        <tr>
            <td>i</td>
            <td>{{$item->nama}}</td>
            <td>Rp. {{$item->harga}}</td>
            <td>{{$item->qty}}</td>
            <td>{{$item->qty * $item->berat}} kg</td>
            <td>Rp. {{$item->harga*$item->qty}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5">Total Belanja</td>
            <td colspan="5">Rp. {{$order->total_belanja($toko->id)}}</td>
        </tr>
        <tr>
            <td colspan="5">Biaya Kirim</td>
            <td colspan="5">Rp. {{$order->ongkir($toko->id)}}</td>
        </tr>
        <tr>
            <td colspan="5">Grand Total</td>
            <td colspan="5">Rp. {{$order->total($toko->id)}}</td>
        </tr>
    </table>
    {!! Form::open(array('route'=>array('postKirimOrder', 'id'=>$order->id), 'files'=>true, 'class'=>'form-horizontal col-sm-8 col-sm-offset-3')) !!}
    {!! csrf_field() !!}
    <div class="form-group">
        {!! Form::label('bukti_kirim', 'Bukti Pengiriman', array('class'=>'col-sm-3 control-label')) !!}
        <div class="col-sm-6">
        {!! Form::file('bukti_kirim', null, array('class'=>'form-control')) !!}
        </div>
        <div class="col-sm-3">
        {!! Form::submit('Konfirmasi Pengiriman', array('class'=>'form-control btn btn-primary')) !!}
        </div>
    </div>
    {!! Form::close() !!}
    </div>
</div>
@endsection
