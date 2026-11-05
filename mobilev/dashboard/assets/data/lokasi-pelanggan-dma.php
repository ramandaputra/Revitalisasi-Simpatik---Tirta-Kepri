<?php
include 'koneksi.php';

$dma = isset($_GET['dma']) ? $_GET['dma'] : '';

// Validate the dma parameter
if (!preg_match('/^\d+$/', $dma) && $dma !== 'all') {
    die(json_encode(['error' => 'Invalid DMA parameter']));
}

$sql = "SELECT a.nosamb AS nosamb, a.nama AS nama, a.alamat AS alamat, a.kodegol AS kodegol, a.merkmeter AS merkmeter, a.serimeter AS serimeter, a.status AS status, b.nama_dma AS dma, a.latitude AS latitude, a.longitude AS longitude 
        FROM pelanggan a 
        LEFT JOIN dma b ON a.kodedma=b.kodedma";
if ($dma !== 'all') {
    $sql .= " WHERE a.kodedma='$dma'";
}

$result = $conn1->query($sql);

if (!$result) {
    die(json_encode(['error' => "Query failed: " . $conn1->error]));
}

$markers = [];
while ($row = $result->fetch_assoc()) {
    $markers[] = [
        'latitude' => $row['latitude'],
        'longitude' => $row['longitude'],
        'nosamb' => $row['nosamb'],
        'nama' => $row['nama'],
        'alamat' => $row['alamat'],
        'kodegol' => $row['kodegol'],
        'merkmeter' => $row['merkmeter'],
        'serimeter' => $row['serimeter'],
        'status' => $row['status'],
        'dma' => $row['dma']
    ];
}

$conn1->close();

header('Content-Type: application/json');
echo json_encode($markers);
