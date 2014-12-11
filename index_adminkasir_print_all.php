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
    <title>Cetak Semua Pesanan - <?php echo $_SESSION['username']; ?></title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="all">
    <script src="js/bootstrap.js"></script>
  </head>

<body>

  <!-- Tab Menu -->
  <br>
  <div class="container">

  <!-- Home Contents -->
  <!-- Banner Gambar -->
  <br><img src="images/banner.jpg" class="img-responsive center-block" alt="Responsive image"><br>

  <!-- Menampilkan Pesanan -->
  <center><h2>Daftar Semua Pesanan</h2>
  <br>
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
           <td><center><b>Harga</b></center></td>
        </tr>
    </thead>
    <tbody>
    <?php
    $query = mysql_query("select * from data_service");
 
    $no = 1;
    while ($data = mysql_fetch_array($query)) {
    ?>
        <tr>
            <td><center><?php echo $no; ?></center></td>
            <td><center><?php echo $data['nama']; ?></center></td>
            <td><center><?php echo $data['alamat']; ?></center></td>
            <td><center><?php echo $data['no_stnk']; ?></center></td>
            <td><center><?php echo $data['no_plat']; ?></center></td>
            <td><center><?php echo $data['jenis_kendaraan']; ?></center></td>
           <td><center><?php echo $data['jenis_service']; ?></center></td>
            <td><center><?php echo $data['tanggal']; ?></center></td>
            <td><center><?php echo $data['jadwal_service']; ?></center></td>
            <td><center><?php echo $data['harga']; ?></center></td>
        </tr>
    <?php
        $no++;
    }
    ?>
    </tbody>
  </table>
  <a class="btn btn-default" onClick="window.print();return false"><span class="glyphicon glyphicon-print"></span>
  </a>
  <br><br><br>

  <!-- Footer -->
  <div class="panel panel-default">
  <div class="panel-footer"><center>Service Bengkel Panggilan</center></div>
  </div>
  </div>
  </body>
</html>