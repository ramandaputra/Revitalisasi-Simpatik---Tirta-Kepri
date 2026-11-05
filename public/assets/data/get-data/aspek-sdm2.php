<?php
include '../koneksi.php';

$current_month = date('Ym');
$periode = date('Ym', strtotime('-1 month'));
$nama_tabel = 'trans' . $periode;
// Query to get data
$sql = "SELECT
(SELECT COUNT(*) FROM kepri_loket4.mutasi_pelanggan2024 WHERE periode = $periode) AS data2,
(SELECT SUM(debet) FROM $nama_tabel WHERE kodeakun='96.01.80' AND uraian<>'SALDO AWAL') AS data5,
(SELECT SUM(debet) FROM $nama_tabel WHERE kodeakun IN ('92.01.10','92.01.11','92.01.13','93.01.10','93.01.11','93.01.15','96.01.10','96.01.20','96.01.30','96.01.40','96.01.41','96.01.60','96.01.70','96.01.80') AND uraian<>'SALDO AWAL') AS data6";
$result = $conna->query($sql);

$data = array();
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
}

echo json_encode($data);

$conna->close();
