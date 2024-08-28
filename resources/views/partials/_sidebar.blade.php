@php
    $currentRoute = Route::current()->uri;
@endphp
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @if ($currentRoute != 'dashboard') collapsed @endif" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        @if (auth()->user()->level == 'admin')
            <li class="nav-item">
                <a class="nav-link @if ($currentRoute != 'karyawan') collapsed @endif" href="/karyawan">
                    <i class="bi bi-person "></i>
                    <span>Data User</span>
                </a>
            </li><!-- End karyawan Nav -->
        @endif

        @if (auth()->user()->level == 'admin')
        <li class="nav-item">
          <a class="nav-link @if ($currentRoute != 'absensi') collapsed @endif" href="/absensi">
              <i class="bi bi-menu-button-wide "></i>
              <span>Data Absensi</span>
          </a>
      </li>
      @endif
      <!-- End Data Karyawan Nav -->
{{-- 
        @if (auth()->user()->level == 'admin')
        <li class="nav-item">
            <a class="nav-link @if ($currentRoute != 'divisi') collapsed @endif" href="/divisi">
                <i class="bi bi-gem "></i>
                <span>Divisi</span>
            </a>
        </li><!-- End Data Divisi Nav -->
        @endif --}}

        {{-- <a class="nav-link @if ($currentRoute != 'absensi') collapsed @endif" href="/absensi"> --}}
          @if (auth()->user()->level == 'karyawan')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Absensi</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                    <a href="{{ route('absensi.masuk') }}">
                      <i class="bi bi-circle"></i><span>Masuk</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('absensi.keluar') }}">
                      <i class="bi bi-circle"></i><span>Keluar</span>
                    </a>
                  </li>
                </ul>
              </li><!-- End Components Nav -->
              @endif



        <li class="nav-item">
            <a class="nav-link @if ($currentRoute != 'keterangan') collapsed @endif" href="/keterangan">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Keterangan</span>
            </a>
        </li><!-- End Data Keterangan Nav -->

    </ul>

</aside><!-- End Sidebar-->
