<?php
session_start();
include('connection.php');

if (!isset($_SESSION['username'])) {
header('location:login.php');
}

if($_SESSION['hak']!="customer"){
die("<br><center><h2>Maaf, Anda Bukan CUSTOMER!!! <br>Silahkan <a href=\"javascript:history.back()\">Kembali</a></h2></center>");
}

$username = $_SESSION['username'];
$query = mysql_query("SELECT nama, alamat, username FROM customer WHERE username='$username'") or die(mysql_error()); 
$data = mysql_fetch_array($query);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pemesanan - <?php echo $_SESSION['username']; ?></title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="all">
    
  </head>

<body>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>

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
  <li role="presentation"><a href="index_customer.php"><?php echo $_SESSION['username']; ?></a></li>
  <li role="presentation" class="active"><a href="">Pemesanan</a></li>
  </ul>

  </div>

  <!-- Form Input -->
  <center><h2>Silahkan Lengkapi Form Pemesanan Anda</h2></center>

  <!-- Sukses Daftar -->
  <?php 
    if (!empty($_GET['message']) && $_GET['message'] == 'success') {
       echo '<div class="alert alert-success" role="alert">';
       echo '<center><h2>Berhasil Melakukan Pemesanan.<br>Silahkan Tunggu Montir Kami Datang Kerumah Anda!';
       echo '</h2></center></div>';
    }
  ?>

  <!-- Gagal Daftar -->
  <?php 
    if (!empty($_GET['message']) && $_GET['message'] == 'failed') {
       echo '<div class="alert alert-warning" role="alert">';
       echo '<center><h2>Inputan Tangggal Salah<br>Silahkan Input Ulang Form Pemesanan Anda!</h2></center>';
       echo '</div>';
    }
  ?>

  <!-- Sukses Submit Feedback -->
  <?php 
    if (!empty($_GET['message']) && $_GET['message'] == 'feedback') {
       echo '<div class="alert alert-success" role="alert">';
       echo '<center><h2>Terima Kasih Sudah Mengisi Feedback!</h2></center>';
       echo '</div>';
    }
  ?>

  <center>
    <h2><div class="alert alert-info" role="alert">
      Jika Anda Sudah Pernah Memesan Sebelumnya,<br>Silahkan Mengisi Feedback Terlebih Dahulu<br>
      <small><a href="feedback.php"><button class="btn btn-default">Feedback</button></a></small>
    </h2>
  </center>
  <table width="350" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr>
        <form name="form_pemesanan" method="post" action="pemesanan_process.php">
          <td>
            <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
              <br>
              <tr>
                <td width="45"><span class="glyphicon glyphicon-user"></span></td>
                <td width="25">:</td>
                <td width="300"><input class="form-control" name="nama" type="text" required="required" value=" <?php echo $data['nama']; ?>"></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <td><span class="glyphicon glyphicon-home"></span></td>
                <td>:</td>
                <td><input class="form-control" name="alamat" type="text" required="required" value=" <?php echo $data['alamat']; ?>"></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
               <tr>
                <td><span class="glyphicon glyphicon-wrench"></span></td>
                <td>:</td>
                <td><input class="form-control" name="no_stnk" type="number" required="required" placeholder=" No STNK"></td>
              </tr>
              <td><br></td>
              <tr>
                <td><span class="glyphicon glyphicon-dashboard"></span></td>
                <td>:</td>
                <td><input class="form-control" name="no_plat" type="text" required="required" placeholder=" No Plat"></td>
              </tr>
              <td><br></td>
               <tr>
                <td><span class="glyphicon glyphicon-shopping-cart"></span></td>
                <td>:</td>
                <td>
                  <select class="form-control" name="jenis_kendaraan">
                    <option disabled>Jenis Kendaraan</option>
                    <option value="MPV">MPV</option>
                    <option value="City Car">City Car</option>
                    <option value="SUV">SUV</option>
                    <option value="Sedan">Sedan</option>
                    <option value="Hatch Back">Hatch Back</option>
                    <option value="Pick Up">Pick Up</option>
                  </select>
                </td>
              </tr>
              <td><br></td>
              <tr>
                <td><span class="glyphicon glyphicon-cog"></span></td>
                <td>:</td>

                <?php
                $barang = mysql_query("SELECT * from stok") or die(mysql_error());
                $stok_barang = mysql_fetch_array($barang);
                ?>

                <td>
                  <select class="form-control" name="jenis_service">
                    <option disabled>Jenis Service</option>
                    <?php if ($stok_barang['service_kecil'] == 0) {
                      echo "<option disabled value='Service Kecil'>Service Kecil</option>";
                    }else{                
                      echo "<option value='Service Kecil'>Service Kecil</option>";
                    }
                    ?>
                    
                    <?php if ($stok_barang['service_besar'] == 0) {
                      echo "<option disabled value='Service Besar'>Service Besar</option>";
                    }else
                    {
                      echo "<option value='Service Besar'>Service Besar</option>";
                    }

                    ?>

                    <?php if ($stok_barang['full_service'] == 0) {
                      echo "<option disabled value='Full Service'>Full Service</option>";
                    }else
                    {
                      echo "<option value='Full Service'>Full Service</option>";
                    }

                    ?>
                    
                    
                  </select>
                </td>
                <td>
                  <!-- Keterangan Service -->
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></button>
                  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                  <center><b>Service Kecil (Rp. 250.000,00) Terdiri Dari : </b></center>
                  <ul> 
                    <li>Ganti Oli</li>
                    <li>Cek Aki</li>
                    <li>Service Karburator</li>
                    <li>Cek Radiator</li>
                    <li>Cek Busi</li>
                    <li>Membersihan Filter</li>
                    <li>Cek Kampas Rem</li>
                    <li>Pemeriksaan Kelistrikan</li>
                    <li>Stel Timing Pengapian</li>
                    <li>Pemeriksaan Saluran Bahan Bakar</li>
                    <li>Pemeriksaan Sistem Pendingin</li>
                  </ul>
                  <center><b>Service Besar (Rp. 500.000,00) Terdiri Dari : </b></center>
                  <ul> 
                    <li>Pembersihan Ruang Bakar</li>
                    <li>Cek Piston</li>
                    <li>Pengecekan Tekanan Kompresi</li>
                    <li>Pemeriksaan Celah Katup</li>
                  </ul>
                  <center><b>Full Service (Rp. 750.000,00) Terdiri Dari : </b></center>
                  <ul> 
                    <li><i><u>Paket Service Kecil</u></i></li>
                    <li><i><u>Paket Service Besar</u></i></li>
                  </ul>
                  </div>
                  </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <td><span class="glyphicon glyphicon-calendar"></span></td>
                <td>:</td>
                <td><input class="form-control" name="tanggal" type="date" required="required" placeholder=" Tanggal"></td>
              </tr>
              <td><br></td>
               <tr>
              <tr>
                <td><span class="glyphicon glyphicon-time"></span></td>
                <td>:</td>
                <td>
                  <select class="form-control" name="jadwal_service">
                    <option disabled>Jadwal Service</option>
                    <option value="08:00">08:00</option>
                    <option value="09:00">09:00</option>
                    <option value="10:00">10:00</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input class="btn btn-default" type="submit" name="Submit" value="Register"></td>
              </tr>
            </table>
          </td>
        </form>
      </tr>
  </table>

  <br><br><br>

  <!-- Footer -->
  <div class="panel panel-default">
  <div class="panel-footer"><center>Service Bengkel Panggilan</center></div>
  </div>
  </div>
  </body>
</html>