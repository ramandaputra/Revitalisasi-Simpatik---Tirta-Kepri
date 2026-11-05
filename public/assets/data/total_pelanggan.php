<?php
include 'koneksi.php';
$sql = "SELECT 
            (SELECT CONCAT(FORMAT(COUNT(*),0), ' SL') FROM pelanggan WHERE status='0') AS putus,
            (SELECT CONCAT(FORMAT(COUNT(*),0), ' SL') FROM pelanggan WHERE status='1') AS aktif,
            (SELECT CONCAT(FORMAT(SUM(pakai),0), ' m³') FROM bayar WHERE DATE_FORMAT(tglbayar, '%Y-%m') = DATE_FORMAT(CURRENT_DATE(), '%Y-%m')) AS pakai,
            (SELECT FORMAT(SUM(total),0) FROM bayar WHERE DATE_FORMAT(tglbayar, '%Y-%m') = DATE_FORMAT(CURRENT_DATE(), '%Y-%m')) AS bayar";

$result = $conn1->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $putus = $row['putus'];
    $aktif = $row['aktif'];
    $pakai = $row['pakai'];
    $bayar = $row['bayar'];

    $data = array(
        'putus' => $putus,
        'aktif' => $aktif,
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
