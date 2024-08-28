@extends('template')
@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Edit Data Divisi</h5>
    <form action="{{ route('divisi.update', $divisi->id) }}" method="POST" class="mt-3">
      @csrf
      @method('PUT')
      <div class="row mb-3">
        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="kode" name="kode" value="{{ $divisi->kode }}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama" name="nama" value="{{ $divisi->nama }}">
        </div>
      </div>
      <div class="text-center mb-4">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
    </form>
  </div>
</div>
@endsection
