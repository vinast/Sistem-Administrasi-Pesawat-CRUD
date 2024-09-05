<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "responsiwd";


$con = new mysqli($servername, $username, $password, $dbname);

// Cek Koneksi
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
