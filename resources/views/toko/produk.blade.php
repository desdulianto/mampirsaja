@extends('base')

@section('body')
<div class="row">
<div class="col-sm-12">
@foreach ($produks as $produk)
<div class="col-sm-4 col-md-3">
    <div class="thumbnail">
        @if ($produk->foto)
        <img src="/uploads/{{$produk->foto}}">
        @else
        <img src="{{URL::asset('assets/images/noimage.svg')}}">
        @endif
        <div class="caption">
            <p><a href ="{{route('detailProduk', ['id'=>$produk->id])}}">{{$produk->nama}}</a></p>
            <p class="text-muted">{{$produk->kategori->name}}</p>
            <p>{{$produk->deskripsi}}</p>
            <p>Harga: {{$produk->harga}}</p>
            <p>Stock: {{$produk->stock}}</p>
            @if (count($produk->pesanan_item) == 0)
            <a href="{{route('produkDelete', ['id'=>$produk->id])}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
            @endif
        </div>
    </div>
</div>
@endforeach
<div class="col-sm-6 col-md-3">
    <div class="thumbnail">
        <div class="caption">
            <a href="{{route('produkNew')}}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span> Tambah Produk Baru</a>
        </div>
    </div>
</div>

</div>
</div>
@endsection
