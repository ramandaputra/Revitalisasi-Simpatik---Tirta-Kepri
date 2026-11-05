<?php
header('Content-Type: application/json');

include 'koneksi.php';

// Define the query to fetch all incomplete activities (where penyelesaian is null or empty)
$query = "SELECT dma, tanggal_lapor, kegiatan, foto_kegiatan, penyelesaian, tanggal_selesai, kategori 
          FROM spka_kegiatan
          WHERE penyelesaian IS NULL OR penyelesaian = ''
          ORDER BY tanggal_lapor ASC";

$result = mysqli_query($connk, $query);

if ($result) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(array('error' => 'Query failed: ' . mysqli_error($connk)));
}

mysqli_close($connk);
