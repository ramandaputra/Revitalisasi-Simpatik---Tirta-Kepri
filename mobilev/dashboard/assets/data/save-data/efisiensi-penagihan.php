<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $periode = $_POST['periode'];
    $dat1 = $_POST['epe1'];
    $dat2 = $_POST['epe2'];
    $dat3 = $_POST['epe3'];
    $dat4 = $_POST['epe4'];
    $dat5 = $_POST['epe5'];
    $des1 = 'Penerimaan Rekening Air';
    $des2 = 'Rekening Air Ditagihkan';
    $aspek_id = '1';
    $indikator = '4';

    $sql = "INSERT INTO kinerja (aspek_id, periode, indikator, deskripsi1, data1, deskripsi2, data2, hasil, score, bobot)
            VALUES ('$aspek_id', '$periode', '$indikator', '$des1', '$dat1', '$des2', '$dat2', '$dat3', '$dat4','$dat5')";

    if ($connk->query($sql) === TRUE) {
        echo "Berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . $connk->error;
    }
}

$conn->close();
