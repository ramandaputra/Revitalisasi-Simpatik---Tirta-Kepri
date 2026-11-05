<?php

$server = "192.168.0.15:3309";
$user = "root";
$password = "Pusimp3l#1717#";
$database = "kepri_iot";
$database_k = "kepri_kinerja";

$conn = mysqli_connect($server, $user, $password, $database);
$connk = mysqli_connect($server, $user, $password, $database_k);
