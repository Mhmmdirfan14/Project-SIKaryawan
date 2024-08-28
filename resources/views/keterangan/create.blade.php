@extends('template')
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Tambah Data Keterangan</h5>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


      <!-- Horizontal Form -->
      <form action="{{ route('keterangan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
          </div>
        </div>
        <div class="row mb-3">
            <label for="keterangan" class="col-2 form-label">Keterangan</label>
            <div class="col-10">
                <select id="keterangan" name="keterangan" class="form-select">
                    <option  value="Izin" {{ old('keterangan') == "Izin" ? "selected" : ""}}>Izin</option>
                    <option  value="Sakit" {{ old('keterangan') == "Sakit" ? "selected" : ""}}>Sakit</option>
                    <option  value="Lainnya" {{ old('keterangan') == "Lainnya" ? "selected" : ""}}>Lainnya</option>
                  </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="alasan" class="col-sm-2 col-form-label">Alasan</label>
            <div class="col-sm-10">
              <textarea type="text" class="form-control" id="alasan" name="alasan" value="{{ old('alasan') }}" cols="40" rows="5"> </textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label for="foto"  class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
              <input type="file" name="foto" class="form-control">
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