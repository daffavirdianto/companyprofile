<?php
include "koneksi.php";

$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM rental WHERE `rental`.`id_rental` = '$id'");

if ($hapus) {
    echo "<script> alert ('Data Berhasil Di Hapus')</script>";
    header ("datarental.php");
    echo "<meta http-equiv=refresh content=2;URL='datarental.php'>";

} else{
    echo "<script> alert ('Data Gagal Di Hapus')</script>";
}

?>