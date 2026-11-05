<?php
include 'koneksi.php';

$sql = "SELECT a.id, b.nama_dma, a.pelanggan, a.distribusi, a.pemakaian, a.kehilangan, a.persentase
        FROM kebocoran a
        LEFT JOIN dma b ON a.id = b.id
        WHERE a.tanggal >= DATE_SUB(CURRENT_DATE, INTERVAL DAYOFMONTH(CURRENT_DATE)-1 DAY) - INTERVAL 1 MONTH
        AND a.tanggal < DATE_SUB(CURRENT_DATE, INTERVAL DAYOFMONTH(CURRENT_DATE)-1 DAY)
        ORDER BY a.persentase DESC";

$result = $connx->query($sql);

$orders = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
} else {
    echo "0 results";
}
$connx->close();

echo json_encode($orders);
