<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
                <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->id == 1)
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#master_data" aria-expanded="true"
                    aria-controls="master_data">
                    <i class="mdi mdi-database menu-icon"></i>
                    <span class="menu-title">Master Data</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse hide" id="master_data" style="">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('users') }}">User </a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ url('role') }}">Role </a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ url('divisi') }}">Divisi</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ url('jenis_surat') }}">Jenis Surat</a></li>
                    </ul>
                </div>
            </li>
        @endif

        <li class="nav-item">
            <a class="nav-link" href="{{ url('disposisi') }}">
                <i class="mdi mdi-file menu-icon"></i>
                <span class="menu-title">Disposisi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('surat_masuk') }}">
                <i class="mdi mdi-email-open menu-icon"></i>
                <span class="menu-title">Surat Masuk</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('surat_keluar') }}">
                <i class="mdi mdi-email-variant menu-icon"></i>
                <span class="menu-title">Surat Keluar</span>
            </a>
        </li>

        @if (Auth::user()->id == 1)
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laporan" aria-expanded="true"
                    aria-controls="master_data">
                    <i class="mdi mdi-file-pdf menu-icon"></i>
                    <span class="menu-title">Laporan</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse hide" id="laporan" style="">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('laporan/surat_masuk') }}">Laporan Surat
                                Masuk
                            </a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ url('laporan/surat_keluar') }}">Laporan
                                Surat
                                Keluar</a></li>
                    </ul>
                </div>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{ url('logout') }}">
                <i class="mdi mdi-logout-variant menu-icon"></i>
                <span class="menu-title">Keluar</span>
            </a>
        </li>

    </ul>
</nav>
