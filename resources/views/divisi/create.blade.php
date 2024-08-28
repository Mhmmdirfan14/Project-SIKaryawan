@extends('template')
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Tambah Data Absensi</h5>
      @if (count($errors) > 0 )
      <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error )
              <li>{{ $error }}</li>
            @endforeach
          </ul>
      </div>
      @endif

      <!-- Horizontal Form -->
      <form action="{{ route('divisi.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
          <label for="kode" class="col-sm-2 col-form-label">Kode</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="kode" name="kode" value="{{ old('kode') }}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Horizontal Form -->

    </div>
  </div>





@endsection