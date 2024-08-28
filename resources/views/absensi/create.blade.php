@extends('template')
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Tambah Data Absensi</h5>
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

      <!-- Horizontal Form -->
      <form action="{{ route('absensi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <label for="karyawan_id" class="col-sm-2 col-form-label">Nama Karyawan</label>
          <div class="col-sm-10">
            <select class="form-control" id="karyawan_id" name="karyawan_id">
              @foreach ($karyawans as $karyawan)
                <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
              @endforeach
            </select>
        </div>
        <div class="row mb-3">
          <label for="foto" class="col-sm-2 col-form-label">Upload Foto</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="foto" name="foto">
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