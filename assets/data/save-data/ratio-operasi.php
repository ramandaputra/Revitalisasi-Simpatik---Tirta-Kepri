<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $periode = $_POST['periode'];
    $dat1 = $_POST['rop1'];
    $dat2 = $_POST['rop2'];
    $dat3 = $_POST['rop3'];
    $dat4 = $_POST['rop4'];
    $dat5 = $_POST['rop5'];
    $des1 = 'Biaya Operasi';
    $des2 = 'Pendapatan Operasi';
    $aspek_id = '1';
    $indikator = '2';

    $sql = "INSERT INTO kinerja (aspek_id, periode, indikator, deskripsi1, data1, deskripsi2, data2, hasil, score, bobot)
            VALUES ('$aspek_id', '$periode', '$indikator', '$des1', '$dat1', '$des2', '$dat2', '$dat3', '$dat4','$dat5')";

    if ($connk->query($sql) === TRUE) {
        echo "Berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . $connk->error;
    }
}

$conn->close();
