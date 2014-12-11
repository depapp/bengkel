<?php
session_start();
include('connection.php');
if (!isset($_SESSION['username'])) {
header('location:login_admin.php');
}

if($_SESSION['hak']!="kasir"){
die("<br><center><h2>Maaf, Anda Bukan ADMIN KASIR!!! <br>Silahkan <a href=\"javascript:history.back()\">Kembali</a></h2></center>");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Cari Pesanan - <?php echo $_SESSION['username']; ?></title>
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
    <a class="navbar-brand" href="">Service Bengkel Panggilan</a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav navbar-right">
    <li><a href="credit.php">Credit</a></li>
    <li><a href="logout_admin.php">Logout</a></li>
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
  </div>
  <br>

  <!-- Menu -->
  <ul class="nav nav-tabs">
  <li role="presentation"><a href="index_adminkasir.php"><?php echo $_SESSION['username']; ?></a></li>
  <li role="presentation"><a href="daftar_semua_pesanan.php">Daftar Pesanan</a></li>
  <li role="presentation"><a href="cari_pesanan.php">Cari Pesanan</a></li>
  <li role="presentation"><a href="lihat_feedback.php">Lihat Feedback</a></li>
  <li role="presentation"><a href="pendapatan.php">Total Pendapatan</a></li>
  <li role="presentation" class="active"><a href=" ">Pesanan Antar Tanggal Tertentu</a></li>
  </ul>

  <!-- Cari Di Antara Tanggal -->
  <center><h2>Silahkan Masukan Tanggalnya</h2>
  <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr>
        <form name="pencarian" method="post" action="pesananantartanggal_process.php">
          <td>
            <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
              <br>
              <tr>
                <td width="45"><span class="glyphicon glyphicon-calendar"></span></td>
                <td width="25">:</td>
                <td width="300"><input class="form-control" name="tglawal" required="required" type="date" placeholder=" Tanggal Awal"></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <td><span class="glyphicon glyphicon-calendar"></span></td>
                <td>:</td>
                <td><input class="form-control" name="tglakhir" required="required" type="date" placeholder=" Tanggal Akhir"></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input class="btn btn-default" type="submit" name="pencarian" value="Lihat"></td>
              </tr>
            </table>
          </td>
        </form>
      </tr>
  </table>
  </center>

  <br><br><br>

  <!-- Footer -->
  <div class="panel panel-default">
  <div class="panel-footer"><center>Service Bengkel Panggilan</center></div>
  </div>
  </div>
  </body>
</html>