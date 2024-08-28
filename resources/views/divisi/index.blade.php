@extends('template')
@section('title', 'Divisi - SiKaryawan')
  @section('content')
    <div class="pagetitle">
      <h1>Data Divisi</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="card mt-3">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <a href="{{ route('divisi.create') }}" class="btn btn-primary btn-sm"> Tambah Data + </a><hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>kode</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($divisis as $divisi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $divisi->kode }}</td>
                                <td>{{ $divisi->nama }}</td>
                                <td class="d-flex">
                                  <a href="{{ route('divisi.edit', $divisi->id) }}" class="btn btn-warning me-2"><i class="bi bi-pencil-square"></i></a>
                                  <form action="{{ route('divisi.destroy', $divisi->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                      <i class="bi bi-trash-fill"></i>
                                    </button>
                                  </form>
                                </td>
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






