<?php
include 'koneksi.php';
$bulan_tahun = date('my');
$nama_tabel = 'hasilbaca' . $bulan_tahun;

// Ambil parameter
$namazona = isset($_GET['zona']) ? $_GET['zona'] : '';

// Query SQL untuk mengambil data marker
$sql = "SELECT a.idpelanggan AS idpelanggan, a.nama AS nama, a.alamat AS alamat, a.golongan AS golongan, a.stanlalu AS stanlalu, a.stanskrg AS stanskrg, a.pakaiskrg AS pakaiskrg, a.namapetugas AS namapetugas, a.kelainan AS kelainan, a.waktubaca AS waktubaca, b.latitude AS latitude, b.longitude AS longitude
        FROM $nama_tabel a LEFT JOIN kepri_loket4.pelanggan b ON a.idpelanggan = b.nosamb
        WHERE a.sudahbaca='1'";

if ($namazona !== '') {
    $sql .= " AND b.kodesumberair = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $namazona);
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
