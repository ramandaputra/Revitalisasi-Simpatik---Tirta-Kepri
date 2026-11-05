<?php
include '../koneksi.php';

$data = json_decode(file_get_contents('php://input'), true);

$waktu = $data['waktu'];
$tma = $data['tma'];
$listrik = $data['listrik'];
$gesek = $data['gesek'];

// Insert query for TMA
$sql_insert_tma = "INSERT INTO tma (waktu, tma, waduk) VALUES ('$waktu', '$tma', 'Sei Gesek')";
$connk->query($sql_insert_tma);

// Update queries for status_pompa
$sql_update_listrik = "UPDATE status_kelistrikan SET status = '$listrik' WHERE waduk = 'Sei Gesek'";
$connk->query($sql_update_listrik);

$sql_update_gesek = "UPDATE status_pompa SET status = '$gesek' WHERE pompa = 'GESEK'";
$connk->query($sql_update_gesek);

$response = array("success" => true);
echo json_encode($response);

$connk->close();
