<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dma = $_POST['dma'];
    $periode = $_POST['periode'];
    $dat1 = $_POST['data1'];
    $dat2 = $_POST['data2'];
    $has1 = $_POST['hasil1'];
    $dat3 = $_POST['data3'];
    $dat4 = $_POST['data4'];
    $has2 = $_POST['hasil2'];
    $has3 = $_POST['hasil3'];

    // Append '-01' to the periode to make it a valid date format for MySQL
    $periode .= '-01';

    // Check if the same dma and periode combination already exists
    $check_sql = "SELECT COUNT(*) AS count FROM nrw_dma WHERE dma = '$dma' AND periode = '$periode'";
    $result = $connk->query($check_sql);
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        echo "Data sudah pernah diinput, silahkan input data DMA lainnya.";
    } else {
        $sql = "INSERT INTO nrw_dma (dma, periode, lalu, kini, distribusi, pelanggan, pemakaian, kehilangan, persentase)
                VALUES ('$dma', '$periode', '$dat1', '$dat2', '$has1', '$dat3', '$dat4', '$has2', '$has3')";

        if ($connk->query($sql) === TRUE) {
            echo "Berhasil";
        } else {
            echo "Error: " . $sql . "<br>" . $connk->error;
        }
    }
}

$connk->close();
