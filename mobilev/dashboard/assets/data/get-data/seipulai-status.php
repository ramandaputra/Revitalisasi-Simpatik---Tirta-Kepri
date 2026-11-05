<?php
include '../koneksi.php';

// Query untuk mendapatkan status pompa
$sql_select_status = "SELECT pompa, status FROM status_pompa WHERE waduk = 'Sei Pulai'";
$result_status = $connk->query($sql_select_status);

// Query untuk mendapatkan status kelistrikan
$sql_select_listrik = "SELECT status FROM status_kelistrikan WHERE waduk = 'Sei Pulai'";
$result_listrik = $connk->query($sql_select_listrik);

$status = array();

// Ambil status pompa
if ($result_status->num_rows > 0) {
    while ($row = $result_status->fetch_assoc()) {
        $status[$row['pompa']] = $row['status'];
    }
}

// Ambil status kelistrikan
if ($result_listrik->num_rows > 0) {
    $row = $result_listrik->fetch_assoc();
    $status['listrik'] = $row['status'];
}

// Encode data ke JSON dan kirim ke klien
echo json_encode($status);

$connk->close();
