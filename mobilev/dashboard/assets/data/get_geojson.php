<?php
// Database connection settings
$host = '192.168.0.8';
$port = '5437';
$dbname = 'kepri_pipa';
$user = 'postgres';
$password = 'pd3#';

// Connect to PostgreSQL database
try {
    $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error connecting to PostgreSQL database: " . $e->getMessage());
}

// Query to retrieve GeoJSON data
$query = "SELECT ST_AsGeoJSON(geom) AS geometry, nama AS sumber, 'ZONA_DMA' AS type FROM \"ZONA_DMA\"
UNION ALL
SELECT ST_AsGeoJSON(geom) AS geometry, sumberair AS sumber, 'PIPA_TANJUNGPINANG' AS type FROM \"PIPA_TANJUNGPINANG\"
UNION ALL
SELECT ST_AsGeoJSON(geom) AS geometry, sumberair AS sumber, 'PIPA_KIJANG' AS type FROM \"PIPA_KIJANG\"
UNION ALL
SELECT ST_AsGeoJSON(geom) AS geometry, sumberair AS sumber, 'PIPA_TANJUNG_UBAN' AS type FROM \"PIPA_TANJUNG_UBAN\"";

$result = $db->query($query);

// Create GeoJSON feature collection
$features = [];
foreach ($result as $row) {
    $geometry = json_decode($row['geometry']);
    $feature = [
        'type' => 'Feature',
        'geometry' => $geometry,
        'properties' => [
            'sumber' => $row['sumber']
        ]
    ];

    $features[] = $feature;
}

$featureCollection = [
    'type' => 'FeatureCollection',
    'features' => $features
];

// Output GeoJSON
header('Content-Type: application/json');
echo json_encode($featureCollection);
