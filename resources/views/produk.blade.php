@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-4">
        <div class="thumbnail">
        <img src="/uploads/{{$produk->foto}}" class="img-rounded">
        </div>
    </div>
    <div class="col-sm-8">
        <h1>{{$produk->nama}}</h1>
        <dl class="dl-horizontal">
            <dt>Kategori</dt>
            <dd>{{$produk->kategori->name}}</dd>
            <dt>Deskripsi</dt>
            <dd>{{$produk->deskripsi}}</dd>
            <dt>Harga</dt>
            <dd>Rp. {{$produk->harga}}</dd>
            <dt>Berat</dt>
            <dd>{{$produk->berat}} kg</dd>
            <dt>Stock</dt>
            @if ($produk->stockTersedia())
            <dd>{{$produk->stock}}</dd>
            @else
            <dd>Habis</dd>
            @endif
            <dt>Toko</dt>
            <dd>{{$produk->toko->nama}}</dd>
        </dl>
        @if ((Auth::check() && Auth::user()->role != 'admin' &&
                               Auth::user()->role != 'penjual') ||
             ! Auth::check())
        <a href="{{route('beliProduk', ['produk'=>$produk->id])}}" type="button" class="btn btn-primary">
        <span class="glyphicon glyphicon-shopping-cart">Masukkan ke keranjang</span>
        </a>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
        <h2>Review Produk</h2>
        <form method="post" action="{{route('reviewProduk', ['id'=>$produk->id])}}" class="form-horizontal col-sm-12">
            {!! csrf_field() !!}
            <div class="col-sm-12">
            <div class="form-group">
            <textarea name="review" placeholder="Tuliskan review..." class="form-control"></textarea>
            </div>
            </div>
            <div class="form-group">
                <div class="text-right">
                <input type="submit" value="Kirim" class="btn btn-default">
                </div>
            </div>
        </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
        <div class="list-group">
        @foreach ($produk->reviews as $review)
            <div class="well">
            <h4 class="list-group-item-heading">
            @if ($review->user == null)
                anonymous
            @else
                {{$review->user->nama_lengkap()}}
            @endif
            @ {{$review->tanggal}}
            </h4>
            <p class="list-group-item-text">{{$review->review}}</p>
            </div>
        @endforeach
            </div>
        </div>
        </div>
    </div>

</div>
@endsection
