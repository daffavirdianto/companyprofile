<?php 
include "koneksi.php";
$tampil = mysqli_query($koneksi,"SELECT * FROM rental");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="tampilan">
        <table>
            <?php
            $no=0;
            $ambildata = mysqli_query($koneksi, "Select * From rental");
            while ($tampil = mysqli_fetch_array($ambildata)){?>
            <thead>
                <th>Nama Rental</th>
                <th>Tipe</th>
                <th>Kendaraan</th>
                <th>Harga</th>
            </thead>
            <tbody>
                <td><?=$no?></td>
                <td><?=$tampil['nama_user']?></td>
                <td></td>
                <td><?=$tampil['harga']?></td> 
            </tbody>
            <?php 
                $no++;
            }?>
        </table>
        
    </div>
</body>
</html>