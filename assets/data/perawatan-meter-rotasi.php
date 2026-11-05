<?php
include 'koneksi.php';

$sql = "SELECT data1.kodewil, data1.count AS data1, data2.count AS data2
FROM
    (SELECT kodewil, COUNT(*) AS COUNT FROM rotasimeter 
     WHERE flag_ba='0' AND status_pelanggan='1' 
     GROUP BY kodewil) AS data1
LEFT JOIN
    (SELECT kodewil, COUNT(*) AS COUNT FROM rotasimeter 
     WHERE flag_ba='1' AND status_pelanggan='1' 
     GROUP BY kodewil) AS data2
ON data1.kodewil = data2.kodewil";

$result = $conn1->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn1->close();
