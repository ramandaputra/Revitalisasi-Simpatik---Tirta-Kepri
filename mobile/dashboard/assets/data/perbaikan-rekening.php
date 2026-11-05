<?php
header('Content-Type: application/json');

include 'koneksi.php';

$periode = isset($_GET['periode']) ? $_GET['periode'] : '';
$wilayah = isset($_GET['wilayah']) ? $_GET['wilayah'] : '';

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
    $query = "SELECT tanggalba, nosamb, nama, bulan, pakai_lama, rekair_lama, pakai_baru, rekair_baru, alasan FROM ba_koreksi_rekening WHERE LEFT(koderayon,2) IN ({$kodeRayon}) AND DATE_FORMAT(tanggalba,'%Y%m')='{$periode}'";

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
