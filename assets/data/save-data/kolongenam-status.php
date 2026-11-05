<?php
include '../koneksi.php';

$data = json_decode(file_get_contents('php://input'), true);

$waktu = $data['waktu'];
$tma = $data['tma'];
$listrik = $data['listrik'];
$kjg_zona_1 = $data['kjg_zona_1'];
$kjg_zona_2 = $data['kjg_zona_2'];

// Insert query for TMA
$sql_insert_tma = "INSERT INTO tma (waktu, tma, waduk) VALUES ('$waktu', '$tma', 'Kolong Enam')";
$connk->query($sql_insert_tma);

// Update queries for status_pompa
$sql_update_listrik = "UPDATE status_kelistrikan SET status = '$listrik' WHERE waduk = 'Kolong Enam'";
$connk->query($sql_update_listrik);

$sql_update_kjg_zona_1 = "UPDATE status_pompa SET status = '$kjg_zona_1' WHERE pompa = 'KJG_ZONA_1'";
$connk->query($sql_update_kjg_zona_1);

$sql_update_kjg_zona_2 = "UPDATE status_pompa SET status = '$kjg_zona_2' WHERE pompa = 'KJG_ZONA_2'";
$connk->query($sql_update_kjg_zona_2);

$response = array("success" => true);
echo json_encode($response);

$connk->close();
