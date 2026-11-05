<?php
include '../koneksi.php';

$current_month = date('Ym');
$periode = date('Ym', strtotime('-1 month'));
$periodelalu = date('Ym', strtotime('-2 month'));
$periodeskrg = date('Y-m', strtotime('-1 month'));

// Query to get data
$sql = "SELECT
(SELECT((SELECT SUBSTRING(SUM(realisasiskrg), 1, LENGTH(SUM(realisasiskrg)) - 4) FROM labarugi2024 WHERE thnbln = $periode AND nolr IN ('A', 'F'))-(SELECT SUBSTRING(SUM(realisasiskrg), 1, LENGTH(SUM(realisasiskrg)) - 4) FROM labarugi2024 WHERE thnbln = $periode AND nolr IN ('B', 'D', 'F1')) ) AS hasil) AS data1,
(SELECT SUBSTRING(SUM(passiva), 1, LENGTH(SUM(passiva)) - 4) FROM neraca2024 WHERE LEFT(kodepassiva, 2)='70' AND thnbln=$periode) AS data2,
(SELECT SUBSTRING(SUM(realisasiskrg), 1, LENGTH(SUM(realisasiskrg)) - 4) FROM labarugi2024 WHERE nolr NOT IN ('A','F') AND thnbln=$periode) AS data3,
(SELECT SUBSTRING(SUM(realisasiskrg), 1, LENGTH(SUM(realisasiskrg)) - 4) FROM labarugi2024 WHERE nolr IN ('A','F') AND thnbln=$periode) AS data4,
(SELECT SUBSTRING(SUM(aktiva), 1, LENGTH(SUM(aktiva)) - 4) FROM neraca2024 WHERE LEFT(kodeaktiva,2) IN (11,12) AND thnbln=$periode) AS data5,
(SELECT SUBSTRING(SUM(passiva), 1, LENGTH(SUM(passiva)) - 4) FROM neraca2024 WHERE LEFT(kodepassiva,5) IN ('50.01','50.02','50.03','50.04','50.05','50.06') AND thnbln=$periode) AS data6,
(SELECT SUBSTRING(SUM(kepri_loket4.bayar.rekair), 1, LENGTH(SUM(kepri_loket4.bayar.rekair)) - 3) FROM kepri_loket4.bayar WHERE kepri_loket4.bayar.periode=$periodelalu AND DATE_FORMAT(kepri_loket4.bayar.tglbayar,'%Y-%m')='$periodeskrg') AS data7,
(SELECT SUBSTRING(SUM(realisasiskrg), 1, LENGTH(SUM(realisasiskrg)) - 4) FROM labarugi2024 WHERE kodelr='LR01' AND nolr IN ('A') AND thnbln=$periode) AS data8,
(SELECT SUBSTRING(SUM(aktiva), 1, LENGTH(SUM(aktiva)) - 4) FROM neraca2024 WHERE  thnbln=$periode) AS data9,
(SELECT SUBSTRING(SUM(passiva), 1, LENGTH(SUM(passiva)) - 4) FROM neraca2024 WHERE LEFT(kodepassiva,2)='50' AND thnbln=$periode) AS data10";
$result = $conna->query($sql);

$data = array();
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
}

echo json_encode($data);

$conna->close();
