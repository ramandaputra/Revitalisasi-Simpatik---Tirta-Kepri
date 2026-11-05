<?php
include '../koneksi.php';

// Ambil parameter wilayah dari query string
$wilayah_param = isset($_GET['wilayah']) ? $conn1->real_escape_string($_GET['wilayah']) : '';

// Dapatkan bulan dan tahun sebelumnya dalam format yang diinginkan
$tahun_bulan = date('Ym', strtotime('-1 month'));

// Tentukan kode wilayah berdasarkan parameter wilayah
switch ($wilayah_param) {
    case 'TNJ':
        $kode_wilayah = "'01', '02', '03', '04'";
        break;
    case 'KJG':
        $kode_wilayah = "'05'";
        break;
    case 'TUB':
        $kode_wilayah = "'06', '07', '08', '09'";
        break;
    default:
        $kode_wilayah = "'Unknown'"; // Default value if the wilayah is unknown
        break;
}

// Query untuk menghitung jumlah data berdasarkan wilayah
$sql = "SELECT
            LEFT(nosamb,2) AS wilayah,
            COUNT(*) AS count_data
        FROM
            ba_ganti_meter
        WHERE
            flaghapus = '0' AND
            flagprosesdata = '1' AND
            DATE_FORMAT(tanggalba, '%Y%m') = '$tahun_bulan' AND
            LEFT(nosamb,2) IN ($kode_wilayah)
        GROUP BY
            LEFT(nosamb,2)";

// Eksekusi query
$result = $conn1->query($sql);

// Inisialisasi array untuk menyimpan data
$data = array();

// Jika ada hasil, proses data
if ($result->num_rows > 0) {
    $total_count = 0;
    while ($row = $result->fetch_assoc()) {
        $total_count += (int)$row['count_data'];
    }
    // Tambahkan total_count ke array data
    $data['data2'] = $total_count;
} else {
    // Jika tidak ada data, set data2 sebagai 0
    $data['data2'] = 0;
}

// Encode data ke format JSON dan output
echo json_encode($data);

// Tutup koneksi database
$conn1->close();
