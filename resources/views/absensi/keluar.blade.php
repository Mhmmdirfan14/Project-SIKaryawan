@extends('template')
@section('title', 'Absensi - SiKaryawan')
  @section('content')
    <div class="pagetitle">
      <h1>Absensi Keluar</h1>
      <link rel="stylesheet" href="{{ asset('css/keluar.css') }}">
      <script src="{{ asset('Js/jam.js') }}"></script>
    </div><!-- End Page Title -->

    <section class="section dashboard">

        <body class="hold-transition sidebar-mini" onload="realtimeClock()">

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
            

        <!-- Card with header and footer -->
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{ route('ubah-absensi') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <center>
                                <label id="clock" style="font-size: 100px; color: #659980; -webkit-text-stroke: 3px #02C39A;
                                text-shadow: 4px 4px 10px #CDE4B1,
                                4px 4px 15px rgba(153, 255, 70, 0.4),
                                 4px 4px 25px rgba(153, 255, 70, 0.4),
                                 4px 4px 35px rgba(153, 255, 70, 0.4);">
                                 </label>
                            </center>
                        </div>
                        <center>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Klik Untuk Absensi keluar</button>
                            </div>
                        </center>
                    </form>

                </div>
          </div><!-- End Card with header and footer -->

        </body>
     
    </section>

@endsection






