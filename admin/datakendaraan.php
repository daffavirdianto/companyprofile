<?php
session_start();
include "koneksi.php";

$msg = '';

if (isset($_POST['simpan'])) {
    $nama_kendaraan=mysqli_real_escape_string($koneksi, $_POST['nama_kendaraan']);
    $jenis=mysqli_real_escape_string($koneksi, $_POST['jenis']);


    $simpan=mysqli_query($koneksi,"INSERT INTO tipe_kendaraan VALUES('','$nama_kendaraan','$jenis')");

    if ($simpan){
        echo "<script>window.alert{'Data Rental berhasil disimpan'}
        window.location='datakendaraan.php'</script>";
    }else{
        echo "<script>window.alert{'Data Rental gagal disimpan'}
        window.location='datakendaraan.php'</script>";
    }

        // Output message
        $msg = '<p class="save"><i class="bi bi-check-circle-fill"></i>Data Berhasil Ditambah</p>';

        echo "<meta http-equiv=refresh content=2;URL='datakendaraan.php'>";
    }
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
                    <a href="datarental.php"><span class="bi bi-house-add-fill"></span>
                    <span>Data Rental</span></a>
                </li>
                <li>
                    <a href="datafasilitas.php"><span class="bi bi-gift-fill"></span>
                    <span>Fasilitas</span></a>
                </li>
                <li>
                    <a href="datakendaraan.php" class="active"><span class="bi bi-car-front-fill"></span>
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
            <div class="breadcrumb-con" style="border-left: 3px solid rgb(185, 41, 41);">
                <h2>Data Kendaraan</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashbor.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Kendaraan</li>
                </ol>
            </div>

            <div class="box-kriteria">
                <form method="post">
                    <h2 style="text-align: center;">DATA Kendaraan</h2>

                    <div class="data-rent">
                        <div class="input-data">
                            <span class="details">Nama Kendaraan</span>
                            <input type="text" placeholder="Masukan Nama Kendaraan" name="nama_kendaraan" required>
                        </div>

                        <div class="input-data" style="display:none;">
                            <input type="text" name="jenis" value="<?php echo $_POST['tipe'] ?>">
                        </div>

                        <div class="input-data">
                            <span class="details">Tipe Kendaraan</span>
                            <select name="tipe" id="tipe" onchange="this.form.submit()">
                                <option disabled selected> Pilih </option>
                                <?php
                                $qry = "SELECT DISTINCT tipe from rental";
                                $dta = mysqli_query($koneksi, $qry);
                                while($data = mysqli_fetch_assoc($dta)){?>
                                <option value="<?= $data['tipe'];?>"
                                <?php
                                if($_POST['tipe'] == $data['tipe']){
                                    echo "selected";
                                }?>
                                ><?= $data['tipe']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    

                    <input type="submit" class="simpan" name="simpan" value="Tambah Kendaraan">
                </form>

                <div class="table-rekomendasi">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kendaraan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                $no=1;
                                
                                $qry = "SELECT * FROM tipe_kendaraan where tipe='$_POST[tipe]'";
                                $data = mysqli_query($koneksi, $qry);
                                
                                while ($tampil = mysqli_fetch_array($data)){?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td style="text-align: left;"><?=$tampil['nama_kendaraan']?></td>
                                        <td class="actions">
                                            <a href="hapuskendaraan.php?id=<?=$tampil['id_kendaraan']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
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