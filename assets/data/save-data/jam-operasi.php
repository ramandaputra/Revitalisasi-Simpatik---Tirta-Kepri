<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $periode = $_POST['periode'];
    $dat1 = $_POST['postC1'];
    $dat2 = $_POST['postC2'];
    $dat3 = $_POST['postC3'];
    $dat4 = $_POST['postC4'];
    $dat5 = $_POST['postC5'];
    $des1 = 'Waktu Distribusi';
    $des2 = 'Periode Evaluasi';
    $aspek_id = '3';
    $indikator = '13';

    $sql = "INSERT INTO kinerja (aspek_id, periode, indikator, deskripsi1, data1, deskripsi2, data2, hasil, score, bobot)
            VALUES ('$aspek_id', '$periode', '$indikator', '$des1', '$dat1', '$des2', '$dat2', '$dat3', '$dat4','$dat5')";

    if ($connk->query($sql) === TRUE) {
        echo "Berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . $connk->error;
    }
}

$conn->close();
