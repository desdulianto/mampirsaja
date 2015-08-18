@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-12">
        <h1 class="text-center">Daftar Pesanan</h1>
        <table class="table table-striped">
            <tr>
                <th>Tanggal</th>
                <th>No. Order</th>
                <th>Pembeli</th>
                <th>Total Belanja</th>
                <th>Ongkos Kirim</th>
                <th>Total</th>
                <th>Lunas</th>
                <th>Terkirim</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->tanggal}}</td>
                <td>{{$order->id}}</td>
                <td><address>
                    {{$order->nama}}<br>
                    {{$order->alamat}}<br>
                    {{$order->telepon}}<br>
                    {{$order->email}}<br>
                    {{$order->kode_pos}}<br>
                    {{$order->kota}},
                    {{$order->propinsi}}
                    </address>
                </td>
                <td>Rp. {{$order->total_belanja($toko_id)}}</td>
                <td>Rp. {{$order->ongkir($toko_id)}}</td>
                <td>Rp. {{$order->total($toko_id)}}</td>
                <td><span class="glyphicon glyphicon-{{$order->lunas() ? 'ok' : 'remove'}}"></span></td>
                <td><span class="glyphicon glyphicon-{{$order->terkirim ? 'ok' : 'remove'}}"></span></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
