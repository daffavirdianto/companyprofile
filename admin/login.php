<?php
include "koneksi.php";
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  $email = validate($_POST['email']);
  $pass = validate($_POST['password']);

  if (empty($email)) {
    header("Location: index.php?error=Email kosong");
    exit();
  } else if(empty($pass)){
    header("Location: index.php?error=Password Kosong");
    exit();
  } else{
    $sql =mysqli_query($koneksi, "SELECT * FROM admin WHERE email='$email' AND password='$pass'");
    $result = mysqli_fetch_array($sql);

    if (is_array($result)) {
      $_SESSION["nama_admin"]=$result["nama_admin"];

    } else{
      header("Location: index.php?error=Email atau Password salah");
      exit();
    }

    if(isset($_SESSION["nama_admin"])){
      header("Location: dashbor.php");
    }
  }
} else{
  header("Location: index.php");
}
