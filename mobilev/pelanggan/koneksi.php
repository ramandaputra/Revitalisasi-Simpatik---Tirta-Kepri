<?php
$db = new mysqli('192.168.0.14:3309', 'bimasakti', 'bimasaktisanjaya2017', 'kepri_loket4');
if ($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$db2 = new mysqli('192.168.0.14:3309', 'bimasakti', 'bimasaktisanjaya2017', 'kepri_bsbs4');
if ($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$bacameter = new mysqli('192.168.0.14:3309', 'bimasakti', 'bimasaktisanjaya2017', 'bacameter');
if ($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}
