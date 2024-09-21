<?php
include "koneksi.php";
$msg = '';

if (isset($_POST['simpan'])){
    $nama=mysqli_real_escape_string($koneksi, $_POST["nama_user"]); 
    $gadget=mysqli_real_escape_string($koneksi, $_POST["gadget"]);
    $pesan=mysqli_real_escape_string($koneksi, $_POST["pesan"]); 
    $rating=mysqli_real_escape_string($koneksi, $_POST["rating"]);

    $simpan=mysqli_query($koneksi,"INSERT INTO user VALUES('','$nama','$gadget','$pesan','$rating')");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width", initial-scale="0.1">
  
  <title>RENTAL KENDARAAN</title>

  <!-- Favicons -->
  <link href="img/icon.png" rel="icon">
  <link href="img/img/icon.png" rel="apple-touch-icon">
  
  <!-- Main CSS File -->
  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>

</head>

<body>
<header class="header">
    <section class="flex">
        <a href="index.php" class="logo"><i class="fas fa-key"></i>
        RENTAL KENDARAAN</a>
        
        <div id="menu-btn" class="fas fa-bars"></div>
        
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="allrental.php">All Rental</a>
            <a href="rekomendasi.php" class="active">Rekomendasi</a>
        </nav>

    </section>
</header>

<div class="toast">
    <div class="toast-content">
          
        <i class="bi bi-hourglass-bottom check"></i>

        <div class="message">
            <span class="text text-1">Mencari Tempat Penyewaan Kendaraan</span>
            <span class="text text-2">sekitar bandara YIA</span>
        </div>
    </div>

    <div class="progress"></div>
</div>

<div class="toast-penilaian">
    <i class="fa-solid fa-xmark close"></i>

    <div class="toast-content">
    <h2>Rating Penilaian Aplikasi</h2>
        <div class="nilai"> 
            <form method="post">
                <h4 style="padding-top:10px; text-align:center;">Apakah aplikasi ini membantu anda?</h4>
                <div class="rateYo" id="rating"></div>
                <input type="hidden" name="rating">

                <div class="input">
                    <span class="details">Nama Lengkap</span>
                    <input type="text" placeholder="Masukan Nama Anda" name="nama_user" required>
                </div>

                <div class="input">
                    <span class="details">Gadget Apa Yang Anda Gunakan ? (HP/ PC)</span>
                    <input type="text" placeholder="Masukan Gadget Anda (HP / PC)" name="gadget" required>
                </div>

                <div class="input">
                    <span class="details">Pesan</span>
                    <textarea name="pesan" cols="30" rows="5" placeholder="Masukan Pesan Anda" required></textarea>
                </div>

                <input type="submit" name="simpan" value="KIRIM" class="submit">
            </form>
        </div>
    </div>
</div>

<div class="toast-thx">
    <div class="toast-content">
        <i class="bi bi-emoji-smile"></i>
        <h2>Terimakasih Atas Penilaiannya</h2>
    </div>
    <div class="buttons">
      <button class="close-btn">Ok, Close</button>
    </div>
</div>

<section class="rekomendasi">

    <div class="container-bc">
        <h1>Halaman Pencarian Rental Kendaraan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Rekomendasi</li>
        </ol>
    </div>

    <div class="kriteria">
        <h2>Metode Simple Hill Climbing</h2>
        <p>Pada menu rekomendasi ini menggunakan penerapan metode simple hill climbing 
            untuk mengetahui tempat penyewaan kendaraan terdekat dari Bandara Yogyakarta 
            International Airport (YIA).
        </p>
        <p>Data rekomendasi ini akan muncul setelah anda memilih tipe kendaraan yang akan
            anda gunakan.
        </p>
    </div>

    <div class="kriteria">
        <h2>Pilih Tipe Kendaraan</h2>
        <p>Silahkan pilih tipe kendaraan yang akan anda gunakan.</p>

        <div class="flex">
            <div class="pri1">
                <label>Pilih Kendaraan</label>
                <form method="post">
                    <select name="kendaraan" id="kendaraan" onchange="this.form.submit()">
                        <option disabled selected> Pilih </option>
                        <?php
                        $qry = "SELECT DISTINCT tipe from rental";
                        $dta = mysqli_query($koneksi, $qry);
                        while($data = mysqli_fetch_assoc($dta)){?>
                        <option value="<?= $data['tipe'];?>"
                        <?php
                        if (isset($_POST['kendaraan'])) {
                            $kendaraan = $_POST['kendaraan'];
                            if ($data['tipe'] === $kendaraan) {
                                echo "selected";
                            }
                        }
                        ?>>
                        <?= $data['tipe']; ?></option>
                        <?php } ?>
                    </select>
                </form>
            </div>
        </div>

        <p style="margin-top:10px;">Berikut Tipe Kendaraan Yang Anda Pilih :</p>

        <?php
        if(isset($_POST['kendaraan'])){
            $qry = mysqli_query($koneksi, "SELECT * from rental where tipe='$_POST[kendaraan]'");
            $tampil = mysqli_fetch_assoc($qry);?>
            <h3><?= $tampil['tipe'];?></h3>
        <?php } ?>
        
        <?php
        if(isset($_POST['kendaraan'])){
            $get = mysqli_query($koneksi, "select * from rental where tipe='$_POST[kendaraan]'");
            $count = mysqli_num_rows($get);?>
            <span>Jumlah Data :<h2><?=$count;?></h2></span>
        <?php } ?>

        <?php
        // Fungsi untuk mengambil data dari database
        function get_data_from_database($koneksi) {
            $data = [];
            
            if(isset($_POST['kendaraan'])){
                $query = "SELECT * FROM rental where tipe='$_POST[kendaraan]'";
                $result = mysqli_query($koneksi, $query);
            
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row['jarak'];
                    }
                }
            }    
            
            return $data;
        }

        function sort_data($data) {
            // Fungsi untuk mengurutkan data
            $num_data = count($data);
            $swap_count = 0;
            $r = 0;
        
            for ($i = 0; $i < $num_data - 1; $i++) {
                for ($j = 0; $j < $num_data - $i - 1; $j++) {
                    if ($data[$j] > $data[$j + 1]) {
                        // Melakukan pertukaran data
                        $temp = $data[$j];
                        $data[$j] = $data[$j + 1];
                        $data[$j + 1] = $temp;
        
                        $swap_count++;
                    }
                    $r++;
                }
            }
        
            echo "Jumlah Data Ditukar : <br>" . $swap_count . "\n";
            echo "<br> Jumlah Pertukaran Rute : <br>" . $r;
        
            return $data;
        }
        
        // Mengambil data dari database
        $data = get_data_from_database($koneksi);

        function hill_climbing($data) {
            // Menampilkan data awal
            echo "Data Awal : <br>" . implode(", ", $data) . "\n";
            echo "<br>";

            // Mengurutkan data dan mendapatkan jumlah pertukaran
            $sorted_data = sort_data($data);
            
            // Menampilkan data terurut
            echo "<br> Data Terurut : <br>" . implode(", ", $sorted_data) . "\n";
        }
        ?>

        <button class="cari" name="cari">Cari Rekomendasi</button>
    </div>

    <div class="table-rekomendasi">
        <h2>Rekomendasi Tempat Penyewaan Kendaraan</h2>
        
        <?php
            echo "Data Awal : <br>" . implode(", ", $data) . "\n";
            echo "<br>";

            // Mengurutkan data dan mendapatkan jumlah pertukaran
            $sorted_data = sort_data($data);
            
            // Menampilkan data terurut
            echo "<br> Hasil Perhitungan Simple Hill Climbing : <br>" . implode(", ", $sorted_data) . "\n";
        ?>
        
        <p> </p>
        <p><b>Berikut Tempat Penyewaan Kendaraan Sesuai Tipe Kendaraan Yang Dipilih :</b></p>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Rental</th>
                    <th>Jarak</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    $no=1;
                    
                    if(isset($_POST['kendaraan'])){
                        $qry = "SELECT * FROM rental WHERE tipe='$_POST[kendaraan]' ORDER BY jarak ASC";
                        $result = mysqli_query($koneksi, $qry);
                    }

                    while ($tampil = mysqli_fetch_assoc($result)){?>
                        <tr>
                             <td><?=$no?></td>
                             <td style="text-align:left;"><?=$tampil['nama_rental']?></td>
                             <td><?=$tampil['jarak']?></td>
                             <td class="actions">
                                 <a href="https://wa.me/+62<?=$tampil['no_wa']?>" class="edit"><i class="bi bi-whatsapp"></i></a>
                                 <a href="<?=$tampil['location']?>" class="trash"><i class="bi bi-geo-alt-fill"></i></a>
                             </td>
                         </tr>
                         <?php
                             $no++;
                         }?>
            </tbody>
        </table>
    </div>

</section>

<!-- Footer section -->
<Footer class="footer">
    <div class="daftarnilai">
        <div class="daftar">
            <a href="index.php" class="logo"><i class="fas fa-key"></i>
            RENTAL KENDARAAN</a>
            <p>Daftarkan Rental Kendaraan Anda Dengan Klik Tombol Dibawah Ini !</p>
            <a href="daftar.php"><button type="button">DAFTAR RENTAL</button></a>
        </div>
        <div class="daftar">
            <h4>Syarat :</h4>
            <p>> Berada Di Area Bandara Yogyakarta International Airport (YIA)</p>
            <p>> Radius Max 5 Km Dari Titik 0 Km Bandara YIA</p>
            <p>> Rental Sudah Terdaftar Di Google Maps</p>
        </div>
    </div>
    
    <div class="credit">&copy; copyright @ 2023 by <span> Daffa Virdianto</span> | all rights reserved!
    </div>
</Footer>

<!-- Main JS File -->
<script src="js/script.js"></script>

<script>
    const button = document.querySelector(".kriteria button"),
      toast = document.querySelector(".toast"),
      popup = document.querySelector(".toast-penilaian"),
      thx = document.querySelector(".toast-thx"),
      table = document.querySelector (".table-rekomendasi"),
      progress = document.querySelector(".progress"),
      closeIcon = document.querySelector(".close"),
      submit = document.querySelector(".submit"),
      closeBtn = document.querySelector(".close-btn");

      let timer1, timer2, timer3;

      button.addEventListener("click", () => {
        table.classList.remove("active");
        toast.classList.add("active");
        progress.classList.add("active");

        timer1 = setTimeout(() => {
            toast.classList.remove("active");
            table.classList.add("active");
        }, 5000); //1s = 1000 milliseconds

        timer2 = setTimeout(() => {
          progress.classList.remove("active");
        }, 5300);

        timer3 = setTimeout(() => {
          popup.classList.add("active");
        }, 9000);
    });

    closeIcon.addEventListener("click", () => {
        popup.classList.remove("active");
    });

    submit.addEventListener("click", () => {
        popup.classList.remove("active");
        thx.classList.add("active");
    });
    
    closeBtn.addEventListener("click", () =>
        thx.classList.remove("active")
    );
      
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>
    $(function () {
        $(".rateYo").rateYo({
        fullStar: true
        }).on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('input[name=rating]').val(rating);
        });
    });
</script>
</body>
</html>


