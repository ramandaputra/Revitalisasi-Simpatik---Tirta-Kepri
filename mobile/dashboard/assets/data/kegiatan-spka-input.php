<?php
header('Content-Type: application/json');

include 'koneksi.php';

$dma = isset($_GET['dma']) ? $_GET['dma'] : '';
$periode = isset($_GET['periode-kegiatan']) ? $_GET['periode-kegiatan'] : '';

if ($dma && $periode) {
    // Mengubah format periode dari YYYY-MM menjadi YYYYMM
    $periode_formatted = str_replace('-', '', $periode);

    // Query SQL untuk mengambil data berdasarkan nama_dma dan periode
    $query = "SELECT * FROM spka_kegiatan WHERE dma=? AND DATE_FORMAT(tanggal_lapor, '%Y%m')=?";

    $stmt = $connk->prepare($query);
    $stmt->bind_param("ss", $dma, $periode_formatted);
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
