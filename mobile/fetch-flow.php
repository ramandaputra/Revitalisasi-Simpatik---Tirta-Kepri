<?php
header('Content-Type: application/json');

// Database connection
include("x/koneksi.php");

// Get selected sensor from request
$sensor = isset($_GET['sensor']) ? $_GET['sensor'] : '';

// Query for current sensor
$currentFlowQuery = "SELECT flow FROM sensor WHERE name = '$sensor' ORDER BY TIME DESC LIMIT 1";
$currentFlowResult = $conn->query($currentFlowQuery);

$currentFlow = 0;
if ($currentFlowResult->num_rows > 0) {
    $row = $currentFlowResult->fetch_assoc();
    $currentFlow = $row['flow'];
}

// Query for historical sensor data
$historicalFlowQuery = "SELECT time, flow FROM sensor WHERE name = '$sensor' ORDER BY TIME DESC LIMIT 7";
$historicalFlowResult = $conn->query($historicalFlowQuery);

$time = [];
$flowLimits = [];
while ($row = $historicalFlowResult->fetch_assoc()) {
    $time[] = $row['time'];
    $flowLimits[] = $row['flow'];
}

// Close connection
$conn->close();

// Prepare response data
$response = [
    'currentFlow' => (float)$currentFlow, // Ensure it's a float
    'time' => array_reverse($time), // Reverse to show oldest first
    'flowLimits' => array_reverse($flowLimits) // Reverse to show oldest first
];

// Output response as JSON
echo json_encode($response);
