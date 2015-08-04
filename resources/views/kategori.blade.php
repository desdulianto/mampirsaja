@extends('base')

@section('body')
<div class="row">
<div class="col-sm-12">
@if ($produks->isEmpty())
    <p>Tidak ada produk!</p>
@else
    @foreach ($produks as $produk)
    <div class="col-sm-4 col-md-3">
        <div class="thumbnail">
            <img src="/uploads/{{$produk->foto}}">
            <div class="caption">
                <p>{{$produk->nama}}</p>
                <p class="text-muted">{{$produk->kategori->name}}</p>
                <p>{{$produk->deskripsi}}</p>
                <p>{{$produk->harga}}</p>
            </div>
            <div class="text-right">
            <a href="{{route('beliProduk', ['produk'=>$produk->id])}}" type="button" class="btn btn-primary">
                <span class="glyphicon glyphicon-shopping-cart">Masukkan ke keranjang</span>
            </a>
            </div>
        </div>
    </div>
    @endforeach
    </div>
    </div>
    <div class="row">
    <div class="col-sm-12">
    <p>Jumlah item: {{$produks->count()}}</p>
@endif
</div>
</div>
@endsection
