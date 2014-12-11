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
    <title>Hasil Pencarian Pesanan - <?php echo $_SESSION['username']; ?></title>
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
  <li role="presentation" class="active"><a href="">Cari Pesanan</a></li>
  <li role="presentation"><a href="lihat_feedback.php">Lihat Feedback</a></li>
  <li role="presentation"><a href="pendapatan.php">Total Pendapatan</a></li>
  <li role="presentation"><a href="pesananantartanggal.php">Pesanan Antar Tanggal Tertentu</a></li>
  </ul>

  <!-- Cari Pesanan -->
  <center><h2>Hasil Pencarian Pesanan</h2>
  <!-- Proses Menampilkan Data -->

  <?php
    
  $field = $_POST['field'];
  $find = $_POST['find'];
  $find = trim ($find);

  if ($find == "") {
    echo "<p>Masukkan Kata Pencarian. Tidak Boleh Kosong<br>";
    echo "<br><a href='cari_pesanan.php'><button type='button' class='btn btn-default'>Cari Lagi</button></a><br><br><br><br>";
    echo "<div class='panel panel-default'>
          <div class='panel-footer'><center>Service Bengkel Panggilan</center></div>
          </div>";
    exit;
  }
  ?>
  <table class="table table-striped" border="1">
    <thead>
        <tr>
            <td><center><b>NO</b></center></td>
            <td><center><b>Nama</b></center></td>
            <td><center><b>Alamat</b></center></td>
            <td><center><b>No STNK</b></center></td>
            <td><center><b>No Plat</b></center></td>
           <td><center><b>Jenis Kendaraan</b></center></td>
           <td><center><b>Jenis Service</b></center></td>
           <td><center><b>Tanggal</b></center></td>
           <td><center><b>Jadwal Service</b></center></td>
        </tr>
    </thead>
    <tbody>
  <?php
  //query pencarian
  $data = mysql_query("SELECT * FROM data_service WHERE " . $field . " LIKE '%" . $find . "%'");
  $no = 1;
  //menampilkan hasil query
  while($result = mysql_fetch_array($data)) {
    ?>
    
    <tr>
            <td><center><?php echo $no; ?></center></td>
            <td><center><?php echo $result['nama']; ?></center></td>
            <td><center><?php echo $result['alamat']; ?></center></td>
            <td><center><?php echo $result['no_stnk']; ?></center></td>
            <td><center><?php echo $result['no_plat']; ?></center></td>
            <td><center><?php echo $result['jenis_kendaraan']; ?></center></td>
           <td><center><?php echo $result['jenis_service']; ?></center></td>
            <td><center><?php echo $result['tanggal']; ?></center></td>
            <td><center><?php echo $result['jadwal_service']; ?></center></td>
        </tr>
    <?php
    $no++;
  }
  echo "</tbody>";
  echo "</table>";
  //menghitung jumlah hasil query
  $anymatches = mysql_num_rows($data);
  if ($anymatches == 0) {
    echo "<br>Tidak ada data yang cocok<br><br>";
    
  }
  ?>

  <!-- Menampilkan Pilihan Cari Lagi -->
  <br><br><a href="cari_pesanan.php"><button type="button" class="btn btn-default">Cari Lagi</button></a>
  </center>

  <br><br><br>

  <!-- Footer -->
  <div class="panel panel-default">
  <div class="panel-footer"><center>Service Bengkel Panggilan</center></div>
  </div>
  </div>
  </body>
</html>