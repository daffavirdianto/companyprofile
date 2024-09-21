<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width", initial-scale="0.1">
  
  <title>ADMIN AREA</title>

  <!-- Favicons -->
  <link href="img/icon.png" rel="icon">
  <link href="img/img/icon.png" rel="apple-touch-icon">
  
  <!-- Main CSS File -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
<div class="container">
      
      <div class="box">
        
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><i class="bi bi-exclamation-triangle-fill"></i><?php echo $_GET['error']; ?></p>
        <?php } ?>
        
        <h2>ADMIN LOGIN</h2>
	      <form method="post" action="login.php">
		      
        <div class="login">
            <input type="email" name="email" placeholder="Email">
            <i class="fa fa-envelope" aria-hidden="true"></i>
          </div>
    
          <div class="login">
            <input type="password" name="password" placeholder="Password">
            <i class="fa fa-lock" aria-hidden="true"></i>
          </div>

          <button class="btn-login">Login</button>
        </form>
    </div>
</div>


</body>
</html>