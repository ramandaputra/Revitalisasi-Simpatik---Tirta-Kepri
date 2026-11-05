<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/jquery.dataTables.css" rel="stylesheet" media="screen">
    <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" media="screen">

</head>
<style>
    /* Table styles */
    .info-table {
        margin-top: 1rem;
        border-collapse: collapse;
        width: 100%;
    }

    .info-table th,
    .info-table td {
        border: none;
        padding: 0.25rem;
        /* Reduced padding for compact appearance */
        text-align: left;
    }

    .info-table th {
        font-weight: bold;
    }

    .info-table td {
        font-size: 0.875rem;
        /* Default font size */
    }

    .info-table tr:not(:last-child) td {
        border-bottom: 1px solid #ddd;
        /* Light border for separation */
    }

    /* Responsive Font Sizes */
    .font-small {
        font-size: 0.875rem;
        /* Small font size */
    }

    .font-medium {
        font-size: 1rem;
        /* Medium font size for tablets and desktops */
    }

    .font-large {
        font-size: 1.25rem;
        /* Large font size for larger screens */
    }

    /* Text alignment */
    .text-center {
        text-align: center;
    }

    /* Table container styles */
    .table-container {
        overflow: auto;
        width: 100%;
        height: 460px;
        padding: 10px;
        border: 1px solid white;
    }

    /* Font size adjustments for different screen sizes */
    @media (max-width: 576px) {

        .table th,
        .table td {
            font-size: 0.75rem;
            /* Smallest font size for mobile screens */
        }
    }

    @media (min-width: 576px) {

        .table th,
        .table td {
            font-size: 0.875rem;
            /* Font size for small tablets and larger screens */
        }
    }

    @media (min-width: 768px) {

        .table th,
        .table td {
            font-size: 1rem;
            /* Font size for tablets and desktops */
        }
    }

    @media (min-width: 992px) {

        .table th,
        .table td {
            font-size: 1.125rem;
            /* Font size for large screens */
        }
    }

    /* Custom text colors */
    .text-success-custom {
        color: #28a745;
        /* Green color for success messages */
    }

    .text-danger-custom {
        color: #dc3545;
        /* Red color for error or danger messages */
    }
</style>

<Body>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tagihan" data-toggle="tab"><img src="assets/img/1.png" height="80" width="40" class="brand"></img></a></li>
        <li><a href="#pemakaian" data-toggle="tab"><img src="assets/img/2.png" height="80" width="40" class="brand"></img></a></li>
        <li><a href="#pembayaran" data-toggle="tab"><img src="assets/img/3.png" height="80" width="40" class="brand"></img></a></li>
        <li><a href="#lokasi" data-toggle="tab"><img src="assets/img/5.png" height="80" width="40" class="brand"></img></a></li>
        <li><a href="#calculator" data-toggle="tab"><img src="assets/img/4.png" height="80" width="40" class="brand"></img></a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="tagihan">
            <u>Tagihan</u>
            <div class="container mt-4">
                <?php
                include "koneksi.php";
                $data = $_POST['search'];
                $wilayah = $_POST['wilayah'];
                $pelanggan = mysqli_query($db, "(SELECT a.nosamb,a.nama,b.golongan,a.alamat,a.serimeter,CASE WHEN a.status='1' THEN 'AKTIF' WHEN a.status='0' THEN 'NONAKTIF' END AS status, a.kodesumberair, c.nama_dma AS dma FROM pelanggan a LEFT JOIN golongan b ON a.kodegol=b.kodegol LEFT JOIN dma c ON a.kodedma=c.kodedma WHERE LEFT(a.nosamb,2) IN ($wilayah) AND RIGHT(a.nosamb,5)='$data')");
                while ($dat = mysqli_fetch_array($pelanggan)) {
                ?>
                    <div class="mb-3">
                        <table class="table info-table">
                            <tbody>
                                <tr>
                                    <th>NOSAMB</th>
                                    <td>: <?php echo $dat['nosamb']; ?></td>
                                </tr>
                                <tr>
                                    <th>NAMA</th>
                                    <td>: <?php echo $dat['nama']; ?></td>
                                </tr>
                                <tr>
                                    <th>GOLONGAN</th>
                                    <td>: <?php echo $dat['golongan']; ?></td>
                                </tr>
                                <tr>
                                    <th>ALAMAT</th>
                                    <td>: <?php echo $dat['alamat']; ?></td>
                                </tr>
                                <tr>
                                    <th>SERI MTR</th>
                                    <td>: <?php echo $dat['serimeter']; ?></td>
                                </tr>
                                <tr>
                                    <th>STATUS</th>
                                    <td>: <?php echo $dat['status']; ?></td>
                                </tr>
                                <tr>
                                    <th>JDU</th>
                                    <td>: <?php echo $dat['kodesumberair']; ?></td>
                                </tr>
                                <tr>
                                    <th>DMA</th>
                                    <td>: <?php echo $dat['dma']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php
                }
                ?>
            </div>
            <br>
            <tr>
                <td width="65%">
                    <font color="blue" size="2">Detail Tagihan</font>
                </td>
            </tr>

            <div class="container mt-4">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center font-medium">Periode</th>
                                <th class="text-center font-medium">Lalu</th>
                                <th class="text-center font-medium">Kini</th>
                                <th class="text-center font-medium">Pakai</th>
                                <th class="text-center font-medium">Denda</th>
                                <th class="text-center font-medium">Tagihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cek = mysqli_query($db, "(SELECT bulan,FORMAT(stanlalu,0,'de_DE') AS lalu,FORMAT(stanskrg,0,'de_DE') AS kini,FORMAT(pakai,0) AS pakai,FORMAT(COALESCE(
                    IF( trf_dendatunggakan4>0 AND NOW()>=tglmulaidenda4, trf_dendatunggakan4, 
                    IF( trf_dendatunggakan3>0 AND NOW()>=tglmulaidenda3, trf_dendatunggakan3, 
                    IF( trf_dendatunggakan2>0 AND NOW()>=tglmulaidenda2, trf_dendatunggakan2, 
                    IF( trf_dendatunggakan>0 AND NOW()>=tglmulaidenda, trf_dendatunggakan , 0))))),0,'de_DE') AS denda,
                    FORMAT(rekair+COALESCE(
                    IF( trf_dendatunggakan4>0 AND NOW()>=tglmulaidenda4, trf_dendatunggakan4, 
                    IF( trf_dendatunggakan3>0 AND NOW()>=tglmulaidenda3, trf_dendatunggakan3, 
                    IF( trf_dendatunggakan2>0 AND NOW()>=tglmulaidenda2, trf_dendatunggakan2, 
                    IF( trf_dendatunggakan>0 AND NOW()>=tglmulaidenda, trf_dendatunggakan , 0))))),0,'de_DE') AS total FROM piutang WHERE flaglunas='0' AND LEFT(nosamb,2) IN ($wilayah) AND RIGHT(nosamb,5)='$data')");
                            while ($info = mysqli_fetch_array($cek)) {
                            ?>
                                <tr>
                                    <td class="text-center font-small"><?php echo $info['bulan']; ?></td>
                                    <td class="text-center font-small"><?php echo $info['lalu']; ?></td>
                                    <td class="text-center font-small"><?php echo $info['kini']; ?></td>
                                    <td class="text-center font-small"><?php echo $info['pakai']; ?></td>
                                    <td class="text-right font-small"><?php echo $info['denda']; ?></td>
                                    <td class="text-right font-small"><?php echo $info['total']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <?php
                            $jum = mysqli_query($db, "(SELECT CASE WHEN COUNT(*)='0' THEN 'Tagihan anda sudah lunas' WHEN COUNT(*)='1' THEN '' END AS kondisi, FORMAT(SUM(rekair)+SUM(COALESCE(
        IF( trf_dendatunggakan4>0 AND NOW()>=tglmulaidenda4, trf_dendatunggakan4, 
        IF( trf_dendatunggakan3>0 AND NOW()>=tglmulaidenda3, trf_dendatunggakan3, 
        IF( trf_dendatunggakan2>0 AND NOW()>=tglmulaidenda2, trf_dendatunggakan2, 
        IF( trf_dendatunggakan>0 AND NOW()>=tglmulaidenda, trf_dendatunggakan , 0)))))),0,'de_DE') AS jumlah 
        FROM piutang WHERE flaglunas='0' AND LEFT(nosamb,2) IN ($wilayah) AND RIGHT(nosamb,5)='$data')");
                            while ($juml = mysqli_fetch_array($jum)) {
                            ?>
                                <tr>
                                    <th colspan="5" class="font-medium">Total Tagihan</th>
                                    <td class="text-right font-medium"><?php echo $juml['jumlah']; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <span class="text-success-custom font-large"><?php echo $juml['kondisi']; ?></span>
                                    </td>
                                </tr>
                                <?php if ($juml['jumlah'] > 0) { ?>
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentModal">
                                                Bayar
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php
                            }
                            ?>
                        </tfoot>
                    </table>
                    <!-- Modal untuk metode pembayaran -->
                    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="paymentModalLabel">Pilih Metode Pembayaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <table class="table table-borderless text-center">
                                            <tbody>
                                                <?php
                                                $paymentMethods = [
                                                    'Akulaku',
                                                    'Brimo',
                                                    'Bukalapak',
                                                    'Dana',
                                                    'Gopay',
                                                    'Kredivo',
                                                    'Lazada',
                                                    'LinkAja',
                                                    'OVO',
                                                    'Sepulsa',
                                                    'Shopee Pay',
                                                    'Tokopedia'
                                                ];
                                                $count = 0;
                                                echo '<tr>'; // Start the first row
                                                foreach ($paymentMethods as $method) {
                                                    echo '<td>';
                                                    echo '<button class="btn btn-light payment-icon" data-toggle="tooltip" title="' . $method . '">';
                                                    echo '<img src="assets/img/' . $method . '.png" class="img-fluid" style="width: 60px; height: 60px;">';
                                                    echo '</button>';
                                                    echo '</td>';

                                                    $count++;
                                                    if ($count % 3 == 0) {
                                                        echo '</tr><tr>'; // Start a new row every 3 icons
                                                    }
                                                }
                                                // Close the last row if needed
                                                if ($count % 3 != 0) {
                                                    echo str_repeat('<td></td>', 3 - ($count % 3)); // Fill empty cells in last row
                                                    echo '</tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="pemakaian">
            <u>Riwayat Pemakaian</u>
            <div>
                <?php
                $petugas = mysqli_query($bacameter, "(SELECT namapetugas FROM hasilbaca0924 WHERE RIGHT(idpelanggan,5)='$data' LIMIT 1)");
                while ($bcm = mysqli_fetch_array($petugas)) {
                ?>
                    <p class="font-small">Baca Meter: <?php echo $bcm['namapetugas']; ?></p>
                <?php
                }
                ?>
            </div>
            <br>
            <div style="overflow:auto; width:100%; height:460px; padding:10px; border:1px solid white">
                <div class="container">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center font-small">
                                        Periode
                                    </th>
                                    <th class="text-center font-small">
                                        Lalu
                                    </th>
                                    <th class="text-center font-small">
                                        Kini
                                    </th>
                                    <th class="text-center font-small">
                                        Pakai
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cek = mysqli_query($db, "(SELECT bulan,FORMAT(stanlalu,0,'de_DE') AS lalu,FORMAT(stanskrg,0,'de_DE') AS kini,FORMAT(pakai,0) AS pakai FROM bayar WHERE LEFT(nosamb,2) IN ($wilayah) AND RIGHT(nosamb,5)='$data' ORDER BY periode DESC LIMIT 12)");
                                while ($info = mysqli_fetch_array($cek)) {
                                ?>
                                    <tr>
                                        <td class="text-center font-small">
                                            <?php echo $info['bulan']; ?>
                                        </td>
                                        <td class="text-center font-small">
                                            <?php echo $info['lalu']; ?>
                                        </td>
                                        <td class="text-center font-small">
                                            <?php echo $info['kini']; ?>
                                        </td>
                                        <td class="text-center font-small">
                                            <?php echo $info['pakai']; ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="pembayaran">
            <u>Riwayat Pembayaran</u>

            <br><br>

            <div class="table-container">
                <div class="container">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center font-small">
                                        Periode
                                    </th>
                                    <th class="text-center font-small">
                                        Pakai
                                    </th>
                                    <th class="text-center font-small">
                                        Total
                                    </th>
                                    <th class="text-center font-small">
                                        Loket
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cek = mysqli_query($db, "(SELECT bulan,FORMAT(pakai,0) AS pakai,FORMAT(total,0,'de_DE') AS total, loketbayar AS loket FROM bayar WHERE flaglunas='1' AND LEFT(nosamb,2) IN ($wilayah) AND RIGHT(nosamb,5)='$data' ORDER BY periode DESC LIMIT 12)");
                                while ($info = mysqli_fetch_array($cek)) {
                                ?>
                                    <tr>
                                        <td class="text-center font-small">
                                            <?php echo $info['bulan']; ?>
                                        </td>
                                        <td class="text-center font-small">
                                            <?php echo $info['pakai']; ?>
                                        </td>
                                        <td class="text-center font-small">
                                            <?php echo $info['total']; ?>
                                        </td>
                                        <td class="text-center font-small">
                                            <?php echo $info['loket']; ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="lokasi">
            <u>Lokasi Pelanggan</u>
            <br>
            <br>
            <div style="overflow:auto; width:100%px; height:460px; padding:10px; border:1px solid white">
                <div class="container">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <tbody>
                                <?php
                                $idpelanggan = $dat['nosamb'];
                                $latlong = mysqli_query($bacameter, "(SELECT CONCAT(idpelanggan,'R.JPG') AS foto, latitude, longitude FROM hasilbaca0924 WHERE LEFT(idpelanggan,2) IN ($wilayah) AND RIGHT(idpelanggan,5)='$data')");
                                while ($lokasi = mysqli_fetch_array($latlong)) {
                                    $fotoPath = "http://server.tirtakepri.co.id/foto/fotorumah/" . $lokasi['foto'];
                                ?>
                                    <tr>
                                        <td>
                                            <button type="submit" class="btn btn-primary" name="Submit" value="Map" onClick='top.location="https://www.google.com/maps/search/?api=1&query=<?php echo $lokasi['latitude']; ?>,<?php echo $lokasi['longitude']; ?>"'>Mendapatkan Rute</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php if (@getimagesize($fotoPath)) { ?>
                                                <img src="<?php echo $fotoPath; ?>">
                                            <?php } else { ?>
                                                <p>Foto belum tersedia</p>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="calculator">
            <u>Kalkulator Tarif</u>
            <p></p>
            <div class="table-responsive">
                <form class="form-horizontal" action="" method="post">
                    <label>Golongan</label>
                    <select id="golongan" name="golongan" class="form-control">
                        <option value="1">Sosial Umum</option>
                        <option value="2">Sosial Khusus</option>
                        <option value="3">Rumah Tangga</option>
                        <option value="4">Instansi Pemerintah</option>
                        <option value="5">Niaga Kecil</option>
                        <option value="6">Niaga Besar</option>
                        <option value="7">Industri</option>
                        <option value="8">Golongan Khusus</option>
                    </select>
                    <p></p>
                    <label>Ukuran Meter</label>
                    <select id="diameter" name="diameter" class="form-control">
                        <option value="11500">0.5 inch</option>
                        <option value="26500">1 inch</option>
                        <option value="36500">1.5 inch</option>
                        <option value="56500">2 inch</option>
                        <option value="106500">3 inch</option>
                        <option value="16500">3/4 inch</option>
                    </select>
                    <p></p>
                    <input type="number" name="pakai" id="pakai" class="form-control" placeholder="Pemakaian Air (m3)">
                    <input type="button" class="btn btn-success" value="Hitung" onclick="data()">
                    <label class="col-lg-3 control-label">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control" Readonly>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script type="text/javascript">
    function data() {
        var d = $("#diameter").val();

        var iaa = 52500 + (($("#pakai").val() - 30) * 1750) + parseFloat(d);
        var iab = 35000 + (($("#pakai").val() - 20) * 1750) + parseFloat(d);
        var iac = 17500 + (($("#pakai").val() - 10) * 1750) + parseFloat(d);
        var iad = 17500 + parseFloat(d);

        var iba = 77500 + (($("#pakai").val() - 30) * 3850) + parseFloat(d);
        var ibb = 47500 + (($("#pakai").val() - 20) * 3000) + parseFloat(d);
        var ibc = 21500 + (($("#pakai").val() - 10) * 2600) + parseFloat(d);
        var ibd = 21500 + parseFloat(d);

        var iiaa = 118000 + (($("#pakai").val() - 30) * 7500) + parseFloat(d);
        var iiab = 64500 + (($("#pakai").val() - 20) * 5350) + parseFloat(d);
        var iiac = 26000 + (($("#pakai").val() - 10) * 3850) + parseFloat(d);
        var iiad = 26000 + parseFloat(d);

        var iiba = 165500 + (($("#pakai").val() - 30) * 9200) + parseFloat(d);
        var iibb = 94500 + (($("#pakai").val() - 20) * 7100) + parseFloat(d);
        var iibc = 41000 + (($("#pakai").val() - 10) * 5350) + parseFloat(d);
        var iibd = 41000 + parseFloat(d);

        var iiiaa = 216500 + (($("#pakai").val() - 30) * 11800) + parseFloat(d);
        var iiiab = 124500 + (($("#pakai").val() - 20) * 9200) + parseFloat(d);
        var iiiac = 53500 + (($("#pakai").val() - 10) * 7100) + parseFloat(d);
        var iiiad = 53500 + parseFloat(d);

        var iiiba = 311000 + (($("#pakai").val() - 30) * 15000) + parseFloat(d);
        var iiibb = 193000 + (($("#pakai").val() - 20) * 11800) + parseFloat(d);
        var iiibc = 96500 + (($("#pakai").val() - 10) * 9650) + parseFloat(d);
        var iiibd = 96500 + parseFloat(d);

        var iva = 269800 + (($("#pakai").val() - 30) * 17150) + parseFloat(d);
        var ivb = 129800 + (($("#pakai").val() - 20) * 14000) + parseFloat(d);
        var ivc = 11800 + (($("#pakai").val() - 10) * 11800) + parseFloat(d);
        var ivd = 11800 + parseFloat(d);

        var va = 420000 + (($("#pakai").val() - 30) * 19300) + parseFloat(d);
        var vb = 280000 + (($("#pakai").val() - 20) * 14000) + parseFloat(d);
        var vc = 140000 + (($("#pakai").val() - 10) * 14000) + parseFloat(d);
        var vd = 140000 + parseFloat(d);

        if (($("#pakai").val() > 30) && ($("#golongan").val() == 1)) {
            total = iaa;
        } else if (($("#pakai").val() > 20) && ($("#golongan").val() == 1)) {
            total = iab;
        } else if (($("#pakai").val() > 10) && ($("#golongan").val() == 1)) {
            total = iac;
        } else if (($("#pakai").val() < 11) && ($("#golongan").val() == 1)) {
            total = iad;
        } else if (($("#pakai").val() > 30) && ($("#golongan").val() == 2)) {
            total = iba;
        } else if (($("#pakai").val() > 20) && ($("#golongan").val() == 2)) {
            total = ibb;
        } else if (($("#pakai").val() > 10) && ($("#golongan").val() == 2)) {
            total = ibc;
        } else if (($("#pakai").val() < 11) && ($("#golongan").val() == 2)) {
            total = ibd;
        } else if (($("#pakai").val() > 30) && ($("#golongan").val() == 3)) {
            total = iiaa;
        } else if (($("#pakai").val() > 20) && ($("#golongan").val() == 3)) {
            total = iiab;
        } else if (($("#pakai").val() > 10) && ($("#golongan").val() == 3)) {
            total = iiac;
        } else if (($("#pakai").val() < 11) && ($("#golongan").val() == 3)) {
            total = iiad;
        } else if (($("#pakai").val() > 30) && ($("#golongan").val() == 4)) {
            total = iiba;
        } else if (($("#pakai").val() > 20) && ($("#golongan").val() == 4)) {
            total = iibb;
        } else if (($("#pakai").val() > 10) && ($("#golongan").val() == 4)) {
            total = iibc;
        } else if (($("#pakai").val() < 11) && ($("#golongan").val() == 4)) {
            total = iibd;
        } else if (($("#pakai").val() > 30) && ($("#golongan").val() == 5)) {
            total = iiiaa;
        } else if (($("#pakai").val() > 20) && ($("#golongan").val() == 5)) {
            total = iiiab;
        } else if (($("#pakai").val() > 10) && ($("#golongan").val() == 5)) {
            total = iiiac;
        } else if (($("#pakai").val() < 11) && ($("#golongan").val() == 5)) {
            total = iiiad;
        } else if (($("#pakai").val() > 30) && ($("#golongan").val() == 6)) {
            total = iiiba;
        } else if (($("#pakai").val() > 20) && ($("#golongan").val() == 6)) {
            total = iiibb;
        } else if (($("#pakai").val() > 10) && ($("#golongan").val() == 6)) {
            total = iiibc;
        } else if (($("#pakai").val() < 11) && ($("#golongan").val() == 6)) {
            total = iiibd;
        } else if (($("#pakai").val() > 30) && ($("#golongan").val() == 7)) {
            total = iva;
        } else if (($("#pakai").val() > 20) && ($("#golongan").val() == 7)) {
            total = ivb;
        } else if (($("#pakai").val() > 10) && ($("#golongan").val() == 7)) {
            total = ivc;
        } else if (($("#pakai").val() < 11) && ($("#golongan").val() == 7)) {
            total = ivd;
        } else if (($("#pakai").val() > 30) && ($("#golongan").val() == 8)) {
            total = va;
        } else if (($("#pakai").val() > 20) && ($("#golongan").val() == 8)) {
            total = vb;
        } else if (($("#pakai").val() > 10) && ($("#golongan").val() == 8)) {
            total = vc;
        } else if (($("#pakai").val() < 11) && ($("#golongan").val() == 8)) {
            total = vd;
        } else {
            total = "error";
        }
        var reverse = total.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        $("#harga").val(ribuan);
    }
</script>