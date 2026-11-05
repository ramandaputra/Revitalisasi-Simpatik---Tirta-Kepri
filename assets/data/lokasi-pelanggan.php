<?php
include 'koneksi.php';

// Ambil bulan dan tahun saat ini
$bulan_tahun = date('my');
$nama_tabel = 'hasilbaca' . $bulan_tahun;

// Ambil parameter input
$nosamb = isset($_GET['nosamb']) ? $_GET['nosamb'] : '';

// Validasi parameter
if (empty($nosamb)) {
    header('Content-Type: application/json');
    echo json_encode([]);
    exit();
}

// Query SQL untuk mengambil data pelanggan
$sql = "SELECT 
            a.idpelanggan AS idpelanggan, 
            a.nama AS nama, 
            a.alamat AS alamat, 
            a.golongan AS golongan,
            CASE WHEN b.status='1' THEN 'AKTIF' WHEN b.status='0' THEN 'NONAKTIF' END AS status,
            a.stanlalu AS stanlalu, 
            a.stanskrg AS stanskrg, 
            a.pakaiskrg AS pakaiskrg, 
            a.namapetugas AS namapetugas, 
            a.kelainan AS kelainan, 
            a.waktubaca AS waktubaca, 
            b.latitude AS latitude, 
            b.longitude AS longitude
        FROM $nama_tabel a 
        LEFT JOIN kepri_loket4.pelanggan b ON a.idpelanggan = b.nosamb
        WHERE b.nosamb = ?";

// Eksekusi query
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $nosamb);
$stmt->execute();
$result = $stmt->get_result();

// Inisialisasi array untuk menyimpan hasil
$markers = [];

// Periksa hasil query
if (!$result) {
    die(json_encode(["error" => "Query failed: " . $conn->error]));
}

// Loop untuk memproses data hasil query
while ($row = $result->fetch_assoc()) {
    $marker = [
        'latitude' => $row['latitude'],
        'longitude' => $row['longitude'],
        'nosamb' => $row['idpelanggan'],
        'nama' => $row['nama'],
        'alamat' => $row['alamat'],
        'golongan' => $row['golongan'],
        'status' => $row['status'],
        'stanlalu' => $row['stanlalu'],
        'stanskrg' => $row['stanskrg'],
        'pakai' => $row['pakaiskrg'],
        'namapetugas' => $row['namapetugas'],
        'kelainan' => $row['kelainan'],
        'waktubaca' => $row['waktubaca']
    ];
    $markers[] = $marker;
}

// Tutup koneksi database
$stmt->close();
$conn->close();

// Kembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($markers);
