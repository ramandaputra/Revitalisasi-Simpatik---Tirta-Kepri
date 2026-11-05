<?php
include 'koneksi.php';

// Modify the query to fetch the latest status for each pump
$sql = "SELECT 
REPLACE(subquery.NAME, 'sensor_', '') AS NAME, 
subquery.pressure, 
subquery.flow
FROM 
sensor AS subquery
INNER JOIN (
SELECT 
    NAME, 
    MAX(TIME) AS latest_time 
FROM 
    sensor 
WHERE 
    NAME IN ('sensor_hdpe', 'sensor_wk', 'sensor_pcm', 'sensor_gesek') 
GROUP BY 
    NAME
) AS latest_data
ON 
subquery.NAME = latest_data.NAME 
AND subquery.TIME = latest_data.latest_time
ORDER BY 
subquery.NAME ASC";
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
