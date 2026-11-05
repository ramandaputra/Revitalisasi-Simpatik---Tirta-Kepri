<?php
include 'koneksi.php';
$tahun_bulan = date('Ym', strtotime('-1 month'));
$sekarang = date('Ym');
$nama_tabel = 'drd' . $tahun_bulan;
$wilayah = isset($_GET['wilayah']) ? $_GET['wilayah'] : 'all';

// Mendefinisikan wilayah kode
$wilayahKode = array(
    'tanjungpinang' => ['01', '02', '03', '04'],
    'kijang' => ['05'],
    'tanjunguban' => ['06', '07', '08', '09'],
    'all' => ['01', '02', '03', '04', '05', '06', '07', '08', '09']
);

// Mengambil kode rayon untuk wilayah yang dipilih
$kodeRayon = implode("','", $wilayahKode[$wilayah]);

$sql = "SELECT
(SELECT COUNT(*) FROM $nama_tabel WHERE flagpublish='1' AND  flagbatal='0' AND DATE_FORMAT(tglbayar,'%Y%m')='$sekarang' AND LEFT(koderayon, 2) IN ('$kodeRayon')) AS sl_bayar,
(SELECT SUM(total) FROM $nama_tabel WHERE flagpublish='1' AND  flagbatal='0' AND DATE_FORMAT(tglbayar,'%Y%m')='$sekarang' AND LEFT(koderayon, 2) IN ('$kodeRayon')) AS total_bayar,
(SELECT COUNT(*) FROM $nama_tabel WHERE flagpublish='1' AND LEFT(koderayon, 2) IN ('$kodeRayon')) AS sl_drd,
(SELECT SUM(total)FROM $nama_tabel WHERE flagpublish='1' AND LEFT(koderayon, 2) IN ('$kodeRayon')) AS total_drd";
$result = $conn2->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data1 = $row['sl_drd'];
    $data2 = $row['sl_bayar'];
    $data3 = $row['total_drd'];
    $data4 = $row['total_bayar'];

    $data = array(
        'data1' => $data1,
        'data2' => $data2,
        'data3' => $data3,
        'data4' => $data4
    );

    // Mengembalikan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo json_encode(['message' => 'Data tidak ditemukan']);
}

$conn2->close();
