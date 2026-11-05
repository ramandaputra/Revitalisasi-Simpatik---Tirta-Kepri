<?php
$servername = "server.tirtakepri.co.id:3309";
$servernamex = "dash.tirtakepri.co.id:3309";
$username = "kepri";
$usernamex = "root";
$password = "bacadoa#";
$passwordx = "pd3#";
$dbname = "bacameter";
$dbname1 = "kepri_loket4";
$dbname2 = "kepri_akuntansi";
$dbname3 = "kepri_bsbs4";
$dbnamex = "kepri_dma";
$dbnamek = "kepri_kinerja";
$dbnamei = "kepri_iot";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database Bacameter gagal: " . $conn->connect_error);
}

// Buat koneksi1
$conn1 = new mysqli($servername, $username, $password, $dbname1);

// Periksa koneksi
if ($conn1->connect_error) {
    die("Koneksi ke database Loket gagal: " . $conn1->connect_error);
}

// Buat koneksix
$connx = new mysqli($servernamex, $usernamex, $passwordx, $dbnamex);

// Periksa koneksi
if ($connx->connect_error) {
    die("Koneksi ke database DMA gagal: " . $connx->connect_error);
}

// Buat koneksik
$connk = new mysqli($servernamex, $usernamex, $passwordx, $dbnamek);

// Periksa koneksi
if ($connk->connect_error) {
    die("Koneksi ke database Kinerja gagal: " . $connk->connect_error);
}

// Buat koneksik
$conna = new mysqli($servername, $username, $password, $dbname2);

// Periksa koneksi
if ($conna->connect_error) {
    die("Koneksi ke database Akuntansi gagal: " . $conna->connect_error);
}

// Buat koneksik
$conni = new mysqli($servernamex, $usernamex, $passwordx, $dbnamei);

// Periksa koneksi
if ($conni->connect_error) {
    die("Koneksi ke database IoT gagal: " . $conni->connect_error);
}
// Buat koneksi2
$conn2 = new mysqli($servername, $username, $password, $dbname3);

// Periksa koneksi
if ($conn2->connect_error) {
    die("Koneksi ke database BSBS gagal: " . $conn2->connect_error);
}
