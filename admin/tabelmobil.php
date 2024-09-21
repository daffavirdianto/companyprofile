<?php
session_start();
include "koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>

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
            <div class="breadcrumb-con">
                <h2>All Rental</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashbor.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Mobil</li>
                </ol>
            </div>
            <div class="box-container">
                <div class="judul-table">
                   <h4>Tabel Rental Mobil</h4> 
                </div>
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th style="width: 150px;">Logo</th>
                                <th style="width: 150px;">Nama Rental</th>
                                <th style="width: 300px;">Alamat</th>
                                <th style="width: 120px;">No Wa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $ambildata = mysqli_query($koneksi, "select * from rental where tipe='Mobil'");
                            while ($tampil = mysqli_fetch_array($ambildata)){?>
                                <tr>
                                    <td><?=$no?></td>
                                    <td><img src='img/<?=$tampil['logo']?>'></td>
                                    <td><?=$tampil['nama_rental']?></td>
                                    <td><?=$tampil['alamat']?></td>
                                    <td><?=$tampil['no_wa']?></td>
                                </tr>
                            <?php
                                $no++;
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>

</html>