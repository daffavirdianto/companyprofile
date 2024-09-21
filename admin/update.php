<?php
session_start();
include "koneksi.php";
$msg = '';
?>
<?php
$sql=mysqli_query($koneksi, "select * from rental where id_rental='$_GET[id]'");
$update=mysqli_fetch_array($sql);
?>

<?php
if(isset($_POST['simpan'])){
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["logo"]["tmp_name"]);

    // Validate file input to check if is not empty
    if (($_FILES["logo"]["size"] > 1000000)) {
        $msg = '<p class="error"><i class="bi bi-exclamation-triangle"></i>Ukuran Gambar Terlalu Besar</p>';
    } 
    else {
        $target = "img/" . basename($_FILES["logo"]["name"]);
        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target)) {

            $logo=$_FILES["logo"]["name"];
            $nama_rental=$_POST["nama_rental"];
            $alamat=$_POST["alamat"];
            $rating=$_POST["rating"];
            $harga=$_POST["harga"];
            $jarak=$_POST["jarak"];
            $tipe=$_POST["tipe"];
            $location=$_POST["location"];
            $no_wa=$_POST["no_wa"];

            $edit= "UPDATE rental SET logo='$logo', nama_rental='$nama_rental',
            alamat='$alamat', rating='$rating',harga='$harga', jarak='$jarak', 
            tipe='$tipe', location='$location',no_wa='$no_wa' WHERE id_rental = '$_GET[id]'";
            $query=mysqli_query($koneksi,$edit);
            
            $UUID = "$_GET[id]";
            
            //script validasi data
            $fasilitas = $_POST['fasilitas'];
            foreach ($fasilitas as $fa) {
            $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM fasilitas_rekap WHERE id_rental='$UUID' AND id_fasilitas='$fa'"));
            if ($cek > 0){
                echo "<script>window.alert('Sudah ada data yang sama') window.location='datarental.php'</script>";
            } else {
                    mysqli_query($koneksi, "INSERT INTO fasilitas_rekap (id_rental, id_fasilitas) VALUES ('$UUID','$fa')") or die
                    (mysqli_error($koneksi));
                    
                    if($query){
                        $msg = '<p class="save"><i class="bi bi-check-circle-fill"></i>Data Berhasil Diupdate</p>';
                        echo "<meta http-equiv=refresh content=2;URL='datarental.php'>";
                    }else{
                        $msg = '<p class="error"><i class="bi bi-exclamation-triangle"></i>Data Gagal Diupdate</p>';
                    }
                }
            }

            $kendaraan = $_POST['kendaraan'];
            foreach ($kendaraan as $tk) {
            $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tipe_kendaraan_rekap WHERE id_rental='$UUID' AND id_kendaraan='$tk'"));
            if ($cek > 0){
                echo "<script>window.alert('Sudah ada data yang sama') window.location='datarental.php'</script>";
            } else {    
                    mysqli_query($koneksi, "INSERT INTO tipe_kendaraan_rekap (id_rental, id_kendaraan) VALUES ('$UUID','$tk')") or die
                    (mysqli_error($koneksi));
                    
                    if($query){
                        $msg = '<p class="save"><i class="bi bi-check-circle-fill"></i>Data Berhasil Diupdate</p>';
                        echo "<meta http-equiv=refresh content=2;URL='datarental.php'>";
                    }else{
                        $msg = '<p class="error"><i class="bi bi-exclamation-triangle"></i>Data Gagal Diupdate</p>';
                    }
                }
            }
            
        } else {
            $msg = '<p class="error"><i class="bi bi-exclamation-triangle"></i>Upload Error</p>';
        }
    }
}?>
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
                <h2>Edit Data</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashbor.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="datarental.php">Data Rental</a></li>
                    <li class="breadcrumb-item active">Edit Data</li>
                </ol>
            </div>

            <div class="box-container">
                <form method="post" enctype="multipart/form-data">
                    
                    <h2 style="text-align: center;">Edit Data Rental</h2>
                    
                    <?php if ($msg): ?>
                    <p><?=$msg?></p>
                    <?php endif; ?>
    
                    <div class="data-rent">
                        <div class="input-data">
                            <span class="details">Logo Rental</span>
                            <div class="flex" style="display: flex;">
                                <img src="img/<?php echo $update['logo']; ?>" alt="" style="width: 100px; height: 100px; margin-right:20px;">
                                <input type="file" style="border: none; padding-left: 0;" name="logo" accept=".png, .jpg, .jpeg" required>
                            </div>
                        </div>
    
                        <div class="input-data">
    
                        </div>
    
                        <div class="input-data">
                            <span class="details">Nama Rental</span>
                            <input type="text" placeholder="Masukan Nama Rental" name="nama_rental" value="<?php echo $update['nama_rental']; ?>">
                        </div>
    
                        <div class="input-data">
                            <span class="details">Alamat Rental</span>
                            <input type="text" placeholder="Masukan alamat" name="alamat" value="<?php echo $update['alamat']; ?>">
                        </div>
    
                        <div class="input-data">
                            <span class="details">Rating</span>
                            <input type="number" min="0" step="0.1" max="5" name="rating" value="<?php echo $update['rating']; ?>">
                        </div>
    
                        <div class="input-data">
                            <span class="details">Harga</span>
                            <input type="text" placeholder="Masukan Harga" name="harga" value="<?php echo $update['harga']; ?>">
                        </div>
    
                        <div class="input-data">
                            <span class="details">Jarak</span>
                            <input type="text" placeholder="Masukan jarak" name="jarak" value="<?php echo $update['jarak']; ?>">
                        </div>
    
                        <div class="input-data">
                            <span class="details">Tipe Kendaraan</span>
                            <input type="text" name="tipe" value="<?php echo $update['tipe']; ?>">
                        </div>
    
                        <div class="input-data">
                            <span class="details">Location</span>
                            <input type="text" placeholder="Masukan Location" name="location" value="<?php echo $update['location']; ?>">
                        </div>
    
                        <div class="input-data">
                            <span class="details">Nomer WA</span>
                            <input type="text" placeholder="Masukan No Wa" name="no_wa" value="<?php echo $update['no_wa']; ?>">
                        </div>
    
                        <div class="input-data">
                                <span class="details">Fasilitas Tersedia</span>
                                <table class="tables">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Fasilitas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        
                                        $qry = "SELECT * FROM fasilitas_rekap JOIN fasilitas ON fasilitas_rekap.id_fasilitas = fasilitas.id_fasilitas
                                        WHERE id_rental='$_GET[id]'";
                                        $data = mysqli_query($koneksi, $qry);
                                        
                                        while ($tampil = mysqli_fetch_array($data)){?>
                                            <tr>
                                                <td><?=$no?></td>
                                                <td style="text-align: left;"><?=$tampil['nama_fasilitas']?></td>
                                                <td class="actions">
                                                    <a href="hapus_fasilitas_rekap.php?id=<?=$tampil['id']?>" class="hapus"><i class="fa-solid fa-xmark"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                                $no++;
                                            }?>
                                    </tbody>
                                </table>
                            </div>

                        <div class="combo-data">
                            <label for="fasilitas">Fasilitas</label>
                            <select multiple name="fasilitas[]" id="fasilitas" style="height:150px;">
                                <?php $sql_fasilitas = mysqli_query($koneksi, "select * from fasilitas") or die (mysqli_error($koneksi));

                                while($data_fasilitas = mysqli_fetch_array($sql_fasilitas)){?>
                                    <option value="<?= $data_fasilitas['id_fasilitas'];?>" ><?= $data_fasilitas['nama_fasilitas']?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="input-data">
                            <span class="details">Kendaraan Tersedia</span>
                            <table class="tables">
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
                                    
                                    $qry = "SELECT * FROM tipe_kendaraan_rekap JOIN tipe_kendaraan ON tipe_kendaraan_rekap.id_kendaraan = tipe_kendaraan.id_kendaraan
                                    WHERE id_rental='$_GET[id]'";
                                    $data = mysqli_query($koneksi, $qry);
                                    
                                    while ($tampil = mysqli_fetch_array($data)){?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td style="text-align: left;"><?=$tampil['nama_kendaraan']?></td>
                                            <td class="actions">
                                                <a href="hapus_rekap.php?id=<?=$tampil['id']?>" class="hapus"><i class="fa-solid fa-xmark"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                            $no++;
                                        }?>
                                </tbody>
                            </table>
                        </div>

                        <div class="combo-data">
                            <label for="kendaraan">Kendaraan</label>
                            <select multiple name="kendaraan[]" id="kendaraan" style="height:250px;">
                                <?php $sql_kendaraan = mysqli_query($koneksi, "select * from tipe_kendaraan where tipe='$update[tipe]'") or die (
                                    mysqli_error($koneksi));
                                    
                                while($data_kendaraan = mysqli_fetch_array($sql_kendaraan)){?>
                                    <option value="<?= $data_kendaraan['id_kendaraan'];?>"><?= $data_kendaraan['nama_kendaraan']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
        
                    <input type="submit" class="simpan" name="simpan" value="GANTI DATA">
        
                </form>
                
            </div>
        </main>
    </div>
    <script src="js/script.js"></script>
</body>

</html>