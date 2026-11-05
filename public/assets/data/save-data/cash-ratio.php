<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $periode = $_POST['periode'];
    $dat1 = $_POST['rka1'];
    $dat2 = $_POST['rka2'];
    $dat3 = $_POST['rka3'];
    $dat4 = $_POST['rka4'];
    $dat5 = $_POST['rka5'];
    $des1 = 'Kas';
    $des2 = 'Hutang Lancar';
    $aspek_id = '1';
    $indikator = '3';

    $sql = "INSERT INTO kinerja (aspek_id, periode, indikator, deskripsi1, data1, deskripsi2, data2, hasil, score, bobot)
            VALUES ('$aspek_id', '$periode', '$indikator', '$des1', '$dat1', '$des2', '$dat2', '$dat3', '$dat4','$dat5')";

    if ($connk->query($sql) === TRUE) {
        echo "Berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . $connk->error;
    }
}

$conn->close();
