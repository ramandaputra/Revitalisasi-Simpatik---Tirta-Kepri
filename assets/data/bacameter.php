<?php
include 'koneksi.php';
$bulan_tahun = date('my');
$nama_tabel = 'hasilbaca' . $bulan_tahun;
// Query untuk mengambil data dari database
$sql = "SELECT namapetugas AS nama, COUNT(*) AS baca, (SELECT COUNT(kelainan) FROM $nama_tabel WHERE LENGTH(kelainan) > 1 AND $nama_tabel.namapetugas = h.namapetugas) AS problem
FROM $nama_tabel AS h 
WHERE waktubaca IS NOT NULL 
GROUP BY namapetugas ORDER BY baca DESC";
$result = $conn->query($sql);

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
