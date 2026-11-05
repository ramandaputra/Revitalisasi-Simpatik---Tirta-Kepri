<?php
include 'koneksi.php';
// Mengambil data tinggi muka air dari database
$sql = "SELECT subquery.waktu, subquery.tma, subquery.waduk
FROM tma AS subquery
INNER JOIN (
    SELECT waduk, MAX(waktu) AS latest_time
    FROM tma
    WHERE waduk IN ('Sei Pulai', 'Sei Gesek', 'Sei Jago', 'Kolong Enam')
    GROUP BY waduk
) AS latest_data
ON subquery.waduk = latest_data.waduk AND subquery.waktu = latest_data.latest_time
ORDER BY subquery.waktu DESC";
$result = $connk->query($sql);

$tmas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tmas[] = $row;
    }
}

$connk->close();

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($tmas);
