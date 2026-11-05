<?php
include 'koneksi.php';
$sql = "SELECT score, score AS stars, hasil FROM kinerja WHERE indikator = '15' ORDER BY periode DESC LIMIT 1";
$result = $connk->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $score = $row['score'];
    $stars = $row['stars'];

    $data = array(
        'score' => $score,
        'stars' => $stars
    );

    // Mengembalikan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo "Data tidak ditemukan";
}

$conn->close();
