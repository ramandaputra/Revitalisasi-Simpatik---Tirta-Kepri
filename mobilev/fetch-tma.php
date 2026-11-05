<?php
include("x/koneksi.php");

$waduk = $_GET['waduk'];

$sql = "SELECT waktu, tma FROM tma 
        WHERE waduk = '$waduk' 
        ORDER BY waktu DESC LIMIT 7";

$result = $connk->query($sql);

$dates = [];
$levels = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dates[] = $row['waktu'];
        $levels[] = floatval($row['tma']);
    }
}

$connk->close();

// Reverse data for chronological order
$dates = array_reverse($dates);
$levels = array_reverse($levels);

// Return data as JSON
echo json_encode([
    'dates' => $dates,
    'levels' => $levels
]);
