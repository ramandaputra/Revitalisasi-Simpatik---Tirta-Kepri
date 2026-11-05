<?php

// Read DB settings from .env if present
$envFile = __DIR__ . '/../../.env';
$dbHost = '127.0.0.1';
$dbPort = 3306;
$dbUser = 'root';
$dbPass = '';
$dbKinerja = 'kepri_kinerja';
$dbIot = 'kepri_iot';

if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if (str_starts_with($line, '#')) continue;
        if (strpos($line, '=') !== false) {
            list($k, $v) = explode('=', $line, 2);
            $k = trim($k);
            $v = trim($v, " \t\n\r\0\x0B\"'");
            if ($k === 'DB_HOST') $dbHost = $v;
            if ($k === 'DB_PORT') $dbPort = (int)$v;
            if ($k === 'DB_USERNAME') $dbUser = $v;
            if ($k === 'DB_PASSWORD') $dbPass = $v;
            if ($k === 'DB_DATABASE') $dbKinerja = $v;
            if ($k === 'DB_IOT_DATABASE') $dbIot = $v;
        }
    }
}

// 1. Connection to kepri_kinerja ($connk)
$connk = @new mysqli($dbHost, $dbUser, $dbPass, $dbKinerja, $dbPort);
if ($connk->connect_errno) {
    // Fallback to legacy remote if local is not running
    $connk = @new mysqli("192.168.0.15", "root", "Pusimp3l#1717#", $dbKinerja, 3309);
}

// 2. Connection to kepri_iot ($conni)
$conni = @new mysqli($dbHost, $dbUser, $dbPass, $dbIot, $dbPort);
if ($conni->connect_errno) {
    // Fallback to legacy remote if local is not running
    $conni = @new mysqli("192.168.0.15", "root", "Pusimp3l#1717#", $dbIot, 3309);
}

// Aliases for compatibility
$conn = $connk;
$connx = $connk;
$conn1 = $connk;
$conn2 = $connk;
$conna = $connk;
