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
    <title>SIMPATIK V2.0 - Form Input Kegiatan SPKA</title>
    <meta name="description" content="SIMPATIK">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB861q02tPb43SuX8bSUB_mGJgo1KJ-YjE&callback=initMap"></script>
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
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #2C2955;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
            max-width: 600px;
            /* Limit the width for larger screens */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <style>
        .table th,
        .table td {
            border: 1px solid #49556B;
            text-align: center;
            /* Center-align table headers */
        }

        .text-right {
            text-align: right;
            /* Right-align numeric data */
        }
    </style>
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
                    <span class="heading">Target</span>
                    <ul class="list-unstyled">
                        <li><a href="#tek" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>TEKNIK</span></a>
                            <ul id="tek" class="collapse list-unstyled pt-0">
                                <li><a href="produksi.php">Produksi</a></li>
                                <li><a href="distribusi.php">Distribusi</a></li>
                                <li><a href="tingkat-kehilangan-air.php">Tingkat Kehilangan Air</a></li>
                                <li><a href="perawatan-meter.php">Perawatan Meter</a></li>
                                <li><a href="pemutusan-tunggakan.php">Pemutusan Tunggakan</a></li>
                            </ul>
                        </li>
                        <li><a href="#hbl" aria-expanded="false" data-toggle="collapse"><i class="la la-puzzle-piece"></i><span>HUBLANG</span></a>
                            <ul id="hbl" class="collapse list-unstyled pt-0">
                                <li><a href="drd-posting.php">DRD Posting</a></li>
                                <li><a href="pertumbuhan-pelanggan-hbl.php">Pertumbuhan Pelanggan</a></li>
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
                            <li><a href="#keuangan-input" aria-expanded="false" data-toggle="collapse"><i class="la la-file-text"></i><span>KEUANGAN</span></a>
                                <ul id="keuangan-input" class="collapse list-unstyled pt-0">
                                    <li><a href="arus-kas-input.php">Arus Kas</a></li>
                                </ul>
                            </li>
                            <li class="active"><a href="#spka-input" aria-expanded="true" data-toggle="collapse"><i class="la la-file-text"></i><span>SPKA</span></a>
                                <ul id="spka-input" class="collapse list-unstyled show pt-0">
                                    <li><a href="monitoring-dma-input.php">Monitoring DMA</a></li>
                                    <li><a class="active" href="kegiatan-spka-input.php">Kegiatan SPKA</a></li>
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
                                <h2 class="page-header-title">Form Kegiata SPKA</h2>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="i-base-tab-1" data-toggle="tab" href="#i-tab-1" role="tab" aria-controls="i-tab-1" aria-selected="true"><i class="ion-compose mr-2"></i>Form Input Kegiatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="i-base-tab-2" data-toggle="tab" href="#i-tab-2" role="tab" aria-controls="i-tab-2" aria-selected="false"><i class="ion-compose mr-2"></i>Form Update Kegiatan</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-3">
                        <div class="tab-pane fade show active" id="i-tab-1" role="tabpanel" aria-labelledby="i-base-tab-1">
                            <div class="row flex-row">
                                <div class="col-xl-12">
                                    <!-- Form -->
                                    <div class="widget has-shadow">
                                        <div class="widget-body">
                                            <div class="row flex-row justify-content-center">
                                                <div class="col-xl-10">
                                                    <div id="rootwizard">
                                                        <div class="form-group row mb-3">
                                                            <div class="col-xl-4 mb-3">
                                                                <label class="form-control-label">Pilih DMA<span class="text-danger ml-2">*</span></label>
                                                                <select id="dma" class="custom-select form-control">
                                                                    <!-- Opsi pilihan DMA akan diisi dengan AJAX -->
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-4 mb-3">
                                                                <label class="form-control-label">Kategori<span class="text-danger ml-2">*</span></label>
                                                                <select id="kategori" class="custom-select form-control">
                                                                    <option value="Debit">Debit</option>
                                                                    <option value="Fisik">Fisik</option>
                                                                    <option value="Non Fisik">Non Fisik</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-4 mb-3">
                                                                <label class="form-control-label">Tgl Lapor<span class="text-danger ml-2">*</span></label>
                                                                <input type="date" id="periode" class="form-control">
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <label class="form-control-label">Kegiatan<span class="text-danger ml-2">*</span></label>
                                                                <textarea type="text" id="kegiatan" class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-xl-12 mb-3">
                                                                <label class="form-control-label">Foto<span class="text-danger ml-2">*</span></label>
                                                                <input type="file" id="foto" class="form-control">
                                                            </div>
                                                            <div class="page-header-tools">
                                                                <a class="btn btn-gradient-01" id="postingData">Simpan</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="i-tab-2" role="tabpanel" aria-labelledby="i-base-tab-2">
                            <div class="widget-header bordered d-flex align-items-center">
                                <div class="col-lg-5">
                                    <label for="pilih-dma" class="form-control-label">Pilih DMA:</label>
                                    <select id="pilih-dma" class="custom-select form-control">
                                        <!-- Opsi pilihan DMA akan diisi dengan AJAX -->
                                    </select>
                                </div>
                                <div class="col-lg-5">
                                    <label for="periode-kegiatan" class="form-control-label">Periode Kegiatan:</label>
                                    <input type="month" id="periode-kegiatan" class="form-control" value="2024-01">
                                </div>
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-shadow" id="proses">Tampil Data</button>
                                </div>
                            </div>
                            <div class="container mt-3">
                                <div>
                                    <table class="table table-hover mb-0">
                                        <thead class="text-center">
                                            <tr>
                                                <td>No</td>
                                                <td>No Tiket</td>
                                                <td>Tgl Kegiatan</td>
                                                <td>Kategori</td>
                                                <td>Kegiatan</td>
                                                <td>Foto</td>
                                                <td>Status</td>
                                                <td>Tgl Selesai</td>
                                                <td>Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody id="order-table-body">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                    <!-- The Modal for Penyelesaian -->
                    <div id="penyelesaianModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <form id="penyelesaianForm">
                                <div class="form-group">
                                    <label for="dataKegiatan">No Tiket:</label>
                                    <input type="text" id="dataKegiatan" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tglSelesai">Tgl Selesai:</label>
                                    <input type="date" id="tglSelesai" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="petugas">Petugas:</label>
                                    <input type="text" id="petugas" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="keteranganPenyelesaian">Keterangan Penyelesaian:</label>
                                    <textarea id="keteranganPenyelesaian" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="fotoPenyelesaian">Foto Penyelesaian:</label>
                                    <input type="file" id="fotoPenyelesaian" class="form-control">
                                </div>
                                <button type="button" id="submitPenyelesaian" class="btn btn-primary">Simpan Penyelesaian</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- End Container -->
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
    <script src="assets/vendors/js/bootstrap-wizard/bootstrap.wizard.min.js"></script>
    <script src="assets/vendors/js/app/app.min.js"></script>
    <!-- End Page Vendor Js -->
    <!-- Begin Page Snippets -->
    <script src="assets/js/components/wizard/form-wizard.min.js"></script>
    <!-- End Page Snippets -->
    <!-- Scrypt Data -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modal elements
            var modal = document.getElementById("penyelesaianModal");
            var span = document.getElementsByClassName("close")[0];
            var submitPenyelesaian = document.getElementById("submitPenyelesaian");

            // Close modal when clicking on <span> (x)
            span.onclick = function() {
                modal.style.display = "none";
            }

            // Close modal when clicking outside of the modal
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            // Fetch DMA list for tab 1
            var xhrDMA = new XMLHttpRequest();
            xhrDMA.open('GET', 'assets/data/get-dma.php', true);
            xhrDMA.onload = function() {
                if (xhrDMA.status === 200) {
                    var dmas = JSON.parse(xhrDMA.responseText);
                    var dmaSelect = $('#dma');
                    dmas.forEach(function(dma) {
                        var option = document.createElement('option');
                        option.value = dma.nama_dma;
                        option.textContent = dma.nama_dma;
                        dmaSelect.append(option);
                    });
                    if (dmas.length > 0) {
                        dmaSelect.val(dmas[0].nama_dma);
                    }
                }
            };
            xhrDMA.send();

            // Posting data
            $('#postingData').click(function() {
                var formData = new FormData();
                formData.append('dma', $('#dma').val());
                formData.append('periode', $('#periode').val());
                formData.append('kategori', $('#kategori').val());
                formData.append('kegiatan', $('#kegiatan').val());
                formData.append('foto', $('#foto')[0].files[0]);

                $.ajax({
                    url: 'assets/data/save-data/kegiatan-spka-input.php',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert(response);
                    }
                });
            });

            // Fetch DMA list for tab 2
            var xhrDMA2 = new XMLHttpRequest();
            xhrDMA2.open('GET', 'assets/data/get-dma.php', true);
            xhrDMA2.onload = function() {
                if (xhrDMA2.status === 200) {
                    var dmas = JSON.parse(xhrDMA2.responseText);
                    var dmaSelect2 = $('#pilih-dma');
                    dmas.forEach(function(dma) {
                        var option = document.createElement('option');
                        option.value = dma.nama_dma;
                        option.textContent = dma.nama_dma;
                        dmaSelect2.append(option);
                    });
                }
            };
            xhrDMA2.send();

            // Fetch activities for tab 2
            $('#proses').click(function() {
                var dma = $('#pilih-dma').val();
                var periode = $('#periode-kegiatan').val();
                fetchData(dma, periode);
            });

            function fetchData(dma, periode) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'assets/data/kegiatan-spka-input.php?dma=' + encodeURIComponent(dma) + '&periode-kegiatan=' + encodeURIComponent(periode), true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        if (data.error) {
                            alert(data.error);
                        } else {
                            var tableBody = document.getElementById('order-table-body');
                            tableBody.innerHTML = '';
                            var index = 0;

                            data.forEach(function(item) {
                                var row = document.createElement('tr');
                                row.innerHTML = `
                        <td class="text-center">${++index}</td>
                        <td class="text-center">${item.tiket}</td>
                        <td class="text-center">${item.tanggal_lapor}</td>
                        <td class="text-center">${item.kategori}</td>
                        <td class="text-center">${item.kegiatan}</td>
                        <td class="text-center"><img class="clickable-image" src="assets/data/save-data/${item.foto_kegiatan}" alt="Foto Kegiatan" width="50"></td>
                        <td class="text-center">${item.status == 1 ? 'Selesai' : 'Belum Selesai'}</td>
                        <td class="text-center">${item.tanggal_selesai}</td>
                        <td class="text-center">
                            <button class="btn btn-primary proses-penyelesaian" data-tiket="${item.tiket}">Proses Penyelesaian</button>
                            <button class="btn btn-danger hapus-data" data-tiket="${item.tiket}">Hapus Data</button>
                        </td>
                    `;
                                tableBody.appendChild(row);
                            });

                            // Attach event listeners to "Proses Penyelesaian" buttons
                            document.querySelectorAll('.proses-penyelesaian').forEach(function(button) {
                                button.addEventListener('click', function() {
                                    var tiket = this.getAttribute('data-tiket');
                                    openPenyelesaianModal(tiket);
                                });
                            });

                            // Attach event listeners to "Hapus Data" buttons
                            document.querySelectorAll('.hapus-data').forEach(function(button) {
                                button.addEventListener('click', function() {
                                    var tiket = this.getAttribute('data-tiket');
                                    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                                        deleteData(tiket);
                                    }
                                });
                            });
                        }
                    }
                };
                xhr.send();
            }

            function deleteData(tiket) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'assets/data/delete-data-kegiatan.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        alert('Data berhasil dihapus!');
                        fetchData(dma, periode); // Refresh data after deletion
                    } else {
                        alert('Gagal menghapus data. Silakan coba lagi.');
                    }
                };
                xhr.send('tiket=' + encodeURIComponent(tiket));
            }

            // Open modal for penyelesaian
            function openPenyelesaianModal(tiket) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'assets/data/get-kegiatan-detail.php?tiket=' + encodeURIComponent(tiket), true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        if (data.error) {
                            alert(data.error);
                        } else {
                            document.getElementById('dataKegiatan').value = data.tiket; // Gunakan 'tiket' sebagai value
                            document.getElementById('penyelesaianModal').style.display = 'block';
                        }
                    }
                };
                xhr.send();
            }

            // Submit penyelesaian
            submitPenyelesaian.addEventListener('click', function() {
                var formData = new FormData();
                formData.append('tiket', $('#dataKegiatan').val());
                formData.append('tgl_selesai', $('#tglSelesai').val());
                formData.append('petugas', $('#petugas').val());
                formData.append('keterangan_penyelesaian', $('#keteranganPenyelesaian').val());
                formData.append('foto_penyelesaian', $('#fotoPenyelesaian')[0].files[0]);

                $.ajax({
                    url: 'assets/data/penyelesaian-kegiatan.php',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert(response);
                        modal.style.display = "none";
                        // Optionally, refresh data here
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert("Terjadi kesalahan saat menyimpan penyelesaian kegiatan.");
                    }
                });
            });
        });
    </script>
</body>

</html>