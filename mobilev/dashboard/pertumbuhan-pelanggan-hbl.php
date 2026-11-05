<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);

if ($is_logged_in) {
    $user_level = $_SESSION['lvl'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMPATIK V2.0 - Pertumbuhan Pelanggan</title>
    <meta name="description" content="SIMPATIK">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5-dark.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel/owl.theme.min.css">
    <style>
        .table th,
        .table td {
            border: 1px solid #49556B;
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .table {
            border-collapse: collapse;
        }
    </style>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body id="page-top">
    <!-- Begin Preloader -->
    <div id="preloader">
        <div class="canvas">
            <img src="assets/img/logo-2.png" alt="logo" class="loader-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- End Preloader -->
    <div class="page">
        <!-- Begin Header -->
        <header class="header">
            <nav class="navbar fixed-top">
                <!-- Begin Topbar -->
                <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                    <!-- Begin Logo -->
                    <div class="navbar-header">
                        <a href="db-default.html" class="navbar-brand">
                            <div class="brand-image brand-big">
                                <img src="assets/img/logo-big-2.png" alt="logo" class="logo-big">
                            </div>
                            <div class="brand-image brand-small">
                                <img src="assets/img/logo-2.png" alt="logo" class="logo-small">
                            </div>
                        </a>
                        <!-- Toggle Button -->
                        <a id="toggle-btn" href="#" class="menu-btn active">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        <!-- End Toggle -->
                    </div>
                    <!-- End Logo -->
                    <!-- Begin Navbar Menu -->
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                        <!-- User -->
                        <li class="nav-item dropdown">
                            <?php if ($is_logged_in) : ?>
                                <a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                                    <img src="assets/img/avatar/avatar-01.jpg" alt="..." class="avatar rounded-circle">
                                </a>
                                <ul aria-labelledby="user" class="user-size dropdown-menu">
                                    <li class="welcome">
                                        <a href="#" class="edit-profil"><i class="la la-gear"></i></a>
                                        <img src="assets/img/avatar/avatar-01.jpg" alt="..." class="rounded-circle">
                                    </li>
                                    <li>
                                        <a href="pages-profile.html" class="dropdown-item">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item no-padding-bottom">Settings</a>
                                    </li>
                                    <li>
                                        <a rel="nofollow" href="pages-logout.php" class="dropdown-item logout text-center"><i class="ti-power-off"></i></a>
                                    </li>
                                </ul>
                            <?php else : ?>
                                <button type="button" class="btn btn-shadow mr-1 mb-2" onclick="window.location.href='pages-login.html'">Login</button>
                            <?php endif; ?>
                        </li>
                        <!-- End User -->
                    </ul>
                    <!-- End Navbar Menu -->
                </div>
                <!-- End Topbar -->
            </nav>
        </header>
        <!-- End Header -->
        <!-- Begin Page Content -->
        <div class="page-content d-flex align-items-stretch">
            <div class="default-sidebar">
                <!-- Begin Side Navbar -->
                <nav class="side-navbar box-scroll sidebar-scroll">
                    <!-- Begin Main Navigation -->
                    <ul class="list-unstyled">
                        <span class="heading">Kinerja</span>
                        <li><a href="#keuangan" aria-expanded="false" data-toggle="collapse"><i class="la la-money"></i><span>Aspek Keuangan</span></a>
                            <ul id="keuangan" class="collapse list-unstyled pt-0">
                                <li><a href="return-on-equity.php">Return on Equity</a></li>
                                <li><a href="ratio-operasi.php">Rasio Operasi</a></li>
                                <li><a href="cash-ratio.php">Rasio Kas</a></li>
                                <li><a href="efisiensi-penagihan.php">Efisiensi Penagihan</a></li>
                                <li><a href="solvabilitas.php">Solvabilitas</a></li>
                            </ul>
                        </li>
                        <li><a href="#pelayanan" aria-expanded="false" data-toggle="collapse"><i class="la la-thumbs-up"></i><span>Aspek Pelayanan</span></a>
                            <ul id="pelayanan" class="collapse list-unstyled pt-0">
                                <li><a href="cakupan-pelayanan.php">Cakupan Pelayanan</a></li>
                                <li><a href="pertumbuhan-pelanggan.php">Pertumbuhan Pelanggan</a></li>
                                <li><a href="penyelesaian-pengaduan.php">Penyelesaian Pengaduan</a></li>
                                <li><a href="kualitas-air.php">Kualitas Air</a></li>
                                <li><a href="konsumsi-air.php">Konsumsi Air</a></li>
                            </ul>
                        </li>
                        <li><a href="#operasional" aria-expanded="false" data-toggle="collapse"><i class="la la-tint"></i><span>Aspek Operasional</span></a>
                            <ul id="operasional" class="collapse list-unstyled pt-0">
                                <li><a href="rasio-efisiensi-produksi.php">Rasio Efisiensi Produksi</a></li>
                                <li><a href="air-tidak-berekening.php">Air Tidak Berekening</a></li>
                                <li><a href="jam-operasi.php">Jam Operasi</a></li>
                                <li><a href="tekanan-air.php">Tekanan Air</a></li>
                                <li><a href="penggantian-meter.php">Penggantian Meter</a></li>
                            </ul>
                        </li>
                        <li><a href="#sdm" aria-expanded="false" data-toggle="collapse"><i class="la la-group"></i><span>Aspek SDM</span></a>
                            <ul id="sdm" class="collapse list-unstyled pt-0">
                                <li><a href="jumlah-pegawai.php">Jumlah Pegawai</a></li>
                                <li><a href="rasio-pegawai-diklat.php">Rasio Pegawai Diklat</a></li>
                                <li><a href="rasio-biaya-diklat.php">Rasio Biaya Diklat</a></li>
                            </ul>
                        </li>
                    </ul>
                    <span class="heading">Target x Realisasi</span>
                    <ul class="list-unstyled">
                        <li><a href="#tek" aria-expanded="true" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>TEKNIK</span></a>
                            <ul id="tek" class="collapse list-unstyled pt-0">
                                <li><a href="produksi.php">Produksi</a></li>
                                <li><a href="distribusi.php">Distribusi</a></li>
                                <li><a href="tingkat-kehilangan-air.php">Tingkat Kehilangan Air</a></li>
                                <li><a href="perawatan-meter.php">Perawatan Meter</a></li>
                                <li><a href="pemutusan-tunggakan.php">Pemutusan Tunggakan</a></li>
                            </ul>
                        </li>
                        <li class="active"><a href="#hbl" aria-expanded="true" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>HUBLANG</span></a>
                            <ul id="hbl" class="collapse list-unstyled show pt-0">
                                <li><a href="drd-posting.php">DRD Posting</a></li>
                                <li><a class="active" href="pertumbuhan-pelanggan-hbl.php">Pertumbuhan Pelanggan</a></li>
                                <li><a href="pengaduan-pelanggan.php">Pengaduan Pelanggan</a></li>
                                <li><a href="perbaikan-rekening.php">Perbaikan Rekening</a></li>
                                <li><a href="pembacaan-meter.php">Pembacaan Meter</a></li>
                            </ul>
                        </li>
                        <li><a href="#keu" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>KEUANGAN</span></a>
                            <ul id="keu" class="collapse list-unstyled pt-0">
                                <li><a href="efisiensi-penagihan-keu.php">Efisiensi Penagihan</a></li>
                                <li><a href="arus-kas.php">Arus Kas</a></li>
                            </ul>
                        </li>
                        <li><a href="#spi" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>SPI</span></a>
                            <ul id="spi" class="collapse list-unstyled pt-0">
                                <li><a href="tunggakan-empat-bulan.php">Tunggakan > 4 Bulan</a></li>
                                <li><a href="monitoring-spi.php">Monitoring SPI</a></li>
                            </ul>
                        </li>
                        <li><a href="#spka" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>SPKA</span></a>
                            <ul id="spka" class="collapse list-unstyled pt-0">
                                <li><a href="monitoring-dma.php">Monitoring DMA</a></li>
                                <li><a href="kegiatan-spka.php">Kegiatan SPKA</a></li>
                                <li><a href="gis.php">GIS</a></li>
                            </ul>
                        </li>
                    </ul>
                    <span class="heading">Input Data</span>
                    <ul class="list-unstyled">
                        <?php if ($is_logged_in) : ?>
                            <li><a href="#aspek-input" aria-expanded="false" data-toggle="collapse"><i class="la la-file-text"></i><span>Posting Kinerja</span></a>
                                <ul id="aspek-input" class="collapse list-unstyled pt-0">
                                    <li><a href="aspek-keuangan-input.php">Aspek Keuangan</a></li>
                                    <li><a href="aspek-pelayanan-input.php">Aspek Pelayanan</a></li>
                                    <li><a href="aspek-operasional-input.php">Aspek Operasional</a></li>
                                    <li><a href="aspek-sdm-input.php">Aspek SDM</a></li>
                                </ul>
                            </li>
                            <li><a href="#produksi-input" aria-expanded="false" data-toggle="collapse"><i class="la la-file-text"></i><span>TEKNIK</span></a>
                                <ul id="produksi-input" class="collapse list-unstyled pt-0">
                                    <li><a href="produksi-input.php">Produksi</a></li>
                                    <li><a href="distribusi-input.php">Distribusi</a></li>
                                    <li><a href="perawatan-meter-input.php">Perawatan Meter</a></li>
                                </ul>
                            </li>
                            <li><a href="#spka-input" aria-expanded="false" data-toggle="collapse"><i class="la la-file-text"></i><span>SPKA</span></a>
                                <ul id="spka-input" class="collapse list-unstyled pt-0">
                                    <li><a href="monitoring-dma-input.php">Monitoring DMA</a></li>
                                    <li><a href="kegiatan-spka-input.php">Kegiatan SPKA</a></li>
                                </ul>
                            </li>
                            <li><a href="#spi-input" aria-expanded="false" data-toggle="collapse"><i class="la la-file-text"></i><span>SPI</span></a>
                                <ul id="spi-input" class="collapse list-unstyled pt-0">
                                    <li><a href="monitoring-spi-input.php">Monitoring SPI</a></li>
                                </ul>
                            </li>
                            <li><a href="#user-input" aria-expanded="false" data-toggle="collapse"><i class="la la-key"></i><span>Users</span></a>
                                <ul id="user-input" class="collapse list-unstyled pt-0">
                                    <li><a href="registrasi.php">Registrasi</a></li>
                                    <li><a href="reset-password.php">Reset Password</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <!-- End Main Navigation -->
                </nav>
                <!-- End Side Navbar -->
            </div>
            <!-- End Left Sidebar -->
            <div class="content-inner">
                <div class="container-fluid">
                    <!-- Begin Page Header-->
                    <div class="row">
                        <div class="page-header">
                            <div class="d-flex align-items-center">
                                <h2 class="page-header-title">Pertumbuhan Pelanggan</h2>
                                <div>
                                    <div class="page-header-tools">
                                        <a class="btn btn-gradient-01" href="index.php">Dashboard</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <div class="widget-body">
                        <div class="tab-content pt-3">
                            <!-- Begin Row -->
                            <div class="row flex-row">
                                <!-- Begin Facebook -->
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <!-- Pie Chart -->
                                    <div class="widget has-shadow">
                                        <div class="widget-header bordered no-actions d-flex align-items-center">
                                            <h4>Diaktifkan X Diputus</h4>
                                        </div>
                                        <div class="widget-header bordered d-flex align-items-center">
                                            <div class="col-lg-5">
                                                <label for="periode" class="form-control-label">Periode:</label>
                                                <input type="month" id="periode-pie" class="form-control">
                                            </div>
                                            <div class="col-lg-5">
                                                <label for="wilayah" class="form-control-label">Wilayah:</label>
                                                <select id="wilayah-pie" class="custom-select form-control">
                                                    <option value="tanjungpinang">Tanjungpinang</option>
                                                    <option value="kijang">Kijang</option>
                                                    <option value="tanjunguban">Tanjung Uban</option>
                                                    <option value="all">All</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-0">
                                                <button type="button" class="btn btn-shadow" id="proses-pie">Tampil</button>
                                            </div>
                                        </div>
                                        <div class="widget-body">
                                            <div class="chart">
                                                <canvas id="pie-chart1"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Pie Chart -->
                                </div>
                                <!-- End Facebook -->
                                <!-- Begin Twitter -->
                                <div class="col-xl-6 col-md-6 col-sm-6">
                                    <!-- Pie Chart -->
                                    <div class="widget has-shadow">
                                        <div class="widget-header bordered no-actions d-flex align-items-center">
                                            <h4>Aktif X Putus (Sampai saat ini)</h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="chart">
                                                <canvas id="pie-chart2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Pie Chart -->
                                </div>
                                <!-- End Twitter -->
                            </div>
                            <!-- End Row -->
                            <div class="row flex-row">
                                <div class="col-xl-12 col-md-6">
                                    <!-- Begin Widget 04 -->
                                    <div class="widget widget-07 has-shadow">
                                        <!-- Begin Widget Header -->
                                        <div class="widget-header bordered d-flex align-items-center">
                                            <div class="col-lg-5">
                                                <label for="periode" class="form-control-label">Periode:</label>
                                                <input type="month" id="periode" class="form-control">
                                            </div>
                                            <div class="col-lg-5">
                                                <label for="wilayah" class="form-control-label">Wilayah:</label>
                                                <select id="wilayah" class="custom-select form-control">
                                                    <option value="tanjungpinang">Tanjungpinang</option>
                                                    <option value="kijang">Kijang</option>
                                                    <option value="tanjunguban">Tanjung Uban</option>
                                                    <option value="all">All</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="button" class="btn btn-shadow" id="proses">Tampil Data</button>
                                            </div>
                                        </div>
                                        <!-- End Widget Header -->
                                        <!-- Begin Widget Body -->
                                        <div class="container mt-3">
                                            <div>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td rowspan="2">Golongan</td>
                                                            <td colspan="7">Pelanggan</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Samb Baru</td>
                                                            <td>Samb Kembali</td>
                                                            <td>Putus Tngkn</td>
                                                            <td>Putus Smntr</td>
                                                            <td>Aktif</td>
                                                            <td>Putus</td>
                                                            <td>Total</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="order-table-body">
                                                    </tbody>
                                                    <tfoot id="order-table-footer">
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- End Widget Body -->
                                    </div>
                                    <!-- End Widget 04 -->
                                </div>
                            </div>
                            <!-- End Row -->

                        </div>
                    </div>
                </div>
                <!-- End Container -->
                <!-- Begin Page Footer-->
                <footer class="main-footer">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                            <p class="text-gradient-02">Develop With <i class="text-danger">&hearts;</i> by Farhan</p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="documentation.html">Documentation</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </footer>
                <!-- End Page Footer -->
                <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
            </div>
            <!-- End Content -->
        </div>
        <!-- End Page Content -->
    </div>
    <!-- Begin Vendor Js -->
    <script src="assets/vendors/js/base/jquery.min.js"></script>
    <script src="assets/vendors/js/base/core.min.js"></script>
    <!-- End Vendor Js -->
    <!-- Begin Page Vendor Js -->
    <script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
    <script src="assets/vendors/js/chart/chart.min.js"></script>
    <script src="assets/vendors/js/progress/circle-progress.min.js"></script>
    <script src="assets/vendors/js/calendar/moment.min.js"></script>
    <script src="assets/vendors/js/calendar/fullcalendar.min.js"></script>
    <script src="assets/vendors/js/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/vendors/js/app/app.js"></script>
    <!-- End Page Vendor Js -->
    <!-- Begin Page Snippets -->
    <script src="assets/js/dashboard/pertumbuhan-pelanggan-hbl.js"></script>
    <!-- End Page Snippets -->

    <!-- script tabel -->
    <script>
        $(document).ready(function() {
            const golonganNames = {
                'IA': 'Sosial Umum',
                'IB': 'Sosial Khusus',
                'IIA': 'Rumah Tangga',
                'IIB': 'Instansi Pemerintah',
                'IIIA': 'Niaga Kecil',
                'IIIB': 'Niaga Besar',
                'IV': 'Industri',
                'V': 'Golongan Khusus'
            };

            function getFormattedPeriode(periode) {
                let [year, month] = periode.split("-");
                return `${year}${month}`;
            }

            function fetchData(periode, wilayah) {
                $.ajax({
                    url: 'assets/data/pertumbuhan-pelanggan-hbl.php',
                    method: 'GET',
                    data: {
                        periode: periode,
                        wilayah: wilayah
                    },
                    dataType: 'json',
                    success: function(data) {
                        let tableBody = $('#order-table-body');
                        let tableFooter = $('#order-table-footer');
                        tableBody.empty();
                        tableFooter.empty();

                        data.sort((a, b) => (a.kodegol > b.kodegol) ? 1 : -1);

                        let totalSambBaru = 0;
                        let totalSambKembali = 0;
                        let totalDiputus = 0;
                        let totalPutusSementara = 0;
                        let totalAktif = 0;
                        let totalPutus = 0;
                        let totalTotal = 0;

                        data.forEach(order => {
                            let golonganName = golonganNames[order.kodegol] || order.kodegol;
                            let sambBaru = parseInt(order.sambbaru);
                            let sambKembali = parseInt(order.sambkembali);
                            let diputus = parseInt(order.diputus);
                            let putusSementara = parseInt(order.putussementara);
                            let aktif = parseInt(order.aktif);
                            let putus = parseInt(order.putus);
                            let total = aktif + putus;

                            totalSambBaru += sambBaru;
                            totalSambKembali += sambKembali;
                            totalDiputus += diputus;
                            totalPutusSementara += putusSementara;
                            totalAktif += aktif;
                            totalPutus += putus;
                            totalTotal += total;

                            let row = `
                        <tr>
                            <td>${golonganName}</td>
                            <td class="text-center">${sambBaru.toLocaleString('id-ID')}</td>
                            <td class="text-center">${sambKembali.toLocaleString('id-ID')}</td>
                            <td class="text-center">${diputus.toLocaleString('id-ID')}</td>
                            <td class="text-center">${putusSementara.toLocaleString('id-ID')}</td>
                            <td class="text-center">${aktif.toLocaleString('id-ID')}</td>
                            <td class="text-center">${putus.toLocaleString('id-ID')}</td>
                            <td class="text-center">${total.toLocaleString('id-ID')}</td>
                        </tr>
                    `;
                            tableBody.append(row);
                        });

                        let footer = `
                    <tr>
                        <td><strong>Jumlah</strong></td>
                        <td class="text-center"><strong>${totalSambBaru.toLocaleString('id-ID')}</strong></td>
                        <td class="text-center"><strong>${totalSambKembali.toLocaleString('id-ID')}</strong></td>
                        <td class="text-center"><strong>${totalDiputus.toLocaleString('id-ID')}</strong></td>
                        <td class="text-center"><strong>${totalPutusSementara.toLocaleString('id-ID')}</strong></td>
                        <td class="text-center"><strong>${totalAktif.toLocaleString('id-ID')}</strong></td>
                        <td class="text-center"><strong>${totalPutus.toLocaleString('id-ID')}</strong></td>
                        <td class="text-center"><strong>${totalTotal.toLocaleString('id-ID')}</strong></td>
                    </tr>
                `;
                        tableFooter.append(footer);
                    },
                    error: function() {
                        console.log('Data Belum Tersedia');
                    }
                });
            }

            function setDefaultPeriode() {
                const date = new Date();
                date.setMonth(date.getMonth() - 1);
                const year = date.getFullYear();
                const month = ("0" + (date.getMonth() + 1)).slice(-2);
                return `${year}-${month}`;
            }

            $('#periode').val(setDefaultPeriode());
            $('#wilayah').val("all");

            fetchData(getFormattedPeriode($('#periode').val()), $('#wilayah').val());

            $('#proses').on('click', function() {
                let periode = getFormattedPeriode($('#periode').val());
                let wilayah = $('#wilayah').val();
                fetchData(periode, wilayah);
            });
        });
    </script>
</body>

</html>