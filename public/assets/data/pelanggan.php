<?php
include 'koneksi.php';

$sql = "SELECT
(SELECT COUNT(*) FROM pelanggan WHERE STATUS='1') AS data1,
(SELECT COUNT(*) FROM pelanggan WHERE STATUS='0') AS data2";

$result = $conn1->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["data1" => 0, "data2" => 0]);
}

$conn1->close();
