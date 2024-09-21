<?php
session_start();
include "koneksi.php";

$get1 = mysqli_query($koneksi, "select * from rental where tipe='Mobil'");
$count1 = mysqli_num_rows($get1);

$get2 = mysqli_query($koneksi, "select * from rental where tipe='Motor'");
$count2 = mysqli_num_rows($get2);

$get3 = mysqli_query($koneksi, "select * from user");
$count3 = mysqli_num_rows($get3);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>

    <!-- Favicons -->
    <link href="img/icon.png" rel="icon">
    <link href="img/img/icon.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="img/LogoITDA.png" width="25%" alt="">
            <h2>RENTAL KENDARAAN</h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="dashbor.php" class="active"><span class="bi bi-speedometer2"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="datarental.php" ><span class="bi bi-house-add-fill"></span>
                    <span>Data Rental</span></a>
                </li>
                <li>
                    <a href="datafasilitas.php"><span class="bi bi-gift-fill"></span>
                    <span>Fasilitas</span></a>
                </li>
                <li>
                    <a href="datakendaraan.php"><span class="bi bi-car-front-fill"></span>
                    <span>Data Kendaraan</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <label for="nav-toggle">
                <span class="bi bi-sliders2"></span>
            </label>

            <div class="search-wrapper">
                <span class="bi bi-search"></span>
                <input type="search" placeholder="Search here">
            </div>

            <div class="user-wrapper">
                <div>
                    <a href=""><span class="bi bi-person-fill"></span>
                    <span>
                        <?php if (!isset($_SESSION['nama_admin'])) {
                            header("Location: login.php");
                            exit();
                        }else{
                            echo $_SESSION['nama_admin'];
                        }?>
                    </span></a>
                </div>
                <div>
                    <a href="logout.php"><span class="bi bi-door-open-fill"></span>
                    <span>Log Out</span></a>
                </div>
            </div>
        </header>

        <main>
            <div class="box-container">
                <div class="box">
                    <h2>RENTAL KENDARAAN</h2>
                    <p>Sistem Pengelolaan Rental Kendaraan</p>
                </div>

                <div class="card">
                    <div class="kendaraan" style="border-left: 3px solid rgb(41, 185, 48);">
                        <a href="tabelmobil.php"><h5 style="color: rgb(41, 185, 48);">Jumlah Data Mobil</h5></a>
                        <div class="data">    
                            <h2><?=$count1;?></h2>
                            <i class="bi bi-car-front-fill"></i>
                        </div>
                    </div>
                    <div class="kendaraan" style="border-left: 3px solid rgb(41, 127, 185);">
                        <a href="tabelmotor.php"><h5 style="color: rgb(41, 127, 185);">Jumlah Data Motor</h5></a>
                        <div class="data">    
                            <h2><?=$count2;?></h2>
                            <i class="bi bi-speedometer"></i>
                        </div>
                    </div>
                    <div class="kendaraan" style="border-left: 3px solid rgb(185, 41, 41);">
                        <a href="tabeluser.php"><h5 style="color: rgb(185, 41, 41);">Jumlah Penilaian User</h5></a>
                        <div class="data">
                            <h2><?=$count3;?></h2>
                            <i class="bi bi-clipboard2-plus-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>