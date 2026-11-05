<?php
include 'koneksi.php';

$query = "SELECT nama FROM petugasbaca WHERE aktif='1'";
$result = $conn->query($query);

$petugasList = array();
while ($row = $result->fetch_assoc()) {
    $petugasList[] = $row['nama'];
}

echo json_encode($petugasList);
