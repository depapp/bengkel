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
    <title>Lihat Feedback - <?php echo $_SESSION['username']; ?></title>
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
  <li role="presentation" class="active"><a href="lihat_feedback.php">Lihat Feedback</a></li>
  <li role="presentation"><a href="pendapatan.php">Total Pendapatan</a></li>
  <li role="presentation"><a href="pesananantartanggal.php">Pesanan Antar Tanggal Tertentu</a></li>
  </ul>

  <!-- Menampilkan Pesanan -->
  <center><h2>Daftar Seluruh Feedback</h2>
  <br>
  <table class="table table-striped" border="1">
    <thead>
        <tr>
            <td><center><b>NO</b></center></td>
            <td><center><b>Nama</b></center></td>
            <td><center><b>Pelayanan</b></center></td>
            <td><center><b>Waktu</b></center></td>
            <td><center><b>Kepuasan</b></center></td>
        </tr>
    </thead>
    <tbody>
    <?php
    $query = mysql_query("select * from feedback");
 
    $no = 1;
    while ($data = mysql_fetch_array($query)) {
    ?>
        <tr>
            <td><center><?php echo $no; ?> </center></td>
            <td><center><?php echo $data['nama']; ?></center></td>
            <td><center><?php echo $data['pelayanan']; ?></center></td>
            <td><center><?php echo $data['waktu']; ?></center></td>
            <td><center><?php echo $data['kepuasan']; ?></center></td>
        </tr>
    <?php
        $no++;
    }
    ?>
    </tbody>
  </table>
  <br><br><br>

  <!-- Footer -->
  <div class="panel panel-default">
  <div class="panel-footer"><center>Service Bengkel Panggilan</center></div>
  </div>
  </div>
  </body>
</html>