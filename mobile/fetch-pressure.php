<?php
header('Content-Type: application/json');

// Database connection
include("x/koneksi.php");

// Get selected sensor from request
$sensor = isset($_GET['sensor']) ? $_GET['sensor'] : '';

// Query for current pressure
$currentPressureQuery = "SELECT pressure FROM sensor WHERE name = '$sensor' ORDER BY TIME DESC LIMIT 1";
$currentPressureResult = $conn->query($currentPressureQuery);

$currentPressure = 0;
if ($currentPressureResult->num_rows > 0) {
    $row = $currentPressureResult->fetch_assoc();
    $currentPressure = $row['pressure'];
}

// Query for historical pressure data
$historicalPressureQuery = "SELECT time, pressure FROM sensor WHERE name = '$sensor' ORDER BY TIME DESC LIMIT 7";
$historicalPressureResult = $conn->query($historicalPressureQuery);

$time = [];
$pressureLimits = [];
while ($row = $historicalPressureResult->fetch_assoc()) {
    $time[] = $row['time'];
    $pressureLimits[] = $row['pressure'];
}

// Close connection
$conn->close();

// Prepare response data
$response = [
    'currentPressure' => (float)$currentPressure, // Ensure it's a float
    'time' => array_reverse($time), // Reverse to show oldest first
    'pressureLimits' => array_reverse($pressureLimits) // Reverse to show oldest first
];

// Output response as JSON
echo json_encode($response);
