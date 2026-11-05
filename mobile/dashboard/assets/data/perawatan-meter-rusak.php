<?php
include 'koneksi.php';

$sql = "SELECT count1.kodewil, count1.count AS data1, count2.count AS data2
FROM
    (SELECT LEFT(nosamb,2) AS kodewil, COUNT(*) AS COUNT FROM ba_ganti_meter 
     WHERE flaghapus='0' AND tglpasang IS NULL 
     GROUP BY LEFT(nosamb,2)) AS count1
LEFT JOIN
    (SELECT LEFT(nosamb,2) AS kodewil, COUNT(*) AS COUNT FROM ba_ganti_meter 
     WHERE  flaghapus='0' AND DATE_FORMAT(tanggalba,'%Y')='2024' AND tglpasang IS NOT NULL 
     GROUP BY LEFT(nosamb,2)) AS count2
ON count1.kodewil = count2.kodewil";

$result = $conn1->query($sql);

$rows = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // If count2.count is NULL, set it to 0
        if (is_null($row['data2'])) {
            $row['data2'] = 0;
        }
        $rows[] = $row;
    }
} else {
    // If no rows are found, set a default response
    $rows[] = ["kodewil" => "0", "data1" => 0, "data2" => 0];
}

echo json_encode($rows);

$conn1->close();
