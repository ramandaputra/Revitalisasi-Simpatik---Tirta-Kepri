<?php
// Sambungkan ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "dashboard"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari database
$sql = "SELECT data FROM persen"; // Ganti "nama_tabel" dengan nama tabel Anda
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ambil data baris pertama
    $row = $result->fetch_assoc();

    // Ambil nilai delivered_percentage
    $percentage = $row['data'];

    // Mengembalikan nilai langsung
    echo $percentage;
} else {
    echo "0";
}

// Tutup koneksi database
$conn->close();
