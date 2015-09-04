@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-12">
        <form method="post" action="{{route('postCompose')}}" class="form-horizontal">
            {!! csrf_field() !!}
            <div class="form-group">
            <label for="kepada" class="col-sm-2">Kepada</label>
            <div class="col-sm-10">
                <input type="text" name="kepada" id="kepada" class="form-control" value="{{old('kepada')}}">
            </div>
            </div>

            <div class="form-group">
            <label for="subjek" class="col-sm-2">Subjek</label>
            <div class="col-sm-10">
                <input type="text" name="subjek" id="subjek" class="form-control" value="{{old('subjek')}}">
            </div>
            </div>
            <div class="form-group">
            <label for="pesan" class="col-sm-2">Pesan</label>
            <div class="col-sm-10">
                <textarea name="pesan" id="pesan" class="form-control" rows="5">{{old('pesan')}}</textarea>
            </div>
            </div>

            <div class="col-sm-3 col-sm-offset-9">
            <input type="submit" value="Kirim" class="btn btn-default">
            </div>
        </form>
    </div>
</div>
@endsection
