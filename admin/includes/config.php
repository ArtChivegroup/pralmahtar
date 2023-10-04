<?php
// Konfigurasi koneksi ke database
define('DB_SERVER', 'bmlm994tro4cnssmrhn2-mysql.services.clever-cloud.com');
define('DB_USER', 'utixrq1ubonaa7jc');
define('DB_PASS', 'UHF8B1Z3Sk9suN2YhzlP');
define('DB_NAME', 'bmlm994tro4cnssmrhn2');

// Membuat koneksi ke database
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Memeriksa koneksi
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>
