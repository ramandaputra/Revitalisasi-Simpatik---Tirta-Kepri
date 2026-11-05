<?php
header('Content-Type: application/json');

include 'koneksi.php';

$periode = isset($_GET['periode-pie']) ? $_GET['periode-pie'] : '';

if ($periode) {
  // Query SQL untuk mengambil data berdasarkan periode
  $query = "SELECT        
        (SELECT SUM(realisasiskrg) FROM lpu2024 WHERE thnbln = $periode AND nolpu='B' AND kodelpu<>'LPU06' AND uraian LIKE 'Tagihan Rekening Air') AS air,
        (SELECT SUM(realisasiskrg) FROM lpu2024 WHERE thnbln = $periode AND nolpu='B' AND kodelpu<>'LPU06' AND uraian LIKE '%non air%') AS nonair,
        (SELECT SUM(realisasiskrg) FROM lpu2024 WHERE thnbln = $periode AND nolpu='B' AND kodelpu<>'LPU06' AND uraian LIKE 'Penghasilan Diluar Usaha') AS penghasilan,
        (SELECT realisasiskrg FROM lpu2024 WHERE thnbln = $periode AND nolpu = 'C' AND uraian = 'Pemb. Bahan & Perlengkapan') AS bahan,
        (SELECT realisasiskrg FROM lpu2024 WHERE thnbln = $periode AND nolpu = 'C' AND uraian = 'Tenaga Kerja') AS tenaga,
        (SELECT realisasiskrg FROM lpu2024 WHERE thnbln = $periode AND nolpu = 'C' AND uraian = 'Lain-lain Pemby. Operasional') AS lain_operasional,
        (SELECT realisasiskrg FROM lpu2024 WHERE thnbln = $periode AND nolpu = 'C' AND uraian = 'Biaya Diluar Usaha') AS usaha,
        (SELECT realisasiskrg FROM lpu2024 WHERE thnbln = $periode AND nolpu = 'C' AND uraian = 'Investasi') AS investasi,
        (SELECT realisasiskrg FROM lpu2024 WHERE thnbln = $periode AND nolpu = 'C' AND uraian = 'Hutang Pajak') AS pajak,
        (SELECT (SELECT realisasiskrg FROM lpu2024 WHERE thnbln = $periode AND nolpu = 'C' AND uraian = 'Lain-lain Non Operasional') - (SELECT SUM(debet) FROM trans$periode WHERE kodeakun = '16.01.21' AND DATE_FORMAT(tanggal,'%Y%m') = $periode)) AS lain_non_operasional";

  // Menjalankan query
  $result = $conna->query($query);

  if ($result) {
    $data = $result->fetch_assoc();
    echo json_encode($data);
  } else {
    echo json_encode(array('error' => 'Query failed: ' . $conna->error, 'query' => $query));
  }
} else {
  echo json_encode(array('error' => 'Invalid parameters'));
}

// Menutup koneksi database
$conna->close();
