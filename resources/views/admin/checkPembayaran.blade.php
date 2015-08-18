@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-12">
        <h1 class="text-center">Konfirmasi Pembayaran</h1>
    <h2 class="text-center"><u>Invoice Order No. {{$order->id}}</u></h2>
    <h3 class="text-center">mampirsaja.com</h3>

    <p>Kepada Yth</p>
    <p>{{$order->nama}}</p>
    <p>{{$order->email}}</p>
    <p>{{$order->telepon}}</p>
    <p>{{$order->alamat}}</p>
    <p>{{$order->kode_pos}}</p>
    <p>{{$order->kota}}</p>
    <p>{{$order->propinsi}}</p>

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
        @foreach ($order->items as $item)
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
            <td colspan="5">Rp. {{$order->total_belanja()}}</td>
        </tr>
        <tr>
            <td colspan="5">Biaya Kirim</td>
            <td colspan="5">Rp. {{$order->ongkir()}}</td>
        </tr>
        <tr>
            <td colspan="5">Grand Total</td>
            <td colspan="5">Rp. {{$order->total()}}</td>
        </tr>
    </table>
    <p>Bukti Pembayaran</p>
    <form method="post" action="{{route('postCheckPembayaran', ['id'=>$order->id])}}" class="form-horizontal">
    {!! csrf_field() !!}
    <img height="480" src="/uploads/bukti/{{$order->pembayaran->bukti}}">
    <p>Tanggal: {{$order->pembayaran->tanggal}}</p>
        <input type="submit" value="Konfirmasi Pembayaran" class="btn btn-primary">
    </form>
    </div>
</div>
@endsection
