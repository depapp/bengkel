<?php
session_start();

if (isset($_SESSION['username'])) {
header('location:index_customer.php');
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Beranda</title>
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
    <li><a href="login.php">Login</a></li>
    <li><a href="register.php">Register</a></li>
    <li><a href="credit.php">Credit</a></li>
  </ul>
  </div>
  
  </div>
  </nav>
  
  <!-- Home Contents -->
  <!-- Banner Gambar -->
  <br><img src="images/banner.jpg" class="img-responsive center-block" alt="Responsive image">

  <!-- Kotak 4 Gambar -->
  <br><br>
  <div class="row">
  <div class="col-xs-6 col-md-3">
    <a href=" " class="thumbnail">
      <br><img src="images/kotak.png" class="img-responsive center-block"><br>
      <center><h3><p>PRAKTIS</p>
      <small>Tidak Usah Repot-Repot Pergi Ke Bengkel</small></h3></center>
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href=" " class="thumbnail">
      <br><img src="images/kotak2.png" class="img-responsive center-block"><br>
      <center><h3><p>HEMAT WAKTU</p>
      <small>Waktu Anda Tidak Akan Terbuang Sia-Sia</small></h3></center>
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href=" " class="thumbnail">
      <br><img src="images/kotak3.png" class="img-responsive center-block"><br>
      <center><h3><p>MENUNGGU</p>
      <small>Anda Tidak Usah Menunggu Di Bengkel</small></h3></center>
    </a>
  </div>
  <div class="col-xs-6 col-md-3">
    <a href=" " class="thumbnail">
      <br><img src="images/kotak4.png" class="img-responsive center-block"><br>
      <center><h3><p>ANDA PUAS</p>
      <small>Kepuasan Anda Adalah Prioritas Kami</small></h3></center>
    </a>
  </div>
  </div>

  <br><br>
  <!-- Testimoni -->
  <div class="container">
    <center><div class="page-header"><h1><b>Apa Kata Mereka?</b></h1></div></center><br>
  <blockquote>
  <p><mark><i>Service Bengkel Panggilan</i></mark> ini sangat membantu saya sebagai pegawai kantor. Karena saya tidak perlu menunggu lama-lama di bengkel, cukup menunggu dirumah <span class="glyphicon glyphicon-headphones" aria-hidden="true"></p>
  <footer>Ujang Gegep : <cite title="Source Title">Pekerja Kantoran</cite></footer>
  </blockquote>
  </div>
  
  <div class="container">
  <blockquote class="blockquote-reverse">
  <p>Semenjang ada <mark><i>Service Bengkel Panggilan</i></mark>, nge-service mobil jadi praktis banget.<br>
    Makasih banyak <mark><i>Service Bengkel Panggilan</i></mark> <span class="glyphicon glyphicon-heart" aria-hidden="true"></span></p>
  <footer>Neng Nong : <cite title="Source Title">SPG Mobil Sport</cite></footer>
  </blockquote>
  </div>
  

  <br><br><br>

  <!-- Footer -->
  <div class="panel panel-default">
  <div class="panel-footer"><center>Service Bengkel Panggilan</center></div>
  </div>
  </div>
  </body>
</html>