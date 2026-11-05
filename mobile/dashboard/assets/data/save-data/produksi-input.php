<?php
include '../koneksi.php';

$periode = $_POST['periode'];
$ipa = $_POST['ipa'];
$target = $_POST['target'];
$realisasi = $_POST['realisasi'];

$sql = "INSERT INTO produksi (waktu, target, produksi, waduk)
        VALUES ('$periode', '$target', '$realisasi', '$ipa')";

// Eksekusi query dan periksa hasilnya
if ($connk->query($sql) === TRUE) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $connk->error;
}

$connk->close();
