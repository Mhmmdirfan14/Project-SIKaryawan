@extends('template')
@section('title', 'Absensi - SiKaryawan')
  @section('content')
    <div class="pagetitle">
      <h1>Absensi Masuk</h1>
      <link rel="stylesheet" href="{{ asset('css/masuk.css') }}">
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
                    <form action="{{ route('absensi.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <center>
                                <label id="clock" style="font-size: 100px; color: #0A77DE; -webkit-text-stroke: 3px #00ACFE;
                                            text-shadow: 4px 4px 10px #36D6FE,
                                            4px 4px 15px #36D6FE,
                                            4px 4px 25px#36D6FE,
                                            4px 4px 35px #36D6FE;">
                                </label>
                            </center>
                        </div>
                        <center>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Klik Untuk Absensi Masuk</button>
                            </div>
                        </center>
                    </form>

                </div>
          </div><!-- End Card with header and footer -->

        </body>
     
    </section>

@endsection






