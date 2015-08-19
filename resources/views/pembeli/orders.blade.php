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
            <tr class="{{$order->konfirmasi() ? ($order->terkirim ? 'success' : 'info') : 'warning'}}">
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
                <td>Rp. {{$order->total_belanja()}}</td>
                <td>Rp. {{$order->ongkir()}}</td>
                <td>Rp. {{$order->total()}}</td>
                <td>@if (! $order->konfirmasi())
                    <a class="btn btn-primary" role="button" href="{{route('confirmPembayaran', ['id'=>$order->id])}}">Konfirmasi</a>
                    @elseif (! $order->lunas())
                    Menunggu penge-check-an
                    @else
                    <span class="glyphicon glyphicon-ok"></span>
                    @endif
                <td>{{$order->items_terkirim()}} / {{$order->banyak_items()}}
                    @if ($order->items_terkirim() > 0)
                    <br><a href="{{route('resiPengiriman', ['id'=>$order->id])}}">Resi Pengiriman</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
