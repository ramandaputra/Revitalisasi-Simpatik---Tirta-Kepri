<?php
include 'koneksi.php';
// Query untuk mengambil data dari database
$sql = "SELECT a.waktu, a.wilayah, a.target AS data1, (SUM(a.kehilangan) / SUM(b.distribusi)) * 100 AS data2
FROM nrw a LEFT JOIN distribusi b ON a.jdu = b.jdu GROUP BY a.waktu, a.wilayah ORDER BY a.waktu, a.wilayah";
$result = $connk->query($sql);

$data = array();
if ($result->num_rows > 0) {
    // Ambil data baris per baris
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 hasil";
}

// Tutup koneksi database
$conn->close();

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
