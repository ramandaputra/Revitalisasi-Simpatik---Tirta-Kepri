<?php
include("x/koneksi.php");

// Get the selected date from the request
$date = $_GET['date'];

// Prepare the SQL query to fetch data based on the date
$sql = "SELECT lokasi, warna, kekeruhan, tds, ph, scl FROM kualitas_air WHERE DATE_FORMAT(waktu,'%Y-%m-%d') = ?";
$stmt = $connk->prepare($sql);
$stmt->bind_param("s", $date);
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();
$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Return the data as JSON
echo json_encode($data);

// Close the connection
$stmt->close();
$connk->close();
