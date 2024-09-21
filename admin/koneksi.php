<?php
$servername = "localhost";
$username = "n1576520_daffa";
$password = "WBlob9I+H=UE";
$database = "n1576520_rentalkendaraan";

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {
    echo "Connection failed!";
}