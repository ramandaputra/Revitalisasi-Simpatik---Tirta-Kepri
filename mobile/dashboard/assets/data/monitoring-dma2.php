<?php
header('Content-Type: application/json');

include 'koneksi.php';

$dma = isset($_GET['dma']) ? $_GET['dma'] : '';
$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');

// Query SQL untuk mengambil data berdasarkan DMA dan tahun
$query = "SELECT dma, periode, distribusi, pemakaian AS penjualan, kehilangan, persentase FROM nrw_dma WHERE DATE_FORMAT(periode,'%Y') = '$tahun'";

$result = $connk->query($query);

$data = [];
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
} else {
  echo json_encode(['error' => 'Query failed: ' . $connk->error]);
}

echo json_encode($data);

$connk->close();
