@extends('base')

@section('body')
<div class="row">
<div class="col-sm-12">
@foreach ($produks as $produk)
<div class="col-sm-4 col-md-3">
    <div class="thumbnail">
        <div class="caption">
            <p>{{$produk->nama}}</p>
            <p class="text-muted">{{$produk->kategori->name}}</p>
        </div>
        <p>{{$produk->deskripsi}}</p>
        <p>{{$produk->harga}}</p>
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
