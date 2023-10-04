<?php
// Konfigurasi koneksi ke database
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'livenews');

// Membuat koneksi ke database
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Memeriksa koneksi
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>
