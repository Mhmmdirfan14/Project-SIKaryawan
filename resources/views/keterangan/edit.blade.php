@extends('template')
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Edit Data Keterangan</h5>
      <!-- Horizontal Form -->
      <form action="{{ route('keterangan.update', $keterangan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $keterangan->tanggal }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="keterangan" class="col-2 form-label">Keterangan</label>
            <div class="col-10">
                <select id="keterangan" class="form-select" name="keterangan">
                    <option value="Izin" {{ $keterangan->keterangan == 'Izin' ? 'selected' : '' }}>Izin</option>
                    <option value="Sakit" {{ $keterangan->keterangan == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="Lainnya" {{ $keterangan->keterangan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="alasan" class="col-sm-2 col-form-label">Alasan</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="alasan" name="alasan" cols="40" rows="5">{{ $keterangan->alasan }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="foto"  class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
              <input type="file" name="foto" class="form-control"  value="{{ $keterangan->foto }}">
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