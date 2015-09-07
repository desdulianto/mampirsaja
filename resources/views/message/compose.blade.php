@extends('base')

@section('style')
<link href="{{ URL::asset('assets/js/select2/select2.css')}}" rel="stylesheet">
@endsection

@section('body')
<div class="row">
    <div class="col-sm-12">
        <form method="post" action="{{route('postCompose')}}" class="form-horizontal">
            {!! csrf_field() !!}
            <div class="form-group">
            <label for="kepada" class="col-sm-2">Kepada</label>
            <div class="col-sm-10">
                {!! Form::select('kepada', $users, null, array('class'=>'select2', 'id'=>'kepada')) !!}
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

@section('js')
<script type="text/javascript" src="{{URL::asset('assets/js/select2/select2.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".select2").select2();
});
</script>
@endsection
