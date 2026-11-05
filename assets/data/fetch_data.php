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
$sql = "SELECT month, delivered, estimated FROM orders_data"; // Ganti "orders_data" dengan nama tabel Anda
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
