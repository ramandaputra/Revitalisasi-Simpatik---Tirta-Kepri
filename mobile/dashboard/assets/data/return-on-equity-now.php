<?php
include 'koneksi.php';
$sql = "SELECT periode, FORMAT(data1, 0, 'de_DE') AS labarugi, FORMAT(data2, 0, 'de_DE') AS ekuitas FROM kinerja WHERE indikator = '1' ORDER BY periode DESC LIMIT 1";
$result = $connk->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $labarugi = $row['labarugi'];
    $ekuitas = $row['ekuitas'];

    $data = array(
        'labarugi' => $labarugi,
        'ekuitas' => $ekuitas
    );

    // Mengembalikan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo "Data tidak ditemukan";
}

$conn->close();
