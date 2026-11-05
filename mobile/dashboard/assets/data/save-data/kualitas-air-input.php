<?php
include '../koneksi.php';

$periode = $_POST['periode'];
$lokasi = $_POST['lokasi'];
$warna = $_POST['warna'];
$kekeruhan = $_POST['kekeruhan'];
$tds = $_POST['tds'];
$ph = $_POST['ph'];
$scl = $_POST['scl'];

// Inisialisasi variabel waduk
$waduk = '';

// Tentukan nilai waduk berdasarkan lokasi
switch ($lokasi) {
    case 'Air Baku Sei Pulai':
    case 'Pengolahan Air RPD':
    case 'Pengolahan Air PCM':
    case 'Pengolahan Air WK':
        $waduk = 'Sei Pulai';
        break;
    case 'Air Baku Sei Gesek':
        $waduk = 'Sei Gesek';
        break;
    case 'Air Baku Kolong Enam':
        $waduk = 'Kolong Enam';
        break;
    case 'Air Baku Sei Jago':
        $waduk = 'Sei Jago';
        break;
    default:
        $waduk = ''; // Penanganan jika lokasi tidak sesuai
        break;
}

// Buat query SQL untuk menyimpan data ke dalam tabel
$sql = "INSERT INTO kualitas_air (waktu, lokasi, warna, kekeruhan, tds, ph, scl, waduk)
        VALUES ('$periode', '$lokasi', '$warna', '$kekeruhan', '$tds', '$ph', '$scl', '$waduk')";

// Eksekusi query dan periksa hasilnya
if ($connk->query($sql) === TRUE) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $connk->error;
}

$connk->close();
