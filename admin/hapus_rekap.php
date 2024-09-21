<?php
include "koneksi.php";

$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM tipe_kendaraan_rekap WHERE `tipe_kendaraan_rekap`.`id` = '$id'");

if ($hapus) {
    echo "<script> alert ('Data Berhasil Di Hapus')</script>";
    echo "<meta http-equiv=refresh content=2;URL='datarental.php'>";

} else{
    echo "<script> alert ('Data Gagal Di Hapus')</script>";
}

?>