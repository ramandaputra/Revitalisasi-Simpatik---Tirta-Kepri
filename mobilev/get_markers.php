<?php
include("x/koneksi.php");

// Query SQL untuk mengambil data marker
$sql = "SELECT subquery.TIME AS waktu, subquery.lat, subquery.lng, subquery.NAME, subquery.pressure, subquery.flow, subquery.tds, subquery.water_level
FROM sensor AS subquery
INNER JOIN (
    SELECT NAME, MAX(TIME) AS latest_time
    FROM sensor
    WHERE NAME IN ('sensor_hdpe', 'sensor_wk', 'sensor_pcm', 'sensor_gesek', 'sensor_mobile')
    GROUP BY NAME
) AS latest_data
ON subquery.NAME = latest_data.NAME AND subquery.TIME = latest_data.latest_time
ORDER BY subquery.TIME DESC";
$result = $conn->query($sql);

// Inisialisasi array untuk menyimpan data marker
$markers = array();

// Periksa hasil query
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Loop melalui setiap baris hasil query
while ($row = $result->fetch_assoc()) {
    // Tambahkan data marker ke array
    $marker = array(
        'latitude' => $row['lat'],
        'longitude' => $row['lng'],
        'time' => $row['waktu'],
        'name' => $row['NAME'],
        'pressure' => $row['pressure'],
        'flow' => $row['flow'],
        'tds' => $row['tds'],
        'level' => $row['water_level']
    );
    array_push($markers, $marker);
}

// Tutup koneksi MySQL
$conn->close();

// Mengembalikan data marker dalam format JSON
header('Content-Type: application/json');
echo json_encode($markers);
