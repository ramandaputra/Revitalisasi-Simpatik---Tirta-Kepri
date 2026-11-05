<?php
include 'koneksi.php';
$sql = "SELECT FORMAT(SUM(total),0) AS bayar, FORMAT(SUM(pakai),0) AS pakai FROM bayar WHERE DATE_FORMAT(tglbayar, '%Y-%m') = DATE_FORMAT(CURRENT_DATE(), '%Y-%m')";

$result = $conn1->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $pakai = $row['pakai'];
    $bayar = $row['bayar'];

    $data = array(
        'pakai' => $pakai,
        'bayar' => $bayar
    );

    // Mengembalikan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo "Data tidak ditemukan";
}

$conn->close();
