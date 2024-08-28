@extends('template')
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Tambah Data Karyawan</h5>
      @if (count($errors) > 0 )
      <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error )
              <li>{{ $error }}</li>
            @endforeach
          </ul>
      </div>
      @endif

      <!-- Multi Columns Form -->
      <form class="row g-3" method="POST" action="{{ route('karyawan.store') }}">
        @csrf
        <div class="col-md-12">
          <label for="nik" class="form-label">NIK</label>
          <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}">
        </div>
        <div class="col-md-12">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
        </div>
        <div class="col-md-6">
          <label for="tmp_lahir" class="form-label">Tempat Lahir</label>
          <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="{{ old('tmp_lahir') }}">
        </div>
        <div class="col-md-6">
          <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
        </div>
        <div class="col-md-12">
          <label for="jekel" class="form-label">Jenis Kelamin</label>
          <select id="jekel" name="jekel" class="form-select">
            <option value="Laki-Laki" value="Laki-Laki"{{ old('jekel') == "Laki-Laki" ? "selected" : "" }}>Laki-Laki</option>
            <option value="Perempuan" value="Perempuan"{{ old('jekel')  == "Laki-Laki" ? "selected" : "" }}">Perempuan</option>
          </select>
        </div>
        <div class="col-md-12">
          <label for="agama" class="form-label">Agama</label>
          <input type="text" class="form-control" id="agama" name="agama" value="{{ old('agama') }}">
        </div>
        <div class="col-12">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}">
        </div>
        <div class="col-12">
          <label for="no_telp" class="form-label">No.Telepon</label>
          <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ old('value') }}">
        </div>
        <div class="col-md-6">
          <label for="divisi_id" class="form-label">Divisi</label>
          <select id="divisi_id" name="divisi_id" class="form-select">
            @foreach($divisis as $divisi)
            <option value="{{ $divisi->id }}" {{ old('divisi_id') == $divisi->id ? 'selected' : '' }}>
              {{ $divisi->nama }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->
    </div>
  </div>

@endsection