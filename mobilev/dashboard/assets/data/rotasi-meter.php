<?php
include 'koneksi.php';

$sql = "SELECT nosamb AS id_pelanggan, nama, alamat, merkmeter_lama AS merek_meter, serimeter_lama AS seri_meter, keterangan_spk AS umur_meter  FROM rotasimeter WHERE status_pelanggan='1' AND flagprosesdata='0'";

$result = $conn1->query($sql);

$orders = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
} else {
    echo "0 results";
}
$conn1->close();

echo json_encode($orders);
