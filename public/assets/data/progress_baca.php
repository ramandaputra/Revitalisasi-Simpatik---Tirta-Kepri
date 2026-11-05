<?php
include 'koneksi.php';
$bulan_tahun = date('my');
$nama_tabel = 'hasilbaca' . $bulan_tahun;
// Query untuk mengambil data dari database
$sql = "SELECT ROUND((SUM(CASE WHEN waktubaca IS NOT NULL THEN 1 ELSE 0 END) / COUNT(*)) * 100) AS persentase_terbaca
FROM $nama_tabel";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ambil data baris pertama
    $row = $result->fetch_assoc();

    // Ambil nilai delivered_percentage
    $percentage = $row['persentase_terbaca'];

    // Mengembalikan nilai langsung
    echo $percentage;
} else {
    echo "0";
}

// Tutup koneksi database
$conn->close();
