<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $periode = $_POST['periode'];
    $dat1 = $_POST['roe1'];
    $dat2 = $_POST['roe2'];
    $dat3 = $_POST['roe3'];
    $dat4 = $_POST['roe4'];
    $dat5 = $_POST['roe5'];
    $des1 = 'Laba Rugi Bersih';
    $des2 = 'Jumlah Ekuitas';
    $aspek_id = '1';
    $indikator = '1';

    $sql = "INSERT INTO kinerja (aspek_id, periode, indikator, deskripsi1, data1, deskripsi2, data2, hasil, score, bobot)
            VALUES ('$aspek_id', '$periode', '$indikator', '$des1', '$dat1', '$des2', '$dat2', '$dat3', '$dat4','$dat5')";

    if ($connk->query($sql) === TRUE) {
        echo "Berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . $connk->error;
    }
}

$conn->close();
