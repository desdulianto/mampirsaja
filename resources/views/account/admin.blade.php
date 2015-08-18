@extends('base')

@section('body')
<div class="row">
    <div class="col-sm-12">
        <h1 class="text-center">Konfigurasi Account {{$user->nama_lengkap()}}</h1>
        <div class="col-sm-6 col-sm-offset-3">
        <h2 class="text-center">Rekening dan Cara Pembayaran</h2>
        <form method="post" action="{{route('postAccount')}}" class="form-horizontal">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">Nama</label>
                <div class="col-sm-9">
                <input type="text" name="nama" value="{{ old('nama') ? old('nama') : $nama }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="no_rekening" class="col-sm-3 control-label">No. Rekening</label>
                <div class="col-sm-9">
                <input type="text" name="no_rekening" value="{{ old('no_rekening') ? old('no_rekening') : $no_rekening }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="bank" class="col-sm-3 control-label">Bank</label>
                <div class="col-sm-9">
                <input type="text" name="bank" value="{{ old('bank') ? old('bank') : $bank }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="cara_pembayaran" class="col-sm-3 control-label">Cara Pembayaran</label>
                <div class="col-sm-9">
                <textarea name="cara_pembayaran" rows="3", class="form-control">{{old('cara_pembayaran') ? old('cara_pembayaran') : $cara_pembayaran}}</textarea>
                </div>
            </div>
            <div class="form-group">
            <div class="text-right">
            <button type="submit" class="btn btn-default">Simpan</button>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
