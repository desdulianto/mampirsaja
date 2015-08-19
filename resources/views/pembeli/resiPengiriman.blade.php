@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-12">
        <h1 class="text-center">Order No. {{$order->id}}</h1>
        <h2 class="text-center">mampisaja.com</h2>
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
            <th>Qty</th>
            <th>Berat (total)</th>
            <th>Bukti Kirim</th>
        </tr>
        @foreach ($order->items as $item)
        <tr>
            <td>i</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->qty}}</td>
            <td>{{$item->qty * $item->berat}} kg</td>
            <td>
                @if ($item->bukti_kirim != null)
                <a href="/uploads/bukti/{{$item->bukti_kirim}}">Resi</a>
                @else
                Belum dikirim
                @endif
            </td>
        </tr>
        @endforeach
    </table>

    </div>
</div>
@endsection
