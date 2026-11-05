<?php
header('Content-Type: application/json');

include 'koneksi.php';

$tiket = isset($_GET['tiket']) ? $_GET['tiket'] : '';

if ($tiket) {
    // Query SQL untuk mengambil detail kegiatan berdasarkan tiket
    $query = "SELECT * FROM spka_kegiatan WHERE tiket=?";

    $stmt = $connk->prepare($query);
    $stmt->bind_param("s", $tiket);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'Query failed: ' . $connk->error));
    }
} else {
    echo json_encode(array('error' => 'Invalid tiket parameter'));
}

$connk->close();
