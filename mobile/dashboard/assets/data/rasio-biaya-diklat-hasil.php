<?php
include 'koneksi.php';
// Query untuk mengambil data dari database
$sql = "SELECT hasil FROM kinerja WHERE indikator = '18' ORDER BY periode DESC LIMIT 1";
$result = $connk->query($sql);

if ($result->num_rows > 0) {
    // Ambil data baris pertama
    $row = $result->fetch_assoc();

    // Ambil nilai delivered_percentage
    $percentage = $row['hasil'];

    // Mengembalikan nilai langsung
    echo $percentage;
} else {
    echo "0";
}

// Tutup koneksi database
$conn->close();
