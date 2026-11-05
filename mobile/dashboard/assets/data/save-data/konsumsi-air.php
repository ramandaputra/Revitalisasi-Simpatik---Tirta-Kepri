<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $periode = $_POST['periode'];
    $dat1 = $_POST['postE1'];
    $dat2 = $_POST['postE2'];
    $dat3 = $_POST['postE3'];
    $dat4 = $_POST['postE4'];
    $dat5 = $_POST['postE5'];
    $des1 = 'Air Terjual Domestik';
    $des2 = 'Pelanggan Domestik';
    $aspek_id = '2';
    $indikator = '10';

    $sql = "INSERT INTO kinerja (aspek_id, periode, indikator, deskripsi1, data1, deskripsi2, data2, hasil, score, bobot)
            VALUES ('$aspek_id', '$periode', '$indikator', '$des1', '$dat1', '$des2', '$dat2', '$dat3', '$dat4','$dat5')";

    if ($connk->query($sql) === TRUE) {
        echo "Berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . $connk->error;
    }
}

$conn->close();
