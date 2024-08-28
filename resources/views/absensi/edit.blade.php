@extends('template')
@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Edit Data Absensi</h5>
    <form action="{{ route('absensi.update', $absensi->id) }}" method="post" class="mt-3">
      @csrf
      @method('PUT')
      <div class="row mb-3">
        <label for="tanggal" class="col-sm-2 col-form-label">tanggal</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $absensi->tanggal }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="jam_masuk" class="col-sm-2 col-form-label">Jam Masuk</label>
        <div class="col-sm-10">
          <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" value="{{ $absensi->jam_masuk }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="jam_keluar" class="col-sm-2 col-form-label">Jam Keluar</label>
        <div class="col-sm-10">
          <input type="time" class="form-control" id="jam_keluar" name="jam_keluar" value="{{ $absensi->jam_keluar }}">
        </div>
      <div class="text-center mb-4">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
    </form>
  </div>
</div>
@endsection
