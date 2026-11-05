<?php
include 'koneksi.php';

// Query SQL to get the list of DMAs
$sql = "SELECT kodedma, nama_dma FROM dma ORDER BY nama_dma";
$result = $conn1->query($sql);

$dmas = array();

if (!$result) {
    die("Query failed: " . $conn1->error);
}

while ($row = $result->fetch_assoc()) {
    $dma = array(
        'kodedma' => $row['kodedma'],
        'nama_dma' => $row['nama_dma']
    );
    array_push($dmas, $dma);
}

$conn1->close();

header('Content-Type: application/json');
echo json_encode($dmas);
