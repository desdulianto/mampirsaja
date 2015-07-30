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
    <td>{{$item->nama}}</td>
    <td>{{$item->harga}}</td>
    <td>1</td>
    <td>{{$item->harga * 1}}</td>
    <td><a href="{{route('delCart', ['index'=>$index])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
@endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2">Total</td>
            <td>Total Banyak</td>
            <td>Total Harga</td>
        </tr>
    </tfoot>
</table>
<div class="text-right">
<a class="btn btn-primary btn-lg">Checkout</a>
</div>
@endsection
