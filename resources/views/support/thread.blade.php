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
        @else
        <a href="{{route('replySupportPost', ['order_id'=>$order->id, 'toko_id'=>$toko->id])}}" class="btn btn-default">Balas</a>
        @endif
        </div>
        @if ($thread)
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
                <td>{{$post->user->nama_lengkap()}}</td>
                <td>{{$post->subjek}}</td>
                <td>{{$post->pesan}}</td>
                @if ($post->lampiran != null)
                <td><a href="/uploads/lampiran/{{$post->lampiran}}">Lampiran</a></td>
                @endif
            </tr>
            @endforeach
        </table>
        </div>
        </div>
        @if ($thread->status == "closed")
        <div class="alert alert-success">Status: Closed</p>
        @endif
        @endif
    </div>
</div>
@endsection
