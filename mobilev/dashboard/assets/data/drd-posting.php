<?php
header('Content-Type: application/json');

include 'koneksi.php';

$periode = isset($_GET['periode']) ? $_GET['periode'] : '';
$wilayah = isset($_GET['wilayah']) ? $_GET['wilayah'] : '';

// Mendefinisikan wilayah kode
$wilayahKode = array(
    'tanjungpinang' => ['01', '02', '03', '04'],
    'kijang' => ['05'],
    'tanjunguban' => ['06', '07', '08', '09'],
    'all' => ['01', '02', '03', '04', '05', '06', '07', '08', '09']
);

if ($periode && $wilayah && isset($wilayahKode[$wilayah])) {
    // Membuat string kode wilayah
    $kodeRayon = implode(',', $wilayahKode[$wilayah]);

    // Query SQL untuk mengambil data berdasarkan periode dan wilayah
    $query = "SELECT kodegol, COUNT(*) AS lembar, SUM(pakai) AS pakai, SUM(total) AS jumlah 
              FROM {$periode} 
              WHERE LEFT(koderayon, 2) IN ({$kodeRayon}) AND flagpublish = '1' 
              GROUP BY kodegol";

    // Menjalankan query
    $result = $conn2->query($query);

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
        echo json_encode(array('error' => 'Query failed: ' . $conn2->error));
    }
} else {
    // Jika periode atau wilayah tidak disertakan dalam permintaan
    echo json_encode(array('error' => 'Invalid parameters'));
}

// Menutup koneksi database
$conn2->close();
