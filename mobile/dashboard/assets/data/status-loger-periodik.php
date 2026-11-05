<?php
include 'koneksi.php';

$sql = "
    SELECT REPLACE(NAME, 'sensor_', '') AS NAME, pressure, flow, TIME
    FROM (
        SELECT 
            NAME, pressure, flow, TIME,
            ROW_NUMBER() OVER (PARTITION BY NAME ORDER BY TIME DESC) AS rn
        FROM 
            sensor
        WHERE 
            NAME IN ('sensor_hdpe', 'sensor_wk', 'sensor_pcm', 'sensor_gesek')
    ) AS subquery
    WHERE rn <= 7
    ORDER BY NAME ASC, TIME DESC";

$result = $conni->query($sql);

$pumpData = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pumpData[] = $row;
    }
} else {
    echo json_encode(array("status" => "No data"));
    $conni->close();
    exit();
}

$conni->close();
echo json_encode($pumpData);
