@extends ('base')

@section('body')
<div class="row">
    <div class="col-sm-12">
        <h1 class="text-center">Support untuk order no. {{$order->id}}</h1>
    </div>
    <table class="table">
        <tr>
            <th>Toko</th>
            <th>Items</th>
            <th>Support Thread</th>
        </tr>
        @foreach($order->daftar_toko() as $toko)
        <tr>
            <td>{{$toko->nama}}</td>
            <td>
            @foreach($order->items_per_toko($toko->id) as $item)
                {{$item->nama}} ({{$item->qty}}), 
            @endforeach
            </td>
            <td>
                <a href="{{route('supportPost', ['order_id'=>$order->id, 'toko_id'=>$toko->id])}}" class="btn btn-default">Posts</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
