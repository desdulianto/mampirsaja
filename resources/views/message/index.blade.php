@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-12">
        <a href="{{route('compose')}}" class="btn btn-primary pull-right">Tulis Pesan</a>
        <table class="table-striped table table-bordered">
            <tr>
                <th>Dari</th>
                <th>Kepada</th>
                <th>Waktu</th>
                <th>Subjek</th>
            </tr>
            @foreach ($messages as $message)
            <tr>
            @if (($message->penerima->username == Auth::user()->username) 
                && ! $message->baca)
                <td><strong>{{$message->pengirim->username}}</strong></td>
                <td><strong>{{$message->penerima->username}}</strong></td>
                <td><strong>{{$message->waktu}}</strong></td>
                <td><strong><a href="{{route('read', ['id'=>$message->index->id])}}">{{$message->subjek}}</a></strong></td>
            @else
                <td>{{$message->pengirim->username}}</td>
                <td>{{$message->penerima->username}}</td>
                <td>{{$message->waktu}}</td>
                <td><a href="{{route('read', ['id'=>$message->index->id])}}">{{$message->subjek}}</a></td>
            @endif
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
