<?php
include 'koneksi.php';

$current_month = date('Ym');
$periode = date('Ym', strtotime('-3 month')); //noted
$sql = "SELECT waktu, jdu, penjualan AS data1, kehilangan AS data2, persentase AS data3 FROM nrw WHERE DATE_FORMAT(waktu,'%Y%m')='$periode'";
$result = $connk->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Mengembalikan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo json_encode(array("status" => "Data tidak ditemukan"));
}

$connk->close();
