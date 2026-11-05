<?php
include '../koneksi.php';

$current_month = date('Ym');
$periode = date('Ym', strtotime('-1 month'));
$periodelalu = date('Ym', strtotime('-2 month'));
$periodeskrg = date('Ym', strtotime('-1 month'));

// Query to get data
$sql = "SELECT
(SELECT COUNT(*) FROM kepri_personalia.pegawai WHERE nik NOT IN ('D001','P001')) AS data1,
(SELECT COUNT(*) FROM kepri_personalia.pegawai WHERE nik NOT IN ('D001','P001')) AS data4";
$result = $connk->query($sql);

$data = array();
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
}

echo json_encode($data);

$connk->close();
