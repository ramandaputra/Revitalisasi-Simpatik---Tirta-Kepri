<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'SIMPATIK V3.0 - Dashboard')</title>
    <meta name="description" content="SIMPATIK V3.0 - Sistem Informasi Manajemen Pemantauan & Analisis Kinerja">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Montserrat:400,500,600,700", "Noto+Sans:400,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- Theme Preference Initialization (Prevents FOUC) -->
    <script>
        (function() {
            var savedTheme = localStorage.getItem('simpatik_theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);
        })();
    </script>

    <!-- Favicon (logo-2.png) -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/logo-2.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/logo-2.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/logo-2.png') }}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/base/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/base/elisyam-1.5-dark.min.css') }}">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/page-overview/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/icons/lineawesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/icons/themify/css/themify-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/icons/bootstrap-icons/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel/owl.theme.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- SIMPATIK Biru-Putih Minimalis & Dark Mode Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/simpatik-theme.css') }}">

    <style>
        .badge-status {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
        }
        .pump-indicator-on {
            color: #10b981;
            font-weight: bold;
        }
        .pump-indicator-off {
            color: #ef4444;
            font-weight: bold;
        }
    </style>

    @stack('styles')
</head>

<body id="page-top">
    <!-- Preloader Loading (logo-2.png) -->
    <div id="preloader">
        <div class="canvas text-center">
            <img src="{{ asset('assets/img/logo-2.png') }}" alt="SIMPATIK" class="loader-logo mb-3" style="width: 52px; height: 52px; object-fit: contain;">
            <div class="spinner"></div>
        </div>
    </div>

    <div class="page">
        <!-- Header -->
        <header class="header">
            <nav class="navbar fixed-top">
                <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                    <!-- Brand Logo SIMPATIK (logo-big-2.png & logo-2.png) -->
                    <div class="navbar-header d-flex align-items-center">
                        <a href="{{ route('dashboard') }}" class="navbar-brand d-flex align-items-center text-decoration-none">
                            <div class="brand-image brand-big">
                                <img src="{{ asset('assets/img/logo-big-2.png') }}" alt="SIMPATIK V3.0" class="logo-big" style="height: 38px; width: auto; object-fit: contain;">
                            </div>
                            <div class="brand-image brand-small" style="display: none;">
                                <img src="{{ asset('assets/img/logo-2.png') }}" alt="SIMPATIK V3.0" class="logo-small" style="height: 32px; width: auto; object-fit: contain;">
                            </div>
                        </a>
                        <button type="button" id="toggle-btn" class="sidebar-toggle-btn active ml-3" title="Buka / Tutup Sidebar" aria-label="Toggle Sidebar">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </button>
                    </div>

                    <!-- Right Top Navbar Actions -->
                    <div class="top-navbar-actions d-flex align-items-center">
                        <!-- Theme Toggle Button (Matahari / Bulan Sabit) di sebelah kiri tombol login -->
                        <button type="button" class="theme-switch-btn mr-2" id="themeToggleBtn" title="Ganti Mode Gelap / Terang" aria-label="Ganti Mode Tema">
                            <!-- Bulan Sabit (untuk Mode Terang -> beralih ke Gelap) -->
                            <svg id="themeMoonIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                            </svg>
                            <!-- Matahari (untuk Mode Gelap -> beralih ke Terang) -->
                            <svg id="themeSunIcon" style="display: none;" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="5"></circle>
                                <line x1="12" y1="1" x2="12" y2="3"></line>
                                <line x1="12" y1="21" x2="12" y2="23"></line>
                                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                <line x1="1" y1="12" x2="3" y2="12"></line>
                                <line x1="21" y1="12" x2="23" y2="12"></line>
                                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                            </svg>
                        </button>

                        @auth
                            <!-- Modern User Profile Dropdown -->
                            <div class="dropdown d-flex align-items-center">
                                <a id="userDropdown" rel="nofollow" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="user-profile-btn user-profile-link d-flex align-items-center">
                                    <div class="user-avatar-wrap position-relative">
                                        <img src="{{ asset('assets/img/avatar/avatar-01.jpg') }}" alt="Avatar" class="user-avatar-img">
                                        <span class="user-avatar-dot" title="Status: Online"></span>
                                    </div>
                                    <div class="user-info-text d-none d-md-flex flex-column text-left">
                                        <span class="user-name-label" title="{{ Auth::user()->nama }}">{{ Auth::user()->nama }}</span>
                                        <span class="user-role-label">{{ Auth::user()->lvl == '1' ? 'Administrator' : 'Operator Lapangan' }}</span>
                                    </div>
                                    <div class="user-chevron-box d-flex align-items-center justify-content-center">
                                        <i class="bi bi-chevron-down"></i>
                                    </div>
                                </a>
                                <div aria-labelledby="userDropdown" class="dropdown-menu dropdown-menu-right user-profile-dropdown user-dropdown-box border-0 shadow-lg">
                                    <!-- User Header Card -->
                                    <div class="user-dropdown-card">
                                        <div class="d-flex align-items-center">
                                            <div class="position-relative mr-3 flex-shrink-0">
                                                <img src="{{ asset('assets/img/avatar/avatar-01.jpg') }}" alt="{{ Auth::user()->nama }}" class="user-dropdown-avatar">
                                                <span class="user-dropdown-status-dot"></span>
                                            </div>
                                            <div class="user-dropdown-meta overflow-hidden">
                                                <h6 class="user-dropdown-name text-truncate mb-1" title="{{ Auth::user()->nama }}">{{ Auth::user()->nama }}</h6>
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <span class="user-badge-role">{{ Auth::user()->lvl == '1' ? 'Administrator' : 'Operator' }}</span>
                                                    <span class="user-dropdown-nik ml-2">NIK: {{ Auth::user()->nik }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Navigation Items -->
                                    <div class="user-dropdown-menu-list">
                                        <a href="{{ route('dashboard') }}" class="user-dropdown-nav-item">
                                            <div class="nav-item-icon bg-primary-soft text-primary">
                                                <i class="bi bi-columns-gap"></i>
                                            </div>
                                            <div class="nav-item-content">
                                                <span class="nav-item-title">Dashboard Utama</span>
                                                <span class="nav-item-desc">Ringkasan KPI & Metrik Air</span>
                                            </div>
                                            <i class="bi bi-chevron-right nav-item-arrow"></i>
                                        </a>

                                        <a href="{{ route('kinerja.index') }}" class="user-dropdown-nav-item">
                                            <div class="nav-item-icon bg-info-soft text-info">
                                                <i class="bi bi-graph-up-arrow"></i>
                                            </div>
                                            <div class="nav-item-content">
                                                <span class="nav-item-title">Indikator Kinerja</span>
                                                <span class="nav-item-desc">18 Parameter BPPSPAM</span>
                                            </div>
                                            <i class="bi bi-chevron-right nav-item-arrow"></i>
                                        </a>

                                        <a href="{{ route('spka.index') }}" class="user-dropdown-nav-item">
                                            <div class="nav-item-icon bg-warning-soft text-warning">
                                                <i class="bi bi-ticket-detailed"></i>
                                            </div>
                                            <div class="nav-item-content">
                                                <span class="nav-item-title">Kegiatan SPKA</span>
                                                <span class="nav-item-desc">Tiket & Laporan Lapangan</span>
                                            </div>
                                            <i class="bi bi-chevron-right nav-item-arrow"></i>
                                        </a>
                                    </div>

                                    <div class="dropdown-divider my-2"></div>

                                    <!-- Logout Action -->
                                    <div class="px-3 pb-2 pt-1">
                                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                                            @csrf
                                            <button type="submit" class="btn-user-logout">
                                                <i class="bi bi-box-arrow-right mr-2"></i>
                                                <span>Keluar (Logout)</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn-nav-login" style="color: #ffffff !important;">
                                <i class="bi bi-lock-fill mr-1.5" style="color: #ffffff !important;"></i>
                                <span class="btn-login-text" style="color: #ffffff !important;">Login Petugas</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </nav>
        </header>

        <!-- Page Content -->
        <div class="page-content d-flex align-items-stretch position-relative">
            <!-- Backdrop Overlay for Mobile Sidebar Drawer -->
            <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

            <!-- Sidebar -->
            <div class="default-sidebar">
                <nav class="side-navbar box-scroll sidebar-scroll">
                    <!-- Sidebar Top Header Widget (Di atas tulisan Dashboard) -->
                    <div class="sidebar-top-widget">
                        @auth
                            <div class="sidebar-user-card">
                                <div class="sidebar-avatar-wrapper">
                                    <img src="{{ asset('assets/img/avatar/avatar-01.jpg') }}" alt="Avatar" class="sidebar-avatar">
                                    <span class="sidebar-status-dot" title="Status: Online"></span>
                                </div>
                                <div class="sidebar-user-details">
                                    <span class="sidebar-user-name" title="{{ Auth::user()->nama }}">{{ Auth::user()->nama }}</span>
                                    <div class="sidebar-user-meta">
                                        <span class="sidebar-role-pill">{{ Auth::user()->lvl == '1' ? 'Administrator' : 'Operator' }}</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="sidebar-portal-badge">
                                <div class="portal-badge-left">
                                    <div class="portal-icon-wrap" style="background: transparent;">
                                        <img src="{{ asset('assets/img/logo-2.png') }}" alt="SIMPATIK V3.0" style="width: 26px; height: 26px; object-fit: contain;">
                                    </div>
                                    <div class="portal-text-wrap">
                                        <span class="portal-title">SIMPATIK V3.0</span>
                                        <span class="portal-sub">Portal Publik Kinerja</span>
                                    </div>
                                </div>
                                <span class="portal-tag">Publik</span>
                            </div>
                        @endauth
                    </div>

                    <!-- Navigation -->
                    <span class="heading">Dashboard</span>
                    <ul class="list-unstyled">
                        <li class="{{ request()->routeIs('dashboard') && !request()->routeIs('dashboard.eksekutif') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}">
                                <i class="bi bi-columns-gap"></i><span>Dashboard Utama</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('dashboard.eksekutif') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.eksekutif') }}">
                                <i class="bi bi-speedometer2"></i><span>Dashboard Eksekutif</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('gis.*') ? 'active' : '' }}">
                            <a href="{{ route('gis.index') }}">
                                <i class="sidebar-icon-gis" title="WebGIS Distribusi"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg></i><span>WebGIS Distribusi</span>
                            </a>
                        </li>
                    </ul>

                    <span class="heading">Kinerja (18 Indikator)</span>
                    <ul class="list-unstyled">
                        <!-- Aspek Keuangan -->
                        <li>
                            <a href="#kinerja-keu" aria-expanded="false" data-toggle="collapse">
                                <i class="bi bi-cash-stack"></i><span>Aspek Keuangan</span>
                            </a>
                            <ul id="kinerja-keu" class="collapse list-unstyled pt-0">
                                <li><a href="{{ url('/return-on-equity.php') }}">Return on Equity</a></li>
                                <li><a href="{{ url('/ratio-operasi.php') }}">Ratio Operasi</a></li>
                                <li><a href="{{ url('/cash-ratio.php') }}">Cash Ratio</a></li>
                                <li><a href="{{ url('/efisiensi-penagihan.php') }}">Efisiensi Penagihan</a></li>
                                <li><a href="{{ url('/solvabilitas.php') }}">Solvabilitas</a></li>
                            </ul>
                        </li>

                        <!-- Aspek Pelayanan -->
                        <li>
                            <a href="#kinerja-pel" aria-expanded="false" data-toggle="collapse">
                                <i class="bi bi-people-fill text-info"></i><span>Aspek Pelayanan</span>
                            </a>
                            <ul id="kinerja-pel" class="collapse list-unstyled pt-0">
                                <li><a href="{{ url('/cakupan-pelayanan.php') }}">Cakupan Pelayanan</a></li>
                                <li><a href="{{ url('/pertumbuhan-pelanggan.php') }}">Pertumbuhan Pelanggan</a></li>
                                <li><a href="{{ url('/penyelesaian-pengaduan.php') }}">Penyelesaian Pengaduan</a></li>
                                <li><a href="{{ url('/kualitas-air.php') }}">Kualitas Air</a></li>
                                <li><a href="{{ url('/konsumsi-air.php') }}">Konsumsi Air</a></li>
                            </ul>
                        </li>

                        <!-- Aspek Operasional -->
                        <li>
                            <a href="#kinerja-ops" aria-expanded="false" data-toggle="collapse">
                                <i class="bi bi-droplet-fill text-primary"></i><span>Aspek Operasional</span>
                            </a>
                            <ul id="kinerja-ops" class="collapse list-unstyled pt-0">
                                <li><a href="{{ url('/rasio-efisiensi-produksi.php') }}">Rasio Efisiensi Produksi</a></li>
                                <li><a href="{{ url('/air-tidak-berekening.php') }}">Air Tidak Berekening (NRW)</a></li>
                                <li><a href="{{ url('/jam-operasi.php') }}">Jam Operasi Pelayanan</a></li>
                                <li><a href="{{ url('/tekanan-air.php') }}">Tekanan Air Pelanggan</a></li>
                                <li><a href="{{ url('/penggantian-meter.php') }}">Penggantian Meter Air</a></li>
                            </ul>
                        </li>

                        <!-- Aspek SDM -->
                        <li>
                            <a href="#kinerja-sdm" aria-expanded="false" data-toggle="collapse">
                                <i class="bi bi-person-up"></i><span>Aspek SDM</span>
                            </a>
                            <ul id="kinerja-sdm" class="collapse list-unstyled pt-0">
                                <li><a href="{{ url('/jumlah-pegawai.php') }}">Rasio Jumlah Pegawai</a></li>
                                <li><a href="{{ url('/rasio-pegawai-diklat.php') }}">Rasio Pegawai Diklat</a></li>
                                <li><a href="{{ url('/rasio-biaya-diklat.php') }}">Rasio Biaya Diklat</a></li>
                            </ul>
                        </li>
                    </ul>

                    <span class="heading">Target & Operasional</span>
                    <ul class="list-unstyled">
                        <!-- TEKNIK -->
                        <li>
                            <a href="#tek-menu" aria-expanded="{{ request()->routeIs('teknik.*') ? 'true' : 'false' }}" data-toggle="collapse">
                                <i class="bi bi-gear-wide-connected"></i><span>TEKNIK</span>
                            </a>
                            <ul id="tek-menu" class="collapse list-unstyled pt-0 {{ request()->routeIs('teknik.*') ? 'show' : '' }}">
                                <li><a href="{{ route('teknik.produksi') }}">Produksi Air</a></li>
                                <li><a href="{{ route('teknik.distribusi') }}">Distribusi JDU</a></li>
                                <li><a href="{{ route('teknik.kehilangan-air') }}">Tingkat Kehilangan Air</a></li>
                                <li><a href="{{ route('teknik.perawatan-meter') }}">Perawatan Meter</a></li>
                                <li><a href="{{ route('teknik.dma') }}">Monitoring DMA</a></li>
                                <li><a href="{{ route('teknik.kualitas-air') }}">Kualitas Air</a></li>
                            </ul>
                        </li>

                        <!-- HUBLANG -->
                        <li>
                            <a href="#hbl-menu" aria-expanded="{{ request()->routeIs('keuangan.pertumbuhan*') || request()->routeIs('keuangan.pembacaan*') || request()->routeIs('keuangan.pengaduan*') || request()->routeIs('keuangan.drd*') || request()->routeIs('keuangan.perbaikan*') ? 'true' : 'false' }}" data-toggle="collapse">
                                <i class="bi bi-chat-square-text-fill"></i><span>HUBLANG</span>
                            </a>
                            <ul id="hbl-menu" class="collapse list-unstyled pt-0 {{ request()->routeIs('keuangan.pertumbuhan*') || request()->routeIs('keuangan.pembacaan*') || request()->routeIs('keuangan.pengaduan*') || request()->routeIs('keuangan.drd*') || request()->routeIs('keuangan.perbaikan*') ? 'show' : '' }}">
                                <li><a href="{{ route('keuangan.drd-posting') }}">DRD Posting</a></li>
                                <li><a href="{{ route('keuangan.pertumbuhan-pelanggan-hbl') }}">Pertumbuhan Pelanggan</a></li>
                                <li><a href="{{ route('keuangan.pengaduan-pelanggan') }}">Pengaduan Pelanggan</a></li>
                                <li><a href="{{ route('keuangan.perbaikan-rekening') }}">Perbaikan Rekening</a></li>
                                <li><a href="{{ route('keuangan.pembacaan-meter') }}">Pembacaan Meter</a></li>
                            </ul>
                        </li>

                        <!-- KEUANGAN -->
                        <li>
                            <a href="#keu-menu" aria-expanded="{{ request()->routeIs('keuangan.arus*') || request()->routeIs('keuangan.efisiensi*') ? 'true' : 'false' }}" data-toggle="collapse">
                                <i class="bi bi-cash-stack"></i><span>KEUANGAN</span>
                            </a>
                            <ul id="keu-menu" class="collapse list-unstyled pt-0 {{ request()->routeIs('keuangan.arus*') || request()->routeIs('keuangan.efisiensi*') ? 'show' : '' }}">
                                <li><a href="{{ route('keuangan.efisiensi-penagihan-keu') }}">Efisiensi Penagihan</a></li>
                                <li><a href="{{ route('keuangan.arus-kas') }}">Arus Kas & Rasio Kas</a></li>
                            </ul>
                        </li>

                        <!-- SPI -->
                        <li>
                            <a href="#spi-menu" aria-expanded="{{ request()->routeIs('spi.*') || request()->routeIs('keuangan.tunggakan*') || request()->routeIs('keuangan.pemutusan*') ? 'true' : 'false' }}" data-toggle="collapse">
                                <i class="bi bi-binoculars-fill"></i><span>SPI</span>
                            </a>
                            <ul id="spi-menu" class="collapse list-unstyled pt-0 {{ request()->routeIs('spi.*') || request()->routeIs('keuangan.tunggakan*') || request()->routeIs('keuangan.pemutusan*') ? 'show' : '' }}">
                                <li><a href="{{ route('keuangan.tunggakan-empat-bulan') }}">Tunggakan > 4 Bulan</a></li>
                                <li><a href="{{ route('keuangan.pemutusan-tunggakan') }}">Pemutusan Tunggakan</a></li>
                                <li><a href="{{ route('spi.index') }}">Monitoring SPI</a></li>
                            </ul>
                        </li>

                        <!-- SPKA -->
                        <li>
                            <a href="#spka-side-menu" aria-expanded="{{ request()->routeIs('spka.*') ? 'true' : 'false' }}" data-toggle="collapse">
                                <i class="bi bi-ticket-detailed"></i><span>SPKA</span>
                            </a>
                            <ul id="spka-side-menu" class="collapse list-unstyled pt-0 {{ request()->routeIs('spka.*') ? 'show' : '' }}">
                                <li><a href="{{ route('teknik.dma') }}">Monitoring DMA</a></li>
                                <li><a href="{{ route('spka.index') }}">Kegiatan SPKA</a></li>
                                <li><a href="{{ route('gis.index') }}">GIS Distribusi</a></li>
                            </ul>
                        </li>
                    </ul>

                    <span class="heading">Input Data</span>
                    <ul class="list-unstyled">
                        <!-- Posting Kinerja Wizards -->
                        <li>
                            <a href="#posting-wizards" aria-expanded="{{ request()->routeIs('kinerja.input*') ? 'true' : 'false' }}" data-toggle="collapse">
                                <i class="bi bi-file-earmark-text"></i><span>Posting Kinerja</span>
                            </a>
                            <ul id="posting-wizards" class="collapse list-unstyled pt-0 {{ request()->routeIs('kinerja.input*') ? 'show' : '' }}">
                                <li><a href="{{ route('kinerja.input.keuangan') }}">Aspek Keuangan</a></li>
                                <li><a href="{{ route('kinerja.input.pelayanan') }}">Aspek Pelayanan</a></li>
                                <li><a href="{{ route('kinerja.input.operasional') }}">Aspek Operasional</a></li>
                                <li><a href="{{ route('kinerja.input.sdm') }}">Aspek SDM</a></li>
                            </ul>
                        </li>

                        @auth
                            <!-- Input Operasional -->
                            <li>
                                <a href="#input-tek" aria-expanded="false" data-toggle="collapse">
                                    <i class="bi bi-pencil-square"></i><span>Input Lapangan</span>
                                </a>
                                <ul id="input-tek" class="collapse list-unstyled pt-0">
                                    <li><a href="{{ route('teknik.produksi.input') }}">Input Produksi</a></li>
                                    <li><a href="{{ route('teknik.distribusi.input') }}">Input Distribusi</a></li>
                                    <li><a href="{{ route('teknik.perawatan-meter.input') }}">Input Perawatan Meter</a></li>
                                    <li><a href="{{ route('teknik.dma.input') }}">Input DMA</a></li>
                                    <li><a href="{{ route('keuangan.arus-kas.input') }}">Input Arus Kas</a></li>
                                    <li><a href="{{ route('spka.create') }}">Lapor Kegiatan SPKA</a></li>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                </nav>
            </div>

            <!-- Content -->
            <div class="content-inner">
                <div class="container-fluid">
                    <!-- Flash Messages -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dissmissible fade show mt-3" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                            <i class="bi bi-check-circle-fill mr-2"></i> {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dissmissible fade show mt-3" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                            <i class="bi bi-exclamation-triangle-fill mr-2"></i> {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dissmissible fade show mt-3" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>

                <!-- Footer -->
                <footer class="main-footer mt-5">
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="mb-0 text-muted">Dikembangkan Oleh Pusimpel Perumda Air Minum Tirta Kepri &copy; 2026</p>
                        </div>
                    </div>
                </footer>
                <a href="#" class="go-top"><i class="bi bi-chevron-up"></i></a>
            </div>
        </div>
    </div>

    <!-- Vendor Scripts -->
    <script src="{{ asset('assets/vendors/js/base/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/base/core.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/nicescroll/nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/chart/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/calendar/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/app/app.js') }}"></script>

    <!-- SIMPATIK Biru-Putih & Responsive Mobile Controller -->
    <script>
        $(document).ready(function() {
            // 1. Theme Management (Biru-Putih Minimalis vs Dark Mode)
            var currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
            updateThemeIcon(currentTheme);

            $('#themeToggleBtn').on('click', function(e) {
                e.preventDefault();
                var activeTheme = document.documentElement.getAttribute('data-theme') || 'light';
                var targetTheme = (activeTheme === 'dark') ? 'light' : 'dark';

                document.documentElement.setAttribute('data-theme', targetTheme);
                localStorage.setItem('simpatik_theme', targetTheme);
                updateThemeIcon(targetTheme);

                window.dispatchEvent(new CustomEvent('simpatikThemeChanged', { detail: { theme: targetTheme } }));
            });

            function updateThemeIcon(theme) {
                if (theme === 'dark') {
                    $('#themeMoonIcon').hide();
                    $('#themeSunIcon').show();
                    $('#themeToggleBtn').attr('title', 'Ganti ke Mode Terang');
                } else {
                    $('#themeSunIcon').hide();
                    $('#themeMoonIcon').show();
                    $('#themeToggleBtn').attr('title', 'Ganti ke Mode Gelap');
                }
            }

            // 2. Mobile Responsive Drawer (< 992px)
            var isMobile = function() {
                return $(window).width() < 992;
            };

            $('#toggle-btn').off('click').on('click', function(e) {
                e.preventDefault();
                if (isMobile()) {
                    $('.default-sidebar').toggleClass('mobile-open');
                    $('#sidebarBackdrop').toggleClass('active');
                    $(this).toggleClass('active');
                    $('body').toggleClass('overflow-hidden', $('.default-sidebar').hasClass('mobile-open'));
                } else {
                    $(this).toggleClass('active');
                    $('.default-sidebar, .side-navbar').toggleClass('shrinked');
                    $('.content-inner').toggleClass('active');

                    if ($('.side-navbar').hasClass('shrinked')) {
                        $('.navbar-header .brand-big').hide();
                        $('.navbar-header .brand-small').show();
                    } else {
                        $('.navbar-header .brand-big').show();
                        $('.navbar-header .brand-small').hide();
                    }
                }
            });

            // Tap backdrop to close drawer on mobile
            $('#sidebarBackdrop').on('click', function() {
                $('.default-sidebar').removeClass('mobile-open');
                $('#sidebarBackdrop').removeClass('active');
                $('#toggle-btn').removeClass('active');
                $('body').removeClass('overflow-hidden');
            });

            // Close mobile drawer when clicking navigation links
            $('.side-navbar a').on('click', function() {
                if (isMobile() && !$(this).attr('data-toggle')) {
                    $('.default-sidebar').removeClass('mobile-open');
                    $('#sidebarBackdrop').removeClass('active');
                    $('#toggle-btn').removeClass('active');
                    $('body').removeClass('overflow-hidden');
                }
            });

            // Adjust on window resize
            $(window).on('resize', function() {
                if (!isMobile()) {
                    $('.default-sidebar').removeClass('mobile-open');
                    $('#sidebarBackdrop').removeClass('active');
                    $('body').removeClass('overflow-hidden');
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>

