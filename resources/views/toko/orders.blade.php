@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-12">
        <h1 class="text-center">Daftar Pesanan</h1>
        <table class="table table-striped">
            <tr>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kode Pos</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Kota</th>
                <th>Propinsi</th>
                <th>Lunas</th>
                <th>Terkirim</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->tanggal}}</td>
                <td>{{$order->nama}}</td>
                <td>{{$order->alamat}}</td>
                <td>{{$order->kode_pos}}</td>
                <td>{{$order->telepon}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->kota}}</td>
                <td>{{$order->propinsi}}</td>
                <td>{{$order->lunas() ? 'Lunas' : 'Belum Lunas'}}</td>
                <td>{{$order->terkirim ? 'Terkirim' : 'Belum Tekirim' }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
