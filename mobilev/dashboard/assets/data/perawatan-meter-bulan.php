<?php
include 'koneksi.php';
// Query untuk mengambil data dari database
$sql = "SELECT waktu, wilayah, target AS data1, ganti_meter AS data2 FROM ganti_meter ORDER BY waktu";
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
