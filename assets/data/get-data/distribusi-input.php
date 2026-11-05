<?php
include '../koneksi.php';

$jdu = isset($_GET['jdu']) ? $_GET['jdu'] : '';
$bulan_tahun = date('my', strtotime('-1 month'));
$tahun_bulan = date('Ym', strtotime('-1 month'));
$nama_tabel_bacameter = 'hasilbaca' . $bulan_tahun;
$nama_tabel_drd = 'drdposting' . $tahun_bulan;

$sql = "SELECT
(SELECT COUNT(*) FROM $nama_tabel_drd a LEFT JOIN kepri_loket4.pelanggan b ON a.nosamb=b.nosamb WHERE b.kodesumberair LIKE '%$jdu%') AS data1,
(SELECT SUM(a.pakai) FROM $nama_tabel_drd a LEFT JOIN kepri_loket4.pelanggan b ON a.nosamb=b.nosamb WHERE b.kodesumberair LIKE '%$jdu%') AS data2";

$result = $conn2->query($sql);

$data = array();
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
}

echo json_encode($data);

$conn2->close();
