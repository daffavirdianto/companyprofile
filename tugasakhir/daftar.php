<?php
include "koneksi.php";
$msg = '';
?>
<?php
if (isset($_POST['simpan'])){
    $nama=mysqli_real_escape_string($koneksi, $_POST["nama_rental"]); 
    $tipe=mysqli_real_escape_string($koneksi, $_POST["tipe"]);
    $fasilitas=mysqli_real_escape_string($koneksi, $_POST["fasilitas"]); 
    $kendaraan=mysqli_real_escape_string($koneksi, $_POST["kendaraan"]);
    $harga=mysqli_real_escape_string($koneksi, $_POST["harga"]);
    $location=mysqli_real_escape_string($koneksi, $_POST["location"]);
    $wa=mysqli_real_escape_string($koneksi, $_POST["wa"]);



    $simpan=mysqli_query($koneksi,"INSERT INTO daftar_rental VALUES('','$nama','$tipe','$fasilitas','$kendaraan', '$harga',
    '$location', '$wa')");

    if ($simpan){
        $msg = '<p class="save"><i class="bi bi-check-circle-fill"></i>Daftar Berhasil, Tunggu Verifikasi</p>';

    }else{
        $msg = '<p class="save"><i class="bi bi-check-circle-fill"></i>Daftar Tidak Berhasil</p>';
    }

    echo "<meta http-equiv=refresh content=2;URL='index.php'>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width", initial-scale="0.1">
  
  <title>ALL RENTAL</title>

  <!-- Favicons -->
  <link href="img/icon.png" rel="icon">
  <link href="img/img/icon.png" rel="apple-touch-icon">

<!-- Main CSS File -->
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<section class="new">
    <div class="container-bc">
        <h1>Halaman Daftar Rental</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Daftar</li>
        </ol>
    </div>

    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?> 

    <div class="daftar-rental">
        <form method="post">
                <div class="input">
                    <span class="details">Nama Rental</span>
                    <input type="text" placeholder="Masukan Nama Rental" name="nama_rental" required>
                </div>

                <div class="input">
                    <span class="details">Tipe Rental ? (Motor / Mobil)</span>
                    <input type="text" placeholder="Masukan Tipe Rental (Motor / Mobil)" name="tipe" required>
                </div>

                <div class="input">
                    <span class="details">Fasilitas</span>
                    <input type="text" placeholder="Masukan Fasilitas (Bersih, Wangi, Include Driver + BBM, Lepas Kunci, Unit Baru, Snack Dan Minuman)" name="fasilitas" required>
                </div>

                <div class="input">
                    <span class="details">Kendaraan</span>
                    <input type="text" placeholder="Masukan Kendaraan Tersedia (Pisahkan Dengan Koma ( , ))" name="kendaraan" required>
                </div>
                
                <div class="input">
                    <span class="details">Harga Kendaraan Termurah</span>
                    <input type="text" placeholder="Masukan Harga Termurah" name="harga" required>
                </div>
                
                <div class="input">
                    <span class="details">Location</span>
                    <input type="text" placeholder="Masukan Location Rental" name="location" required>
                </div>
                
                <div class="input">
                    <span class="details">Nomer Whatsapp</span>
                    <input type="text" placeholder="Masukan Nomor Whatsapp" name="wa" required>
                </div>

                <input type="submit" name="simpan" value="KIRIM" class="submit">
        </form>
    </div>
    
</section>

<!-- Footer section -->
<Footer class="footer">
    <div class="credit">&copy; copyright @ 2023 by <span> Daffa Virdianto</span> | all rights reserved!
    </div>
</Footer>

</body>
</html>