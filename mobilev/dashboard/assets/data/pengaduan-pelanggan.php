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
    $query = "
        SELECT 
            COALESCE(rc.jenis_keterangan, uc.jenis_keterangan) AS jenis_keterangan,
            COALESCE(rc.sudah_selesai, 0) AS sudah_selesai,
            COALESCE(uc.belum_selesai, 0) AS belum_selesai
        FROM
            (SELECT 
                a.kategori, 
                c.jenis_keterangan, 
                COUNT(*) AS sudah_selesai 
             FROM 
                pengaduan a 
                LEFT JOIN spk_pengaduan b ON a.nomor = b.nomorpengaduan 
                LEFT JOIN jenisnonair c ON a.kategori = c.jenis 
             WHERE 
                DATE_FORMAT(a.tglditerima, '%Y%m') = '{$periode}'
                AND a.kodewil IN ({$kodeRayon}) 
                AND a.flaghapus = '0' 
                AND b.tgldiselesaikan IS NOT NULL 
             GROUP BY 
                a.kategori
            ) AS rc
        LEFT JOIN
            (SELECT 
                a.kategori, 
                c.jenis_keterangan, 
                COUNT(*) AS belum_selesai 
             FROM 
                pengaduan a 
                LEFT JOIN spk_pengaduan b ON a.nomor = b.nomorpengaduan 
                LEFT JOIN jenisnonair c ON a.kategori = c.jenis 
             WHERE 
                DATE_FORMAT(a.tglditerima, '%Y%m') = '{$periode}'
                AND a.kodewil IN ({$kodeRayon}) 
                AND a.flaghapus = '0' 
                AND b.tgldiselesaikan IS NULL 
             GROUP BY 
                a.kategori
            ) AS uc
        ON rc.kategori = uc.kategori
        UNION
        SELECT 
            COALESCE(rc.jenis_keterangan, uc.jenis_keterangan) AS jenis_keterangan,
            COALESCE(rc.sudah_selesai, 0) AS sudah_selesai,
            COALESCE(uc.belum_selesai, 0) AS belum_selesai
        FROM
            (SELECT 
                a.kategori, 
                c.jenis_keterangan, 
                COUNT(*) AS sudah_selesai 
             FROM 
                pengaduan a 
                LEFT JOIN spk_pengaduan b ON a.nomor = b.nomorpengaduan 
                LEFT JOIN jenisnonair c ON a.kategori = c.jenis 
             WHERE 
                DATE_FORMAT(a.tglditerima, '%Y%m') = '{$periode}' 
                AND a.kodewil IN ({$kodeRayon}) 
                AND a.flaghapus = '0' 
                AND b.tgldiselesaikan IS NOT NULL 
             GROUP BY 
                a.kategori
            ) AS rc
        RIGHT JOIN
            (SELECT 
                a.kategori, 
                c.jenis_keterangan, 
                COUNT(*) AS belum_selesai 
             FROM 
                pengaduan a 
                LEFT JOIN spk_pengaduan b ON a.nomor = b.nomorpengaduan 
                LEFT JOIN jenisnonair c ON a.kategori = c.jenis 
             WHERE 
                DATE_FORMAT(a.tglditerima, '%Y%m') = '{$periode}'
                AND a.kodewil IN ({$kodeRayon}) 
                AND a.flaghapus = '0' 
                AND b.tgldiselesaikan IS NULL 
             GROUP BY 
                a.kategori
            ) AS uc
        ON rc.kategori = uc.kategori";

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
