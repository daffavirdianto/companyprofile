<?php
include "koneksi.php";
$msg = '';
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
<header class="header">
    <section class="flex">
        <a href="index.php" class="logo"><i class="fas fa-key"></i>
        RENTAL KENDARAAN</a>
        
        <div id="menu-btn" class="fas fa-bars"></div>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="allrental.php" class="active">All Rental</a>
            <a href="rekomendasi.php">Rekomendasi</a>
        </nav>

    </section>
</header>

<section class="allrental">
    <div class="container-bc">
        <h1>Halaman Daftar Rental</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">All Rental</li>
        </ol>
    </div>

  <div class="filter">
    <div class="card-search">
        <div class="search">
            <form class="search-box">
              <button type="submit"><i class="bi bi-search"></i></button>
              <input onkeyup="search()" type="text" id="value" placeholder="Cari Rental Kendaraan">  
            </form>
        </div>

        <div class="filter-search">
          <h3>Filter</h3>
          <form method="post">
          <ul class="dropdown">
                <li style="border-top-right-radius: 5px;border-top-left-radius: 5px;"> 
                    <div class="dropdown-menu"  style="border-top-right-radius: 5px;border-top-left-radius: 5px;">
                        <span class="title">Tipe Kendaraan</span>
                        <i class="bi bi-chevron-up arrow"></i>
                    </div>
                    <div class="menu">
                        <label>
                            <input type="radio" name="tipe" value="Motor">
                            <span>Motor</span>
                        </label>
                        <label>
                            <input type="radio" name="tipe" value="Mobil">
                            <span>Mobil</span>
                        </label>
                        <label style="display:none;">
                            <input type="radio" name="tipe" value="Other" checked="true">
                            <span>Other</span>
                        </label>
                    </div>
                </li>

                <li>
                    <div class="dropdown-menu">
                        <span class="title">Harga</span>
                        <i class="bi bi-chevron-up arrow"></i>
                    </div>
                    <div class="menu">
                        <label>
                            <input type="text" name="harga_max" placeholder="Masukan Harga Maximum">
                        </label>
                    </div>
                </li>
                
                <li>
                    <div class="dropdown-menu">
                        <span class="title">Jarak Dari Bandara</span>
                        <i class="bi bi-chevron-up arrow"></i>
                    </div>
                    <div class="menu">
                        <label>
                            <input type="text" name="jarak_max" placeholder="Masukan Jarak Maximum"><p>Km</p>
                        </label>
                    </div>
                </li>

                <li style="border-bottom: var(--border);border-bottom-right-radius: 5px;border-bottom-left-radius: 5px;">
                    <div class="dropdown-menu">
                        <span class="title">Rating Start</span>
                        <i class="bi bi-chevron-up arrow"></i>
                    </div>
                    <div class="menu">
                        <label>
                            <input type="number" min="0" step="0.1" max="5" value="0" name="rating_min">
                        </label>
                        <label>
                            <input type="number" min="0" step="0.1" max="5" value="5" name="rating_max">
                        </label>
                        <button name="submit">FILTER</button>
                    </div>
                </li>
            </ul>
            </form>
        </div>
    </div>
     
    <div class="box-allrental">
        <?php
        if(!isset($_POST['submit'])){
            $query = "SELECT * FROM rental";
            $data = mysqli_query($koneksi, $query) or die ('error');

            if(mysqli_num_rows($data) > 0){
                while ($row=mysqli_fetch_assoc($data)){
                    $logo=$row['logo'];
                    $nama=$row['nama_rental'];
                    $alamat=$row['alamat'];
                    $rating=$row['rating'];
                    $harga=$row['harga'];
                    $jarak=$row['jarak'];
                    $tipe=$row['tipe'];
                    $location=$row['location'];
                    $no_wa=$row['no_wa'];
                    $id=$row['id_rental'];
                ?>
                <div class="box">
                    <div class="rating">
                        <span class="rate"><i class="fas fa-star"></i><?php echo $rating?></span>
                    </div>
                    <div class="logo">
                        <img src="img/<?php echo $logo?>" alt="">
                    </div>
                    <h3 class="name"><?php echo $nama?></h3>
                    <div class="kendaraan-jarak">
                        <span class="jarak"><i class="bi bi-geo-alt-fill"></i><?php echo $jarak?></span>
                        <span class="tipe"> <i class="bi bi-vinyl-fill"></i><?php echo $tipe?></span>
                    </div>
                    <div class="harga-box">
                        <span>Start From</span>
                        <div class="harga">
                            <h2 class="pay" style="text-align:center;">Rp.<?php echo $harga?></h2>
                            <span>/Day</span>
                        </div>
                    </div>
                    
                    <ul class="dropdown">
                        <li>
                        <div class="dropdown-menu">
                            <span class="title">Fasilitas</span>
                            <i class="bi bi-chevron-down arrow"></i>
                        </div>
                        <p>
                            <?php
                                $sql_fasilitas = mysqli_query($koneksi, "SELECT * FROM fasilitas_rekap JOIN fasilitas ON fasilitas_rekap.id_fasilitas = fasilitas.id_fasilitas WHERE id_rental = '$id'") or die (mysqli_error());
                                while ($data_fasilitas = mysqli_fetch_array($sql_fasilitas)){
                                    echo $data_fasilitas['nama_fasilitas']."<br>";
                                }
                            ?>
                        </p>
                        </li>
                        <li>
                        <div class="dropdown-menu">
                            <span class="title">Tipe Mobil</span>
                            <i class="bi bi-chevron-down arrow"></i>
                        </div>
                        <p><?php
                            $sql_kendaraan = mysqli_query($koneksi, "SELECT * FROM tipe_kendaraan_rekap JOIN tipe_kendaraan ON tipe_kendaraan_rekap.id_kendaraan = tipe_kendaraan.id_kendaraan WHERE id_rental = '$id'") or die (mysqli_error());
                            while ($data_kendaraan = mysqli_fetch_array($sql_kendaraan)){
                                echo $data_kendaraan['nama_kendaraan']."<br>";
                            }
                            ?>
                        </p>
                        </li>
                    </ul>
                    <div class="kontak">
                        <a class="nomer" href="https://wa.me/+62<?php echo $no_wa ?>"><i class="bi bi-telephone-fill"></i>Call</a>
                        <a class="lokasi" href="<?php echo $location ?>"><i class="bi bi-geo-alt-fill"></i>Visit</a>
                    </div>
                </div>
                <?php } ?>
                <?php 
                } else {
                    echo '<p class="save"><i class="bi bi-exclamation-triangle"></i>Pilih Salah Satu Filter</p>';
                } ?>

<?php } else { 
        $tipe=$_POST['tipe'];
        $harga_max=$_POST['harga_max'];
        $jarak_max=$_POST['jarak_max'];
        $rating_min=$_POST['rating_min'];
        $rating_max=$_POST['rating_max'];

        if($tipe != "" && $harga_max != "" && $jarak_max != "" && $rating_min != ""){
            $query = "SELECT * FROM rental WHERE tipe = '$tipe' AND harga BETWEEN '50000' AND '$harga_max' AND 
            jarak BETWEEN '0 Km' AND '$jarak_max' AND rating BETWEEN '$rating_min' AND '$rating_max'";
            $data = mysqli_query($koneksi, $query) or die ('error');

            if(mysqli_num_rows($data) > 0){
                while ($row=mysqli_fetch_assoc($data)){
                    $logo=$row['logo'];
                    $nama=$row['nama_rental'];
                    $alamat=$row['alamat'];
                    $rating=$row['rating'];
                    $harga=$row['harga'];
                    $jarak=$row['jarak'];
                    $tipe=$row['tipe'];
                    $location=$row['location'];
                    $no_wa=$row['no_wa'];
                    $id=$row['id_rental'];
                ?>
                <div class="box">
                    <div class="rating">
                        <span class="rate"><i class="fas fa-star"></i><?php echo $rating?></span>
                    </div>
                    <div class="logo">
                        <img src="img/<?php echo $logo?>" alt="">
                    </div>
                    <h3 class="name"><?php echo $nama?></h3>
                    <div class="kendaraan-jarak">
                        <span class="jarak"><i class="bi bi-geo-alt-fill"></i><?php echo $jarak?></span>
                        <span class="tipe"> <i class="bi bi-vinyl-fill"></i><?php echo $tipe?></span>
                    </div>
                    <div class="harga-box">
                        <span>Start From</span>
                        <div class="harga">
                            <h2 class="pay" style="text-align:center;">Rp.<?php echo $harga?></h2>
                            <span>/Day</span>
                        </div>
                    </div>
                    
                    <ul class="dropdown">
                        <li>
                        <div class="dropdown-menu">
                            <span class="title">Fasilitas</span>
                            <i class="bi bi-chevron-down arrow"></i>
                        </div>
                        <p>
                        <?php
                            $sql_fasilitas = mysqli_query($koneksi, "SELECT * FROM fasilitas_rekap JOIN fasilitas ON fasilitas_rekap.id_fasilitas = fasilitas.id_fasilitas WHERE id_rental = '$id'") or die (mysqli_error());
                            while ($data_fasilitas = mysqli_fetch_array($sql_fasilitas)){
                                echo $data_fasilitas['nama_fasilitas']."<br>";
                            }
                        ?>
                        </p>
                        </li>
                        <li>
                        <div class="dropdown-menu">
                            <span class="title">Tipe Mobil</span>
                            <i class="bi bi-chevron-down arrow"></i>
                        </div>
                        <p><?php
                            $sql_kendaraan = mysqli_query($koneksi, "SELECT * FROM tipe_kendaraan_rekap JOIN tipe_kendaraan ON tipe_kendaraan_rekap.id_kendaraan = tipe_kendaraan.id_kendaraan WHERE id_rental = '$id'") or die (mysqli_error());
                            while ($data_kendaraan = mysqli_fetch_array($sql_kendaraan)){
                                echo $data_kendaraan['nama_kendaraan']."<br>";
                            }
                            ?>
                        </p>
                        </li>
                    </ul>
                    <div class="kontak">
                        <a class="nomer" href="https://wa.me/+62<?php echo $no_wa ?>"><i class="bi bi-telephone-fill"></i>Call</a>
                        <a class="lokasi" href="<?php echo $location ?>"><i class="bi bi-geo-alt-fill"></i>Visit</a>
                    </div>
                </div>
                <?php } ?>
            <?php } else {
                    echo '<p class="save"><i class="bi bi-exclamation-triangle"></i>Tidak Ada Data Yang Anda Cari</p>';
            } ?> 
        <?php } else {
            echo '<p class="save"><i class="bi bi-exclamation-triangle"></i>Masukan Semua Filter</p>';
        }?>
        <?php } ?>
    </div>
  </div>
    
</section>
<!-- Footer section -->
<Footer class="footer">
    <div class="credit">&copy; copyright @ 2023 by <span> Daffa Virdianto</span> | all rights reserved!
    </div>
</Footer>
<!-- Main JS File -->
<script src="js/script.js"></script>

<!-- Searching AllRental -->
<script type="text/javascript">
  function search() {
    var value,name,profile,i;
    value = document.getElementById("value").value.toUpperCase();
    profile = document.getElementsByClassName("box");
    for(i=0;i<profile.length;i++){
      name = profile[i].getElementsByClassName("name");
      if (name[0].innerHTML.toUpperCase().indexOf(value) > -1) {
        profile[i].style.display = "grid";
      }else{
        profile[i].style.display = "none";
      }
    }
  }
</script>

</body>
</html>