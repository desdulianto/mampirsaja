@extends('base')

@section('body')
<table class="table table-striped table-hover table-condensed">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Harga Satuan</th>
            <th>Banyak</th>
            <th>Sub Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
@foreach ($cart as $index => $item)
    <tr>
    <td>{{$item['produk']->nama}}</td>
    <td>{{$item['produk']->harga}}</td>
    <td>{{$item['qty']}} <a href="{{route('decCartItem', ['index'=>$index])}}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-minus"></span></a> <a href="{{route('incCartItem', ['index'=>$index])}}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span></a></td>
    <td>{{$item['produk']->harga * $item['qty']}}</td>
    <td><a href="{{route('delCart', ['index'=>$index])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
@endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2">Total</td>
            <td>{{$total_items}}</td>
            <td>{{$total}}</td>
        </tr>
    </tfoot>
</table>
<div class="text-right">
<a class="btn btn-primary btn-lg">Checkout</a>
</div>
@endsection
