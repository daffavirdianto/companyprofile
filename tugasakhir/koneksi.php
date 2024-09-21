<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "rentalkendaraan";

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {
    echo "Connection failed!";
}