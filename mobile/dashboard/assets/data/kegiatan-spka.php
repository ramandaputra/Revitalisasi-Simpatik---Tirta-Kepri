<?php
header('Content-Type: application/json');

include 'koneksi.php';

$dma = isset($_GET['dma']) ? $_GET['dma'] : '';
$periode = isset($_GET['bulan']) ? $_GET['bulan'] : '';

if ($dma && $periode) {
    // Query SQL untuk mengambil data berdasarkan nama_dma dan periode
    $query = "SELECT tanggal_lapor, kegiatan, foto_kegiatan, penyelesaian, tanggal_selesai, kategori 
              FROM spka_kegiatan
              WHERE dma=? AND DATE_FORMAT(tanggal_lapor, '%Y%m')=?";

    $stmt = $connk->prepare($query);
    $stmt->bind_param("ss", $dma, $periode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'Query failed: ' . $connk->error));
    }
} else {
    echo json_encode(array('error' => 'Invalid parameters'));
}

$connk->close();
