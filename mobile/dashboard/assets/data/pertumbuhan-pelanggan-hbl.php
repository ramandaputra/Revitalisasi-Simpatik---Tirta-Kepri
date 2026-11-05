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
    $query = "SELECT 
    k.kodegol,
    COALESCE(r.count, 0) AS sambbaru,
    COALESCE(s.count, 0) AS sambkembali,
    COALESCE(t.count, 0) AS diputus,
    COALESCE(u.count, 0) AS putussementara,
    COALESCE(m1.count, 0) AS aktif,
    COALESCE(m2.count, 0) AS putus
FROM (
    SELECT kodegol FROM rab WHERE LEFT(koderayon, 2) IN ({$kodeRayon}) AND DATE_FORMAT(tglpasang, '%Y%m') = {$periode}
    UNION
    SELECT b.kodegol FROM ba_sambungkembali a 
    LEFT JOIN permohonan_sambung_kembali b ON a.nomorpermohonan = b.nomor  
    WHERE LEFT(b.koderayon, 2) IN ({$kodeRayon}) AND DATE_FORMAT(tanggalba, '%Y%m') = {$periode} AND a.flagprosesdata = '1'
    UNION
    SELECT b.kodegol FROM ba_pemutusan_tunggakan a 
    LEFT JOIN spk_pemutusan_tunggakan b ON a.nomorspk = b.nomorspk  
    WHERE LEFT(b.koderayon, 2) IN ({$kodeRayon}) AND DATE_FORMAT(tanggalba, '%Y%m') = {$periode} AND a.flagprosesdata = '1'
    UNION
    SELECT b.kodegol FROM ba_pemutusan_sementara a 
    LEFT JOIN permohonan_pemutusan_sementara b ON a.nomorpermohonan = b.nomor  
    WHERE LEFT(b.koderayon, 2) IN ({$kodeRayon}) AND DATE_FORMAT(tanggalba, '%Y%m') = {$periode} AND a.flagprosesdata = '1'
    UNION
    SELECT kodegol FROM mutasi_pelanggan2024 
    WHERE LEFT(koderayon, 2) IN ({$kodeRayon}) AND periode = {$periode} AND STATUS = '1'
    UNION
    SELECT kodegol FROM mutasi_pelanggan2024 
    WHERE LEFT(koderayon, 2) IN ({$kodeRayon}) AND periode = {$periode} AND STATUS = '0'
) k
LEFT JOIN (
    SELECT kodegol, COUNT(*) AS COUNT 
    FROM rab 
    WHERE LEFT(koderayon, 2) IN ({$kodeRayon}) AND DATE_FORMAT(tglpasang, '%Y%m') = {$periode} 
    GROUP BY kodegol
) r ON k.kodegol = r.kodegol
LEFT JOIN (
    SELECT b.kodegol, COUNT(*) AS COUNT 
    FROM ba_sambungkembali a 
    LEFT JOIN permohonan_sambung_kembali b ON a.nomorpermohonan = b.nomor  
    WHERE LEFT(b.koderayon, 2) IN ({$kodeRayon}) AND DATE_FORMAT(tanggalba, '%Y%m') = {$periode} AND a.flagprosesdata = '1' 
    GROUP BY b.kodegol
) s ON k.kodegol = s.kodegol
LEFT JOIN (
    SELECT b.kodegol, COUNT(*) AS COUNT 
    FROM ba_pemutusan_tunggakan a 
    LEFT JOIN spk_pemutusan_tunggakan b ON a.nomorspk = b.nomorspk  
    WHERE LEFT(b.koderayon, 2) IN ({$kodeRayon}) AND DATE_FORMAT(tanggalba, '%Y%m') = {$periode} AND a.flagprosesdata = '1' 
    GROUP BY b.kodegol
) t ON k.kodegol = t.kodegol
LEFT JOIN (
    SELECT b.kodegol, COUNT(*) AS COUNT 
    FROM ba_pemutusan_sementara a 
    LEFT JOIN permohonan_pemutusan_sementara b ON a.nomorpermohonan = b.nomor  
    WHERE LEFT(b.koderayon, 2) IN ({$kodeRayon}) AND DATE_FORMAT(tanggalba, '%Y%m') = {$periode} AND a.flagprosesdata = '1' 
    GROUP BY b.kodegol
) u ON k.kodegol = u.kodegol
LEFT JOIN (
    SELECT kodegol, COUNT(*) AS COUNT 
    FROM mutasi_pelanggan2024 
    WHERE LEFT(koderayon, 2) IN ({$kodeRayon}) AND periode = {$periode} AND STATUS = '1' 
    GROUP BY kodegol
) m1 ON k.kodegol = m1.kodegol
LEFT JOIN (
    SELECT kodegol, COUNT(*) AS COUNT 
    FROM mutasi_pelanggan2024 
    WHERE LEFT(koderayon, 2) IN ({$kodeRayon}) AND periode = {$periode} AND STATUS = '0' 
    GROUP BY kodegol
) m2 ON k.kodegol = m2.kodegol
ORDER BY k.kodegol";

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
