<?php
include 'koneksi.php';
// Query untuk mengambil data dari database
$sql = "SELECT waktu, flow, NAME
FROM (
    SELECT TIME AS waktu, flow, NAME,
           @row_number := IF(@sensor = NAME, @row_number + 1, 1) AS rn,
           @sensor := NAME
    FROM sensor
    CROSS JOIN (SELECT @row_number := 0, @sensor := '') AS vars
    WHERE NAME IN ('sensor_gesek', 'sensor_hdpe', 'sensor_pcm', 'sensor_wk')
    ORDER BY NAME, TIME DESC
) AS numbered
WHERE rn <= 15
ORDER BY NAME, waktu DESC";
$result = $conni->query($sql);

$data = array();
if ($result->num_rows > 0) {
    // Ambil data baris per baris
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 hasil";
}

// Tutup koneksi database
$conni->close();

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
