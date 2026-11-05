<?php
header('Content-Type: application/json');

include 'koneksi.php';

$wilayah = isset($_GET['wilayah']) ? $_GET['wilayah'] : '';

// Mendefinisikan wilayah kode
$wilayahKode = array(
    'tanjungpinang' => ['01', '02', '03', '04'],
    'kijang' => ['05'],
    'tanjunguban' => ['06', '07', '08', '09'],
    'all' => ['01', '02', '03', '04', '05', '06', '07', '08', '09']
);

if ($wilayah && isset($wilayahKode[$wilayah])) {
    // Membuat string kode wilayah
    $kodeRayon = implode("','", $wilayahKode[$wilayah]);

    // Query SQL untuk mengambil data berdasarkan wilayah
    $query = "SELECT a.nosamb AS nosamb, a.kodegol AS kodegol, COUNT(*) AS bulan, SUM(pakai) AS pakai, SUM(a.rekair + a.trf_dendatunggakan2) AS jumlah
FROM piutang a LEFT JOIN pelanggan b ON a.nosamb=b.nosamb
WHERE b.status=1 AND a.flaglunas=0 AND LEFT(b.nosamb,2) IN ('$kodeRayon')
AND a.nosamb IN (SELECT nosamb FROM piutang WHERE flaglunas=0)
GROUP BY a.nosamb
HAVING COUNT(*)>=5";

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
    // Jika wilayah tidak disertakan dalam permintaan
    echo json_encode(array('error' => 'Invalid parameters'));
}

// Menutup koneksi database
$conn1->close();
