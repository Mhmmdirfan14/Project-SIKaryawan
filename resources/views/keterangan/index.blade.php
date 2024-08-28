@extends('template')
@section('title', 'Keterangan - SiKaryawan')
@section('content')
    <div class="pagetitle">
      <h1>Data Keterangan</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="card mt-3">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="{{ route('keterangan.create') }}" class="btn btn-primary btn-sm">Tambah Data + </a><hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                @if (auth()->user()->level == 'admin')
                                <th>Karyawan_id</th>
                                @endif
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Alasan</th>
                                <th>Foto</th>
                                @if (auth()->user()->level == 'admin')
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keterangans as $keterangan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @if (auth()->user()->level == 'admin')
                                <td>{{ $keterangan->karyawan_id }}</td> <!-- Assuming 'user' relation exists and 'name' is the field for the employee's name -->
                                @endif
                                <td>{{ $keterangan->tanggal }}</td>
                                <td>{{ $keterangan->keterangan }}</td>
                                <td>{{ $keterangan->alasan }}</td>
                                <td>
                                    @if ($keterangan->foto)
                                        <img src="{{ asset('storage/' . $keterangan->foto) }}" alt="Foto" width="100">
                                    @else
                                        Tidak ada foto
                                    @endif
                                </td>
                                @if (auth()->user()->level == 'admin')
                                <td class="d-flex">
                                    <a href="{{ route('keterangan.edit', $keterangan->id) }}"
                                        class="btn btn-warning me-2"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('keterangan.destroy', $keterangan->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus?')">
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
