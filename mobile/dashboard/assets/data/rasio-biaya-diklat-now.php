<?php
include 'koneksi.php';
$sql = "SELECT periode, FORMAT(data1, 0, 'de_DE') AS data1, FORMAT(data2, 0, 'de_DE') AS data2 FROM kinerja WHERE indikator = '18' ORDER BY periode DESC LIMIT 1";
$result = $connk->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data1 = $row['data1'];
    $data2 = $row['data2'];

    $data = array(
        'data1' => $data1,
        'data2' => $data2
    );

    // Mengembalikan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo "Data tidak ditemukan";
}

$conn->close();
