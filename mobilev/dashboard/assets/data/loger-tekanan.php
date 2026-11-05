<?php
include 'koneksi.php';
$sql = "SELECT MAX(TIME) AS waktu, pressure, NAME FROM sensor WHERE NAME IN ('sensor_gesek','sensor_hdpe','sensor_pcm','sensor_wk') GROUP BY NAME";
$result = $conni->query($sql);

$tasks = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
}

$conni->close();

header('Content-Type: application/json');
echo json_encode($tasks);
