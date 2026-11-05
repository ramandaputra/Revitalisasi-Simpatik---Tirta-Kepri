<?php
header('Content-Type: application/json');

include 'koneksi.php';

$jenis = isset($_GET['jenis-cari']) ? $_GET['jenis-cari'] : '';
$periode = isset($_GET['periode-cari']) ? $_GET['periode-cari'] : '';
$wilayah = isset($_GET['wilayah-cari']) ? $_GET['wilayah-cari'] : '';

// Mendefinisikan wilayah kode
$wilayahKode = array(
    'tanjungpinang' => ['1', '2', '3', '4'],
    'kijang' => ['5'],
    'tanjunguban' => ['6', '7', '8', '9'],
    'all' => ['1', '2', '3', '4', '5', '6', '7', '8', '9']
);

if ($periode && $wilayah && isset($wilayahKode[$wilayah])) {
    // Membuat string kode wilayah
    $kodeRayon = implode(',', $wilayahKode[$wilayah]);

    // Query SQL untuk mengambil data berdasarkan periode dan wilayah
    $query = "SELECT a.nosamb AS nosamb, a.namapelanggan AS nama, a.alamatpelanggan AS alamat, a.tglditerima AS tglpengaduan, a.uraianlaporan AS pengaduan, b.uraianpenyelesaian AS penyelesaian FROM pengaduan a LEFT JOIN spk_pengaduan b ON a.nomor=b.nomorpengaduan WHERE a.kodewil IN ({$kodeRayon}) AND a.kategori='{$jenis}' AND DATE_FORMAT(a.tglditerima,'%Y%m')='{$periode}'";

    // Menjalankan query
    $result = $conn1->query($query);

    if ($result) {
        // Membuat array untuk menyimpan data
        $data = array();

        // Mengisi array dengan data hasil query
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Mengirimkan data dalam format JSON
        echo json_encode($data);
    } else {
        // Jika terjadi kesalahan dalam query
        echo json_encode(array('error' => 'Query failed: ' . $conn1->error));
    }
} else {
    // Jika periode atau wilayah tidak disertakan dalam permintaan
    echo json_encode(array('error' => 'Invalid parameters'));
}

// Menutup koneksi database
$conn1->close();
