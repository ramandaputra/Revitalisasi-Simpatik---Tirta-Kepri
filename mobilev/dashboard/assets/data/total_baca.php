<?php
include 'koneksi.php';
$bulan_tahun = date('my');
$nama_tabel = 'hasilbaca' . $bulan_tahun;
$sql = "SELECT 
            (SELECT COUNT(*) FROM $nama_tabel WHERE waktubaca IS NOT NULL) AS total_baca,
            (SELECT COUNT(*) FROM $nama_tabel    WHERE LENGTH(kelainan) > 1) AS total_problem";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_baca = $row['total_baca'];
    $total_problem = $row['total_problem'];

    $data = array(
        'total_baca' => $total_baca,
        'total_problem' => $total_problem
    );

    // Mengembalikan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo "Data tidak ditemukan";
}

$conn->close();
