<?php
include '../koneksi.php';

$data = json_decode(file_get_contents('php://input'), true);

$waktu = $data['waktu'];
$tma = $data['tma'];
$listrik = $data['listrik'];
$tub_zona_1 = $data['tub_zona_1'];
$tub_zona_2 = $data['tub_zona_2'];

// Insert query for TMA
$sql_insert_tma = "INSERT INTO tma (waktu, tma, waduk) VALUES ('$waktu', '$tma', 'Sei Jago')";
$connk->query($sql_insert_tma);

// Update queries for status_pompa
$sql_update_listrik = "UPDATE status_kelistrikan SET status = '$listrik' WHERE waduk = 'Sei Jago'";
$connk->query($sql_update_listrik);

$sql_update_tub_zona_1 = "UPDATE status_pompa SET status = '$tub_zona_1' WHERE pompa = 'TUB_ZONA_1'";
$connk->query($sql_update_tub_zona_1);

$sql_update_tub_zona_2 = "UPDATE status_pompa SET status = '$tub_zona_2' WHERE pompa = 'TUB_ZONA_2'";
$connk->query($sql_update_tub_zona_2);

$response = array("success" => true);
echo json_encode($response);

$connk->close();
