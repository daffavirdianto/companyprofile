<?php
include "koneksi.php";

$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM fasilitas WHERE `fasilitas`.`id_fasilitas` = '$id'");

if ($hapus) {
    echo "<script> alert ('Data Berhasil Di Hapus')</script>";
    header ("fasilitas.php");
    echo "<meta http-equiv=refresh content=2;URL='datafasilitas.php'>";

} else{
    echo "<script> alert ('Data Gagal Di Hapus')</script>";
}

?>