<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $periode = $_POST['periode'];
    $dat1 = $_POST['postB1'];
    $dat2 = $_POST['postB2'];
    $dat3 = $_POST['postB3'];
    $dat4 = $_POST['postB4'];
    $dat5 = $_POST['postB5'];
    $des1 = 'Pegawai Diklat';
    $des2 = 'Pegawai';
    $aspek_id = '4';
    $indikator = '17';

    $sql = "INSERT INTO kinerja (aspek_id, periode, indikator, deskripsi1, data1, deskripsi2, data2, hasil, score, bobot)
            VALUES ('$aspek_id', '$periode', '$indikator', '$des1', '$dat1', '$des2', '$dat2', '$dat3', '$dat4','$dat5')";

    if ($connk->query($sql) === TRUE) {
        echo "Berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . $connk->error;
    }
}

$conn->close();
