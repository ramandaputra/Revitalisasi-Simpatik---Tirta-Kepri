<?php
// Database connection settings
$host = '192.168.0.14';
$port = '5434';
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
$query = "SELECT ST_AsGeoJSON(geom) AS geometry, nama AS jenis, 'ZONA_DMA' AS name FROM \"ZONA_DMA\"
UNION ALL
SELECT ST_AsGeoJSON(geom) AS geometry, jenis AS jenis, 'PCM' AS name FROM \"PCM\"
UNION ALL
SELECT ST_AsGeoJSON(geom) AS geometry, jenis AS jenis, 'GESEK' AS name FROM \"GESEK\"
UNION ALL
SELECT ST_AsGeoJSON(geom) AS geometry, jenis AS jenis, 'HDPE' AS name FROM \"HDPE\"
UNION ALL
SELECT ST_AsGeoJSON(geom) AS geometry, jenis AS jenis, 'BW' AS name FROM \"BW\"
UNION ALL
SELECT ST_AsGeoJSON(geom) AS geometry, jenis AS jenis, 'RPD' AS name FROM \"RPD\"
UNION ALL
SELECT ST_AsGeoJSON(geom) AS geometry, jenis AS jenis, 'PIPA_KIJANG' AS name FROM \"PIPA_KIJANG\"
UNION ALL
SELECT ST_AsGeoJSON(geom) AS geometry, jenis AS jenis, 'PIPA_TANJUNG_UBAN' AS name FROM \"PIPA_TANJUNG_UBAN\"";

$result = $db->query($query);

// Create GeoJSON feature collection
$features = [];
foreach ($result as $row) {
    $geometry = json_decode($row['geometry']);
    $feature = [
        'type' => 'Feature',
        'geometry' => $geometry,
        'properties' => [
            'jenis' => $row['jenis'],
            'name' => $row['name']
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