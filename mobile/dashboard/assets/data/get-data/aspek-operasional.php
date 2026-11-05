<?php
include '../koneksi.php';

$current_month = date('Ym');
$periode = date('Ym', strtotime('-1 month'));
$periodelalu = date('Ym', strtotime('-2 month'));
$periodeskrg = date('Ym', strtotime('-1 month'));

// Query to get data
$sql = "SELECT
(SELECT SUM(produksi) FROM produksi WHERE DATE_FORMAT(waktu,'%Y%m') = $periodeskrg) AS data1,
(SELECT SUM(kehilangan) FROM nrw WHERE DATE_FORMAT(waktu,'%Y%m') = $periodeskrg) AS data3,
(SELECT SUM(distribusi) FROM distribusi WHERE DATE_FORMAT(waktu,'%Y%m') = $periodeskrg) AS data4,
(SELECT SUM(pelanggan) FROM nrw WHERE DATE_FORMAT(waktu,'%Y%m') = $periodeskrg) AS data8,
(SELECT SUM(pelanggan) FROM nrw WHERE DATE_FORMAT(waktu,'%Y%m') = $periodeskrg) AS data9";
$result = $connk->query($sql);

$data = array();
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
}

echo json_encode($data);

$connk->close();
