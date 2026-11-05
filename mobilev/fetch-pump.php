<?php
header('Content-Type: application/json');

// Database configuration
include("x/koneksi.php");

// Get wilayah parameter from GET request
$wilayah = isset($_GET['wilayah']) ? $connk->real_escape_string($_GET['wilayah']) : '';

// Map wilayah to waduk
$waduk = [];
switch ($wilayah) {
    case 'tnj':
        $waduk = ['Sei Pulai', 'Sei Gesek'];
        break;
    case 'kjg':
        $waduk = ['Kolong Enam'];
        break;
    case 'tub':
        $waduk = ['Sei Jago'];
        break;
    default:
        $waduk = [];
        break;
}

// Convert waduk array to a comma-separated string for the SQL query
$wadukList = "'" . implode("','", $waduk) . "'";

// Query to get pump status data based on waduk
$sql = "SELECT pompa, status, waktu
        FROM status_pompa 
        WHERE waduk IN ($wadukList)";

// Debug SQL query
error_log("SQL Query: " . $sql);

$result = $connk->query($sql);

// Error handling for the query
if (!$result) {
    echo json_encode(['error' => $connk->error]);
    exit();
}

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convert status to "Running" or "Stop"
        $status = $row['status'] === 'On' ? 'Running' : 'Stop';

        $data[] = [
            'name' => $row['pompa'],
            'status' => $status,
            'time' => $row['waktu']
        ];
    }
} else {
    $data = ['error' => 'No data found for selected wilayah'];
}

// Close the connection
$connk->close();

// Output the JSON data
echo json_encode($data);
