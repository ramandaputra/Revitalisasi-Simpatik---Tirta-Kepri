<?php
include 'koneksi.php';
$bulan_tahun = date('my');
$nama_tabel = 'hasilbaca' . $bulan_tahun;

// Ambil parameter 'namapetugas' dari query string jika ada
$namapetugas = isset($_GET['namapetugas']) ? $_GET['namapetugas'] : '';

// Query SQL untuk mengambil data marker
$sql = "SELECT idpelanggan, nama, alamat, golongan, stanlalu, stanskrg, pakaiskrg, namapetugas, kelainan, waktubaca, latitude, longitude 
        FROM $nama_tabel 
        WHERE sudahbaca='1'";

// Tambahkan kondisi untuk nama petugas jika parameter 'namapetugas' ada
if ($namapetugas !== '') {
    $sql .= " AND namapetugas = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $namapetugas);
} else {
    $stmt = $conn->prepare($sql);
}

$stmt->execute();
$result = $stmt->get_result();

// Inisialisasi array untuk menyimpan data marker
$markers = array();

// Periksa hasil query
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Loop melalui setiap baris hasil query
while ($row = $result->fetch_assoc()) {
    // Tambahkan data marker ke array
    $marker = array(
        'latitude' => $row['latitude'],
        'longitude' => $row['longitude'],
        'nosamb' => $row['idpelanggan'],
        'nama' => $row['nama'],
        'alamat' => $row['alamat'],
        'golongan' => $row['golongan'],
        'stanlalu' => $row['stanlalu'],
        'stanskrg' => $row['stanskrg'],
        'pakai' => $row['pakaiskrg'],
        'namapetugas' => $row['namapetugas'],
        'kelainan' => $row['kelainan'],
        'waktubaca' => $row['waktubaca']
    );
    array_push($markers, $marker);
}

// Tutup koneksi MySQL
$conn->close();

// Mengembalikan data marker dalam format JSON
header('Content-Type: application/json');
echo json_encode($markers);
