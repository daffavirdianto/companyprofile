<?php
include "koneksi.php";
$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM tipe_kendaraan WHERE `tipe_kendaraan`.`id_kendaraan` = '$id'");

if ($hapus) {
    echo "<script> alert ('Data Berhasil Di Hapus')</script>";
    header ("datakendaraan.php");
    echo "<meta http-equiv=refresh content=2;URL='datakendaraan.php'>";

} else{
    echo "<script> alert ('Data Gagal Di Hapus')</script>";
}
?>