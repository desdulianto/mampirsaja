@extends('base')

@section('body')
<div class="row">
<div class="col-sm-12">
{!! Form::model($cart, array('route'=>'checkoutConfirm', 'method'=>'post', 'class'=>'form-horizontal col-sm-8 col-sm-offset-2')) !!}
    {!! csrf_field() !!}
    <h1 class="text-center">Alamat Pengiriman</h1>
    <div class="form-group">
        <label class="col-sm-3 control-label">Nama</label>
        <div class="col-sm-5">
            <input type="text" name="nama" id="nama" class="form-control" value="{{old('nama')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Alamat</label>
        <div class="col-sm-9">
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{old('alamat')}}">
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('kota', 'Kota', array('class'=>'col-sm-3 control-label')) !!}
        <div class="col-sm-5">
            {!! Form::select('kota', $kota, null, array('class'=>'form-control', 'value'=>old('kota'), 'id'=>'kota')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('propinsi', 'Provinsi', array('class'=>'col-sm-3 control-label')) !!}
        <div class="col-sm-5">
            {!! Form::select('propinsi', $propinsi, null, array('class'=>'form-control', 'value'=>old('propinsi'), 'id'=>'propinsi')) !!}
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Kode Pos</label>
        <div class="col-sm-3">
            <input type="text" name="kode_pos" id="kode_pos" class="form-control" value="{{old('kode_pos')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-5">
            <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Telepon/HP</label>
        <div class="col-sm-5">
            <input type="text" name="telepon" id="telepon" class="form-control" value="{{old('telepon')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Total Belanja</label>
        <div class="col-sm-5">
        <p class="form-control-static" id="total_belanja"></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Biaya Kirim</label>
        <div class="col-sm-5">
        <p class="form-control-static" id="ongkir"></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Total Biaya</label>
        <div class="col-sm-5">
        <p class="form-control-static" id="total_biaya"></p>
        </div>
    </div>
    <div class="form-group">
        <div class="text-right">
            {!! Form::submit('Pembayaran', array('class'=>'btn btn-default')) !!}
        </div>
    </div>
{!! Form::close() !!}
</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
function prosesBiayaKirim(jqXHR, textStatus) {
    ongkir = $('#ongkir');
    total_belanja = $('#total_belanja');
    total_biaya = $('#total_biaya');
    if (textStatus == "success") {
        data = JSON.parse(jqXHR.responseText);
        ongkir.html('Rp. ' + data.ongkir);
        total_belanja.html('Rp. ' + data.total_belanja);
        total_biaya.html('Rp. ' + (data.total_belanja + data.ongkir));
    } else {
        ongkir.html("");
        total_belanja.html("");
        total_biaya.html("");
    }
}

function biayaKirim(valKota, valPropinsi) {
    $.ajax("{{route('checkoutBiayaKirim')}}", {
        type: "POST",
        _token: "{{ csrf_token()}}",
        data: {kota: valKota, propinsi: valPropinsi},
        complete: prosesBiayaKirim,
    });
}

$('#kota').change( function(event) {
    biayaKirim(event.target.value, $('#propinsi').val());
});

$('#propinsi').change( function(event) {
    biayaKirim($('#kota').val(), event.target.value);
});
</script>
@endsection
