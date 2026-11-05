<?php
header('Content-Type: application/json');

include 'koneksi.php';

$periode = isset($_GET['periode-pie']) ? $_GET['periode-pie'] : '';
$wilayah = isset($_GET['wilayah-pie']) ? $_GET['wilayah-pie'] : '';

// Mendefinisikan wilayah kode
$wilayahKode = array(
    'tanjungpinang' => ['01', '02', '03', '04'],
    'kijang' => ['05'],
    'tanjunguban' => ['06', '07', '08', '09'],
    'all' => ['01', '02', '03', '04', '05', '06', '07', '08', '09']
);

if ($periode && $wilayah && isset($wilayahKode[$wilayah])) {
    // Membuat string kode wilayah
    $kodeRayon = "'" . implode("','", $wilayahKode[$wilayah]) . "'";

    // Query SQL untuk mengambil data berdasarkan periode dan wilayah
    $query = "SELECT 
    COALESCE(SUM(r.count), 0) AS sambbaru,
    COALESCE(SUM(s.count), 0) AS sambkembali,
    COALESCE(SUM(t.count), 0) AS diputus,
    COALESCE(SUM(u.count), 0) AS putussementara
FROM (
    SELECT DISTINCT kodegol 
    FROM rab 
    WHERE LEFT(koderayon, 2) IN ({$kodeRayon}) 
      AND DATE_FORMAT(tglpasang, '%Y%m') = '{$periode}'
    UNION
    SELECT DISTINCT b.kodegol 
    FROM ba_sambungkembali a 
    LEFT JOIN permohonan_sambung_kembali b 
      ON a.nomorpermohonan = b.nomor  
    WHERE LEFT(b.koderayon, 2) IN ({$kodeRayon}) 
      AND DATE_FORMAT(tanggalba, '%Y%m') = '{$periode}' 
      AND a.flagprosesdata = '1'
    UNION
    SELECT DISTINCT b.kodegol 
    FROM ba_pemutusan_tunggakan a 
    LEFT JOIN spk_pemutusan_tunggakan b 
      ON a.nomorspk = b.nomorspk  
    WHERE LEFT(b.koderayon, 2) IN ({$kodeRayon}) 
      AND DATE_FORMAT(tanggalba, '%Y%m') = '{$periode}' 
      AND a.flagprosesdata = '1'
    UNION
    SELECT DISTINCT b.kodegol 
    FROM ba_pemutusan_sementara a 
    LEFT JOIN permohonan_pemutusan_sementara b 
      ON a.nomorpermohonan = b.nomor  
    WHERE LEFT(b.koderayon, 2) IN ({$kodeRayon}) 
      AND DATE_FORMAT(tanggalba, '%Y%m') = '{$periode}' 
      AND a.flagprosesdata = '1'
) k
LEFT JOIN (
    SELECT kodegol, COUNT(*) AS COUNT 
    FROM rab 
    WHERE LEFT(koderayon, 2) IN ({$kodeRayon}) 
      AND DATE_FORMAT(tglpasang, '%Y%m') = '{$periode}' 
    GROUP BY kodegol
) r ON k.kodegol = r.kodegol
LEFT JOIN (
    SELECT b.kodegol, COUNT(*) AS COUNT 
    FROM ba_sambungkembali a 
    LEFT JOIN permohonan_sambung_kembali b 
      ON a.nomorpermohonan = b.nomor  
    WHERE LEFT(b.koderayon, 2) IN ({$kodeRayon}) 
      AND DATE_FORMAT(tanggalba, '%Y%m') = '{$periode}' 
      AND a.flagprosesdata = '1' 
    GROUP BY b.kodegol
) s ON k.kodegol = s.kodegol
LEFT JOIN (
    SELECT b.kodegol, COUNT(*) AS COUNT 
    FROM ba_pemutusan_tunggakan a 
    LEFT JOIN spk_pemutusan_tunggakan b 
      ON a.nomorspk = b.nomorspk  
    WHERE LEFT(b.koderayon, 2) IN ({$kodeRayon}) 
      AND DATE_FORMAT(tanggalba, '%Y%m') = '{$periode}' 
      AND a.flagprosesdata = '1' 
    GROUP BY b.kodegol
) t ON k.kodegol = t.kodegol
LEFT JOIN (
    SELECT b.kodegol, COUNT(*) AS COUNT 
    FROM ba_pemutusan_sementara a 
    LEFT JOIN permohonan_pemutusan_sementara b 
      ON a.nomorpermohonan = b.nomor  
    WHERE LEFT(b.koderayon, 2) IN ({$kodeRayon}) 
      AND DATE_FORMAT(tanggalba, '%Y%m') = '{$periode}' 
      AND a.flagprosesdata = '1' 
    GROUP BY b.kodegol
) u ON k.kodegol = u.kodegol";

    // Menjalankan query
    $result = $conn1->query($query);

    if ($result) {
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'Query failed: ' . $conn1->error, 'query' => $query));
    }
} else {
    echo json_encode(array('error' => 'Invalid parameters'));
}

// Menutup koneksi database
$conn1->close();
