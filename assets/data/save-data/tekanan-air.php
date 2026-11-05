<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $periode = $_POST['periode'];
    $dat1 = $_POST['postD1'];
    $dat2 = $_POST['postD2'];
    $dat3 = $_POST['postD3'];
    $dat4 = $_POST['postD4'];
    $dat5 = $_POST['postD5'];
    $des1 = 'Tekana diatas 0.7';
    $des2 = 'Jumlah Pelanggan Aktif';
    $aspek_id = '3';
    $indikator = '14';

    $sql = "INSERT INTO kinerja (aspek_id, periode, indikator, deskripsi1, data1, deskripsi2, data2, hasil, score, bobot)
            VALUES ('$aspek_id', '$periode', '$indikator', '$des1', '$dat1', '$des2', '$dat2', '$dat3', '$dat4','$dat5')";

    if ($connk->query($sql) === TRUE) {
        echo "Berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . $connk->error;
    }
}

$conn->close();
