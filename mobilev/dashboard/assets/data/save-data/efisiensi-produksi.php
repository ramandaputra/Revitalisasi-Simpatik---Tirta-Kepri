<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $periode = $_POST['periode'];
    $dat1 = $_POST['postA1'];
    $dat2 = $_POST['postA2'];
    $dat3 = $_POST['postA3'];
    $dat4 = $_POST['postA4'];
    $dat5 = $_POST['postA5'];
    $des1 = 'Volume Produksi';
    $des2 = 'Kapasitas Terpasang';
    $aspek_id = '3';
    $indikator = '11';

    $sql = "INSERT INTO kinerja (aspek_id, periode, indikator, deskripsi1, data1, deskripsi2, data2, hasil, score, bobot)
            VALUES ('$aspek_id', '$periode', '$indikator', '$des1', '$dat1', '$des2', '$dat2', '$dat3', '$dat4','$dat5')";

    if ($connk->query($sql) === TRUE) {
        echo "Berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . $connk->error;
    }
}

$conn->close();
