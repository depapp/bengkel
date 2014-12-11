<?php
session_start();

if (!isset($_SESSION['username'])) {
header('location:login.php');
}

if($_SESSION['hak']!="customer"){
die("<br><center><h2>Maaf, Anda Bukan CUSTOMER!!! <br>Silahkan <a href=\"javascript:history.back()\">Kembali</a></h2></center>");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Beranda - <?php echo $_SESSION['username']; ?></title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="all">
    <script src="js/bootstrap.js"></script>
  </head>

<body>

  <!-- Tab Menu -->
  <br>
  <div class="container">
  <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">

  <div class="navbar-header">
    <a class="navbar-brand" href="index.php">Service Bengkel Panggilan</a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav navbar-right">
    <li><a href="credit.php">Credit</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
  </div>
  
  </div>
  </nav>

  <!-- Home Contents -->
  <!-- Banner Gambar -->
  <br><img src="images/banner.jpg" class="img-responsive center-block" alt="Responsive image">
  <div class="container">
    <h2>
      <?php echo "Selamat Datang, <strong>".$_SESSION['username']."</strong>"; ?>
    </h2>
    <br>

  <!-- Menu -->
  <ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href=""><?php echo $_SESSION['username']; ?></a></li>
  <li role="presentation"><a href="pemesanan.php">Pemesanan</a></li>
  </ul>

  <center>
  <h2>Silahkan Langsung Melakukan Booking (Pemesanan)</h2>
  <a href="pemesanan.php"><img src="images/booking.jpg" class="img-responsive center-block"></a>
  </center>
  </div>

  <br><br><br>

  <!-- Footer -->
  <div class="panel panel-default">
  <div class="panel-footer"><center>Service Bengkel Panggilan</center></div>
  </div>
  </div>
  </body>
</html>