<?php
session_start();
include('connection.php');
if (!isset($_SESSION['username'])) {
header('location:login_admin.php');
}

if($_SESSION['hak']!="barang"){
die("<br><center><h2>Maaf, Anda Bukan ADMIN BARANG!!! <br>Silahkan <a href=\"javascript:history.back()\">Kembali</a></h2></center>");
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

  <!-- Menampilkan Pesanan -->
  <center><h2>Daftar Stok Barang</h2>
  <br>
  <table class="table table-striped" border="1">
    <thead>
        <tr>
            
            <td><center><b>Service Kecil</b></center></td>
            <td><center><b>Service Besar</b></center></td>
            <td><center><b>Full Service</b></center></td>
            <td><center><b>Update</b></center></td>
        </tr>
    </thead>
    <tbody>
    <?php
    $query = mysql_query("select * from stok");
 
    
    while ($data = mysql_fetch_array($query)) {
    ?>
        <tr>
            
            <td><center><?php echo $data['service_kecil']; ?></center></td>
            <td><center><?php echo $data['service_besar']; ?></center></td>
            <td><center><?php echo $data['full_service']; ?></center></td>
            <td><center><a href="edit_stok.php?id_stok=<?php echo $data['id_stok']; ?>">Update Stok</a></center></td>
            
        </tr>
    <?php
        
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