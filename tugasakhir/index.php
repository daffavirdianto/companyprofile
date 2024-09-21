<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width", initial-scale="0.1">
  
  <title>HOME</title>
  
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
            <a href="index.php" class="active">Home</a>
            <a href="allrental.php">All Rental</a>
            <a href="rekomendasi.php">Rekomendasi</a>
        </nav>        
    </section>
</header>

<div class="head">
    <div class="text">
        <h1>SELAMAT DATANG</h1>
        <h1>SISTEM PENCARIAN TEMPAT PERSEWAAN KENDARAAN AREA BANDARA YIA</h1>
        <p>Aplikasi ini berfungsi untuk memberikan informasi rental kendaraan yang anda inginkan 
            disekitar bandara YIA, Selamat Mencoba!</p>
    </div>
    <div class="img">
        <img src="img/bg1.png" alt="">
    </div>
</div>

<div class="penjelasan" style="margin-top:50px;">
    <h2>Penjelasan Menu</h2>
    <div class="box">
        <ul class="dropdown">
            <li>
              <div class="dropdown-menu">
                <span class="title"><h3>Home</h3></span>
                <i class="bi bi-chevron-down arrow"></i>
              </div>
              <p>Pada menu HOME terdapat beberapa informasi, yaitu :</p>
              <p>1. Selamat Datang</p>
              <p>2. Penjelasan Setiap Menu</p>
              <p>3. Cara Penggunaan Menu Rekomendasi</p>
              <p>4. Penjelasan Umum</p>
            </li>
            <li>
                <div class="dropdown-menu">
                  <span class="title"><h3>All Rental</h3></span>
                  <i class="bi bi-chevron-down arrow"></i>
                </div>
                <p>Pada menu All Rental anda akan diberikan informasi mengenai seluruh daftar Rental dan juga dapat memfilter data rental yang anda cari : </p>
                <p>1. Tipe Kendaraan</p>
                <p>2. Harga</p>   
                <p>3. Rating</p>
            </li>
            <li>
                <div class="dropdown-menu">
                  <span class="title"><h3>Rekomendasi</h3></span>
                  <i class="bi bi-chevron-down arrow"></i>
                </div>
                <p>Pada menu rekomendasi anda akan diberikan informasi rekomendasi sesuai tipe kendaraan yang anda pilih</p>
            </li>
        </ul>
    </div>
</div>


<!-- Cara Pemakaian Section -->
<section class="cara-container">
    <h1 class="heading" style="text-align: center; margin: 1rem 0; font-size: 1.5rem;">Cara Penggunaan Aplikasi</h1>

    <div class="box-container">
        <div class="box">
            <img src="img/cara/cara1.png" alt="">
            <h3>Pilih Menu Cari Rekomendasi</h3>
            <p>Anda dapat menekan pada tombol bertuliskan rekomendasi</p>
        </div>
    
        <div class="box">
            <img src="img/cara/cara2.png" alt="">
            <h3>Masukan Tipe Kendaraan</h3>
            <p>Silahkan anda pilih tipe kendaraan yang akan anda gunakan dan menekan tombol cari rekomendasi</p>
        </div>
    
        <div class="box">
            <img src="img/cara/cara3.png" alt="">
            <h3>Hasil Rekomendasi</h3>
            <p>Setelah anda memasukkan tipe kendaraan dan menekan tombol cari rekomendasi, 
                maka selanjutnya tunggu sampai proses pencarian selesai.</p>
        </div>
    </div>
</section>

<div class="penjelasan">
    <h2>Penjelasan Umum</h2>
    <div class="box">
        <ul class="dropdown">
            <li>
              <div class="dropdown-menu">
                <span class="title">Heuristik</span>
                <i class="bi bi-chevron-down arrow"></i>
              </div>
              <p>Heuristik adalah nilai yang memberi nilai pada tiap simpul yang memandu A* mendapatkan 
                solusi yang diinginkan. Dengan heuristik, maka A* pasti akan mendapatkan solusi (jika memang ada solusinya). 
                Dengan kata lain, heuristik adalah fungsi optimasi yang menjadikan algoritma A* lebih baik dari pada 
                algoritma lainnya.</p>
            </li>
            <li>
                <div class="dropdown-menu">
                  <span class="title">Metode Simple Hill Climbing Search</span>
                  <i class="bi bi-chevron-down arrow"></i>
                </div>
                <p>Simple hill climbing merupakan jenis hill climbing yang hanya mengevaluasi status node tetangga 
                    pada satu waktu dan memilih yang pertama yang mengoptimalkan cost saat ini dan menetapkannya 
                    sebagai state terkini.</p>
            </li>
        </ul>
    </div>
</div>

<!-- Footer section -->
<Footer class="footer">
    <div class="credit">&copy; copyright @ 2023 by <span> Daffa Virdianto</span> | all rights reserved!
    </div>
</Footer>


<!-- Main JS File -->
<script src="js/script.js"></script>
</body>
</html>