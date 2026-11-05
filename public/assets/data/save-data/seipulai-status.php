<?php
include '../koneksi.php';

$data = json_decode(file_get_contents('php://input'), true);

$waktu = $data['waktu'];
$tma = $data['tma'];
$listrik = $data['listrik'];
$psab = $data['psab'];
$pcm = $data['pcm'];
$rpd = $data['rpd'];
$hdpe = $data['hdpe'];

// Insert query for TMA
$sql_insert_tma = "INSERT INTO tma (waktu, tma, waduk) VALUES ('$waktu', '$tma', 'Sei Pulai')";
$connk->query($sql_insert_tma);

// Update queries for status_pompa
$sql_update_listrik = "UPDATE status_kelistrikan SET status = '$listrik' WHERE waduk = 'Sei Pulai'";
$connk->query($sql_update_listrik);

$sql_update_psab = "UPDATE status_pompa SET status = '$psab' WHERE pompa = 'PSAB'";
$connk->query($sql_update_psab);

$sql_update_pcm = "UPDATE status_pompa SET status = '$pcm' WHERE pompa = 'PCM'";
$connk->query($sql_update_pcm);

$sql_update_rpd = "UPDATE status_pompa SET status = '$rpd' WHERE pompa = 'RPD'";
$connk->query($sql_update_rpd);

$sql_update_hdpe = "UPDATE status_pompa SET status = '$hdpe' WHERE pompa = 'HDPE'";
$connk->query($sql_update_hdpe);

$response = array("success" => true);
echo json_encode($response);

$connk->close();
