<?php
include 'koneksi.php';
$bulan_tahun = date('my');
$nama_tabel = 'hasilbaca' . $bulan_tahun;
// Query SQL untuk mengambil data marker
$sql = "SELECT a.nosamb AS nosamb, b.nama AS nama, b.alamat AS alamat, b.kodegol AS kodegol, b.latitude AS latitude, b.longitude AS longitude, COUNT(*) AS lembar, SUM(a.rekair + a.trf_dendatunggakan2) AS jumlah
FROM piutang a LEFT JOIN pelanggan b ON a.nosamb=b.nosamb
WHERE b.status=1 AND a.flaglunas=0 AND LEFT(b.nosamb,2) IN (01,02,03,04)
AND a.nosamb IN (SELECT nosamb FROM piutang WHERE flaglunas=0)
GROUP BY a.nosamb
HAVING COUNT(*)>=5";
$result = $conn1->query($sql);

// Inisialisasi array untuk menyimpan data marker
$markers = array();

// Periksa hasil query
if (!$result) {
    die("Query failed: " . $conn1->error);
}

// Loop melalui setiap baris hasil query
while ($row = $result->fetch_assoc()) {
    // Tambahkan data marker ke array
    $marker = array(
        'latitude' => $row['latitude'],
        'longitude' => $row['longitude'],
        'nosamb' => $row['nosamb'],
        'nama' => $row['nama'],
        'alamat' => $row['alamat'],
        'golongan' => $row['kodegol'],
        'lembar' => $row['lembar'],
        'jumlah' => $row['jumlah']
    );
    array_push($markers, $marker);
}

// Tutup koneksi MySQL
$conn1->close();

// Mengembalikan data marker dalam format JSON
header('Content-Type: application/json');
echo json_encode($markers);
