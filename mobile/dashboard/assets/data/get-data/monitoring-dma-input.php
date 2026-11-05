<?php
include '../koneksi.php';

$dma = isset($_GET['dma']) ? $_GET['dma'] : '';
$bulan_tahun = date('my', strtotime('-1 month'));
$tahun_bulan = date('Ym', strtotime('-1 month'));
$nama_tabel_bacameter = 'hasilbaca' . $bulan_tahun;
$nama_tabel_drd = 'drdposting' . $tahun_bulan;

$sql = "SELECT
(SELECT stanlalu FROM bacameter.$nama_tabel_bacameter WHERE nama = '$dma') AS data1,
(SELECT stanskrg FROM bacameter.$nama_tabel_bacameter WHERE nama = '$dma') AS data2,
(SELECT COUNT(*) FROM $nama_tabel_drd a LEFT JOIN kepri_loket4.pelanggan b ON a.nosamb=b.nosamb LEFT JOIN kepri_loket4.dma c ON b.kodedma=c.kodedma WHERE c.nama_dma = '$dma') AS data3,
(SELECT SUM(a.pakai) FROM $nama_tabel_drd a LEFT JOIN kepri_loket4.pelanggan b ON a.nosamb=b.nosamb LEFT JOIN kepri_loket4.dma c ON b.kodedma=c.kodedma WHERE c.nama_dma = '$dma') AS data4";

$result = $conn2->query($sql);

$data = array();
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
}

echo json_encode($data);

$conn2->close();
