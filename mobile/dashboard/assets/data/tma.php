<?php
include 'koneksi.php';
// Mengambil data tinggi muka air dari database
$sql = "SELECT waktu, tma, waduk FROM tma ORDER BY waktu DESC LIMIT 28";
$result = $connk->query($sql);

$tmas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tmas[] = $row;
    }
}

$connk->close();

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($tmas);
