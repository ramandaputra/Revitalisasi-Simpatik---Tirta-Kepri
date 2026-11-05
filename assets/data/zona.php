<?php
include 'koneksi.php';

$query = "SELECT kodesumberair FROM sumberair";
$result = $conn1->query($query);

$zonaList = array();
while ($row = $result->fetch_assoc()) {
    $zonaList[] = $row['kodesumberair'];
}

echo json_encode($zonaList);
