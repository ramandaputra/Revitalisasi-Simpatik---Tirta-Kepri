<?php
include("../x/koneksi.php");

$query = "SELECT id, UNIX_TIMESTAMP(CONVERT_TZ(TIME, '+00:00', '+07:00')) AS DATE, ROUND(AVG(pressure), 2) AS average_pressure
FROM sensor0923
WHERE NAME = 'sensor_hdpe'
AND TIME IN (
	SELECT MAX(TIME)
	FROM sensor0923
	WHERE NAME = 'sensor_hdpe'
	GROUP BY DATE_FORMAT(TIME, '%Y-%m-%d %H')
)
GROUP BY DATE(TIME)
ORDER BY TIME DESC, id ASC
LIMIT 31";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
	$nilai = array();
	while ($row = mysqli_fetch_array($result)) {
		$id = $row[0];
		$x = $row[1] * 1000;
		$y = $row[2];
		$nilai[] = array("id" => $id, "x" => $x, "y" => $y);
	}
	usort($nilai, function ($a, $b) { // Mengurutkan hasil array berdasarkan ID
		return $a['id'] - $b['id'];
	});
	echo str_replace('"', '', json_encode($nilai)); // Menghasilkan output JSON
} else {
	echo json_encode(array()); // Menghasilkan output JSON kosong jika tidak ada hasil dari query
}

mysqli_close($conn);
