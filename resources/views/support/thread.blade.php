@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-12">
        <h1 class="text-center">Halaman Support</h1>
        <h2 class="text-center">Order No. {{$order->id}}</h2>
        <h2 class="text-center">Toko {{$toko->nama}}</h2>
        <div class="text-right">
        @if (! $thread)
        <a href="{{route('newSupportPost', ['order_id'=>$order->id, 'toko_id'=>$toko->id])}}" class="btn btn-default">Pesan Baru</a>
        @endif
        </div>
        <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
        <table class="table">
            <tr>
                <th>Tanggal</th>
                <th>Dari</th>
                <th>Subjek</th>
                <th>Pesan</th>
            </tr>
            @foreach($thread->posts as $post)
            <tr>
                <td>{{$post->tanggal}}</td>
                <td>{{$post->dari}}</td>
                <td>{{$post->subjek}}</td>
                <td>{{$post->pesan}}</td>
            </tr>
            @endforeach
        </table>
        </div>
        </div>
    </div>
</div>
@endsection
