@extends('template')
@section('title', 'Absensi - SiKaryawan')
  @section('content')
    <div class="pagetitle">
      <h1>Data Absensi</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="card mt-3">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="{{ route('absensi.create') }}" class="btn btn-primary btn-sm"> Tambah Data + </a><hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>karyawan_id</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Jam Kerja</th>
                                @if (auth()->user()->level == 'admin')
                                <th>Aksi</th>
                                @endif
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absensis as $absensi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $absensi->karyawan_id }}</td>
                                <td>{{ $absensi->tanggal }}</td>
                                <td>{{ $absensi->jam_masuk }}</td>
                                <td>{{ $absensi->jam_keluar }}</td>
                                <td>{{ $absensi->jam_kerja }}</td>
                                @if (auth()->user()->level == 'admin')
                                <td class="d-flex">
                                  <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-warning me-2"><i class="bi bi-pencil-square"></i></a>
                                  <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                      <i class="bi bi-trash-fill"></i>
                                    </button>
                                  </form>
                                </td>  
                                @endif
                            </tr>     
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>

      </div>
    </section>

@endsection






