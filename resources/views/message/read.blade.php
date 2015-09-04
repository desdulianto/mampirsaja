@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
        <a href="{{route('reply', ['id'=>$thread_id])}}" class="btn btn-primary pull-right">Balas</a>
            </div>
        </div>
        @foreach($messages as $message)
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Dari: {{$message->pengirim->username}}, Kepada: {{$message->penerima->username}}</div>
                <p>Subjek: {{$message->subjek}}</p>
                <p>Waktu: {{$message->waktu}}</p>
            </div>
            <div class="panel-body">
                <p>{{$message->pesan}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
