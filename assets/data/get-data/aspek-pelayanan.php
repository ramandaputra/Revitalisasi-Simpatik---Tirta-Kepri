<?php
include '../koneksi.php';

$current_month = date('Ym');
$periode = date('Ym', strtotime('-1 month'));
$periodelalu = date('Ym', strtotime('-2 month'));
$periodeskrg = date('Ym', strtotime('-1 month'));

// Query to get data
$sql = "SELECT
(SELECT COUNT(*)*3 FROM mutasi_pelanggan2024 WHERE kodegol IN ('IIA','IIIA') AND periode = $periodeskrg) AS data1,
(SELECT COUNT(*) FROM mutasi_pelanggan2024 WHERE periode = $periodeskrg) - (SELECT COUNT(*) FROM mutasi_pelanggan2024 WHERE periode = $periodelalu) AS data3,
(SELECT COUNT(*) FROM mutasi_pelanggan2024 WHERE periode = $periodelalu) AS data4,
(SELECT COUNT(*) FROM pengaduan a LEFT JOIN spk_pengaduan b ON a.nomor=b.nomorpengaduan WHERE a.flaghapus=0 AND DATE_FORMAT(a.tglditerima,'%Y%m')='$periode' AND DATE_FORMAT(b.tgldiselesaikan,'%Y%m')='$periode') AS data5,
(SELECT COUNT(*) FROM pengaduan WHERE flaghapus=0 AND DATE_FORMAT(tglditerima,'%Y%m')='$periode') AS data6,
(SELECT SUBSTRING(SUM(pakai), 1, LENGTH(SUM(pakai)) - 4) FROM kepri_bsbs4.drdposting$periode WHERE kodegol IN ('IA','IIA','IIIA') AND flagpublish=1) AS data9,
(SELECT COUNT(*) FROM kepri_bsbs4.drdposting$periode WHERE kodegol IN ('IA','IIA','IIIA') AND flagpublish=1) AS data10";
$result = $conn1->query($sql);

$data = array();
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
}

echo json_encode($data);

$conn1->close();
