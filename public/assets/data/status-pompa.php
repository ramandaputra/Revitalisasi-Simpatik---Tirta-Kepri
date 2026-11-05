<?php
include 'koneksi.php';

// Modify the query to fetch the latest status for each pump
$sql = "SELECT pompa, status, waduk FROM status_pompa ORDER BY pompa ASC";
$result = $connk->query($sql);

$pumpData = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pumpData[] = $row;
    }
} else {
    echo json_encode(array("status" => "No data"));
    $connk->close();
    exit();
}

$connk->close();
echo json_encode($pumpData);
