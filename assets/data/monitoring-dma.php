<?php
header('Content-Type: application/json');

include 'koneksi.php';

$periode = isset($_GET['periode-pie']) ? $_GET['periode-pie'] : '';

if ($periode) {
  // Query SQL untuk mengambil data berdasarkan periode
  $query = "SELECT dma, kehilangan, persentase FROM nrw_dma WHERE DATE_FORMAT(periode,'%Y%m')=$periode";

  // Menjalankan query
  $result = $connk->query($query);

  if ($result) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    echo json_encode($data);
  } else {
    echo json_encode(array('error' => 'Query failed: ' . $connk->error, 'query' => $query));
  }
} else {
  echo json_encode(array('error' => 'Invalid parameters'));
}

// Menutup koneksi database
$connk->close();
