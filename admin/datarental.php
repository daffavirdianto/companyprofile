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
                    <a href="dashbor.php"><span class="bi bi-speedometer2"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="datarental.php" class="active"><span class="bi bi-house-add-fill"></span>
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
            <div class="breadcrumb-con" style="border-left: 3px solid rgb(41, 127, 185);">
                <h2>Data Rental</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashbor.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Rental</li>
                </ol>
            </div>
            <div class="box-container">
                <a href="tambahdata.php" class="create-contact">Tambah Data</a>
                
                <div class="judul-table">
                   <h4>Tabel Data Rental</h4> 
                </div>
                <div class="table-container" style="min-width: 982px; overflow-x: auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Logo</th>
                                <th style="min-width: 150px;">Nama Rental</th>
                                <th>Tipe</th>
                                <th style="min-width: 250px;">Alamat</th>
                                <th>Whatsapp</th>
                                <th>Harga</th>
                                <th style="min-width: 80px;">Jarak</th>
                                <th style="min-width: 100px;">Tipe Kendaraan</th>
                                <th>Rating</th>
                                <th style="min-width: 120px;">Fasilitas</th>
                                <th style="min-width: 150px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $ambildata = mysqli_query($koneksi, "select * from rental");
                            while ($tampil = mysqli_fetch_array($ambildata)){?>
                                <tr>
                                    <td><?=$no?></td>
                                    <td><img src='img/<?=$tampil['logo']?>'></td>
                                    <td style="text-align:left;"><?=$tampil['nama_rental']?></td>
                                    <td><?=$tampil['tipe']?></td>
                                    <td><?=$tampil['alamat']?></td>
                                    <td><?=$tampil['no_wa']?></td>
                                    <td><?=$tampil['harga']?></td>
                                    <td><?=$tampil['jarak']?></td>
                                    <td style="text-align:left;">
                                        <?php
                                        $sql_kendaraan = mysqli_query($koneksi, "SELECT * FROM tipe_kendaraan_rekap JOIN tipe_kendaraan ON tipe_kendaraan_rekap.id_kendaraan = tipe_kendaraan.id_kendaraan WHERE id_rental = '$tampil[id_rental]'") or die (mysqli_error());
                                        while ($data_kendaraan = mysqli_fetch_array($sql_kendaraan)){
                                            echo $data_kendaraan['nama_kendaraan']."<br>";
                                        }
                                        ?>
                                    </td>
                                    <td><?=$tampil['rating']?></td>
                                    <td style="text-align:left;">
                                        <?php
                                        $sql_fasilitas = mysqli_query($koneksi, "SELECT * FROM fasilitas_rekap JOIN fasilitas ON fasilitas_rekap.id_fasilitas = fasilitas.id_fasilitas WHERE id_rental = '$tampil[id_rental]'") or die (mysqli_error());
                                        while ($data_fasilitas = mysqli_fetch_array($sql_fasilitas)){
                                            echo $data_fasilitas['nama_fasilitas']."<br>";
                                        }
                                        ?>
                                    </td>
                                    <td class="actions">
                                        <a href="update.php?id=<?=$tampil['id_rental']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                                        <a href="hapus.php?id=<?=$tampil['id_rental']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                                    </td>
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