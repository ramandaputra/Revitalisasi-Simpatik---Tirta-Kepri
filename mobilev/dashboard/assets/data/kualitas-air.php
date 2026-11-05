<?php
include 'koneksi.php';
$sql = "SELECT id, waktu, warna, kekeruhan, tds, ph, scl, waduk, lokasi
FROM kualitas_air
ORDER BY waktu DESC
LIMIT 28";
$result = $connk->query($sql);

$tasks = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
}

$connk->close();

header('Content-Type: application/json');
echo json_encode($tasks);
