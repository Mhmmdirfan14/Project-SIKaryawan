@extends('template')

@section('title', 'Dashboard - SiKaryawan')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <h1 class="text-center">Selamat Datang</h1>
            <h1 class="text-center">di Aplikasi SIKaryawan</h1>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Absensi Hari Ini</h5>
                        <p>Jumlah Karyawan Masuk: {{ $jumlahHadir }}</p>
                        <p>Jumlah Karyawan Tidak Masuk: {{ $jumlahTidakHadir }}</p>

                        <!-- Chart.js -->
                        <canvas id="attendanceChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('attendanceChart').getContext('2d');
            var attendanceChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Masuk', 'Tidak Masuk'],
                    datasets: [{
                        data: [{{ $jumlahHadir }}, {{ $jumlahTidakHadir }}],
                        backgroundColor: ['#4CAF50', '#FF6384']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed !== null) {
                                        label += context.parsed;
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
