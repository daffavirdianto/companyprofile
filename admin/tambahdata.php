<?php
function generate_uuid() {
    return sprintf( '%04x-%04x-%04x',
    mt_rand( 0, 0xffff ),
    mt_rand( 0, 0x0fff ) | 0x4000,
    mt_rand( 0, 0x3fff ) | 0x8000
    );
}

$UUID = generate_uuid();
?>
<?php
session_start();
include "koneksi.php";
$query = mysqli_query($koneksi,"SELECT*FROM admin");
$msg = '';

if (isset($_POST["simpan"])) {
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["logo"]["tmp_name"]);

    // Validate file input to check if is not empty
    if (! file_exists($_FILES["logo"]["tmp_name"])) {
        $response = array(
            "type" => "error",
            "message" => "Choose image file to upload."
        );
    }  
    // Validate image file size
    else if (($_FILES["logo"]["size"] > 1000000)) {
        $msg = '<p class="error"><i class="bi bi-exclamation-triangle"></i>Ukuran Gambar Terlalu Besar</p>';
    } 
    else {
        $target = "img/" . basename($_FILES["logo"]["name"]);
        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target)) {
            $response = array(
                "type" => "success",
                "message" => "Image uploaded successfully."
            );

            $logo=$_FILES["logo"]["name"];
            $nama_rental=$_POST["nama_rental"];
            $alamat=$_POST["alamat"];
            $rating=$_POST["rating"];
            $harga=$_POST["harga"];
            $jarak=$_POST["jarak"];
            $jenis=$_POST["jenis"];
            $location=$_POST["location"];
            $no_wa=$_POST["no_wa"];

            $sql="INSERT INTO rental (id_rental,logo,nama_rental,alamat,rating,harga,jarak,tipe,location,no_wa) 
            values ('$UUID','$logo','$nama_rental','$alamat','$rating','$harga','$jarak','$jenis','$location','$no_wa')";

            $hasil=mysqli_query($koneksi,$sql);

            $fasilitas = $_POST['fasilitas'];
            foreach ($fasilitas as $fa) {
                mysqli_query($koneksi, "INSERT INTO fasilitas_rekap (id_rental, id_fasilitas) VALUES ('$UUID','$fa')") or die
                (mysqli_error($koneksi));
            }

            $kendaraan = $_POST['kendaraan'];
            foreach ($kendaraan as $tk) {
                mysqli_query($koneksi, "INSERT INTO tipe_kendaraan_rekap (id_rental, id_kendaraan) VALUES ('$UUID','$tk')") or die
                (mysqli_error($koneksi));
            }

            if($hasil){
                $msg = '<p class="save"><i class="bi bi-check-circle-fill"></i>Data Berhasil Ditambah</p>';
            }else{
                $msg = '<p class="error"><i class="bi bi-exclamation-triangle"></i>Data Gagal Ditambah</p>';
            }
            
            echo "<meta http-equiv=refresh content=2;URL='datarental.php'>";
        } else {
            $msg = '<p class="error"><i class="bi bi-exclamation-triangle"></i>Upload Error</p>';
        }
    }
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
                <h2>Data Rental Baru</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashbor.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="datarental.php">Data Rental</a></li>
                    <li class="breadcrumb-item active">Tambah Data Baru</li>
                </ol>
            </div>
            
            <p class="alert"><i class="bi bi-exclamation-circle-fill"></i>Masukan Tipe Kendaraan Terlebih Dahulu</p>

            <div class="box-container">
                <form method="post" enctype="multipart/form-data">
                    
                    <h2 style="text-align: center;">Data Rental Baru</h2>
                    
                    <?php if ($msg): ?>
                    <p><?=$msg?></p>
                    <?php endif; ?> 

                    <div class="data-rent">
                        <div class="input-data">
                            <span class="details">Logo Rental</span>
                            <input type="file" style="border: none; padding-left: 0;" name="logo" accept=".png, .jpg, .jpeg">
                        </div>
    
                        <div class="input-data" style="visibility:hidden;">
                            <input type="text" name="jenis" value="<?php echo $_POST['tipe'] ?>">
                        </div>
    
                        <div class="input-data">
                            <span class="details">Nama Rental</span>
                            <input type="text" placeholder="Masukan Nama Rental" name="nama_rental" required>
                        </div>
    
                        <div class="input-data">
                            <span class="details">Alamat Rental</span>
                            <input type="text" placeholder="Masukan alamat" name="alamat" required>
                        </div>
    
                        <div class="input-data">
                            <span class="details">Rating</span>
                            <input type="number" min="0" step="0.1" max="5" value="0" name="rating"/>
                        </div>
    
                        <div class="input-data">
                            <span class="details">Harga</span>
                            <input type="text" placeholder="Masukan Harga" name="harga" required>
                        </div>
    
                        <div class="input-data">
                            <span class="details">Jarak</span>
                            <input type="text" placeholder="Masukan jarak" name="jarak" required>
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
    
                        <div class="input-data">
                            <span class="details">Location</span>
                            <input type="text" placeholder="Masukan Location" name="location" required>
                        </div>
    
                        <div class="input-data">
                            <span class="details">Nomer WA</span>
                            <input type="text" placeholder="Masukan No Wa" name="no_wa" required>
                        </div>
    
                        <div class="combo-data">
                            <label for="fasilitas">Fasilitas</label>
                            <select multiple name="fasilitas[]" id="fasilitas" required>
                                <?php $sql_fasilitas = mysqli_query($koneksi, "select * from fasilitas") or die (
                                    mysqli_error($conn));
                                while($data_fasilitas = mysqli_fetch_array($sql_fasilitas)){?>
                                    <option value="<?= $data_fasilitas['id_fasilitas'];?>"><?= $data_fasilitas['nama_fasilitas']?></option>
                            <?php } ?>
    
                            </select>
                        </div>
    
                        <div class="combo-data">
                            <label for="kendaraan">Kendaraan</label>
                            <select multiple name="kendaraan[]" id="kendaraan" required>
                                <?php $sql_kendaraan = mysqli_query($koneksi, "select * from tipe_kendaraan where tipe='$_POST[tipe]'") or die (
                                    mysqli_error($conn));
                                while($data_kendaraan = mysqli_fetch_array($sql_kendaraan)){?>
                                    <option value="<?= $data_kendaraan['id_kendaraan'];?>"><?= $data_kendaraan['nama_kendaraan']?></option>
                            <?php } ?>
    
                            </select>
                        </div>
                    </div>
                    <input type="submit" class="simpan" name="simpan" value="Simpan Data">
                
                </form>
                  
            </div>
        </main>
    </div>
    <script src="js/script.js"></script>
</body>

</html>