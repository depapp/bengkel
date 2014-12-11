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
$query = mysql_query("SELECT nama FROM customer WHERE username='$username'") or die(mysql_error()); 
$data = mysql_fetch_array($query);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Feedback - <?php echo $_SESSION['username']; ?></title>
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
    

  <!-- Menu -->

  <center>
  <div class="alert alert-danger" role="alert">
  <h2>Apakah Anda Puas Dengan Pelayan Kami?</h2>
  </div>
  </center>
  <!-- Keterangan Service -->
  <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-sm">Keterangan Pengisian Feedback</button>
  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
  <div class="modal-content">
  <center><b>Tingkat Pelayanan : </b></center>
  <ul> 
  <span class="glyphicon glyphicon-heart"></span><span class="glyphicon glyphicon-heart"></span><span class="glyphicon glyphicon-heart"></span> : Baik<br>
  <span class="glyphicon glyphicon-heart"></span><span class="glyphicon glyphicon-heart"></span> : Sedang<br>
  <span class="glyphicon glyphicon-heart"></span> : Buruk
  </ul>
  <br>
  <center><b>Tingkat Ketepatan Waktu : </b></center>
  <ul> 
  <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> : Tepat Waktu<br>
  <span class="glyphicon glyphicon-star"></span> : Tidak tepat Waktu<br>
  </ul>
  <br>
  <center><b>Tingkat Kepuasan : </b></center>
  <ul> 
  <span class="glyphicon glyphicon-star-empty"></span><span class="glyphicon glyphicon-star-empty"></span><span class="glyphicon glyphicon-star-empty"></span> : Sangat Puas<br>
  <span class="glyphicon glyphicon-star-empty"></span><span class="glyphicon glyphicon-star-empty"></span> : Puas<br>
  <span class="glyphicon glyphicon-star-empty"></span> : Tidak Puas
  </ul>
  </div>
  </div>
  </div>
  

  <table width="350" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr>
        <form name="form_pemesanan" method="post" action="feedback_process.php">
          <td>
            <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
              <br>
              <tr>
                <td>&nbsp;</td>
                <td><input class="form-control" name="nama" type="text" required="required" value=" <?php echo $data['nama']; ?>"></td>
                <td></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><center><h4>Tingkat Pelayanan</h4></center></td>
                <td></td>
              </tr>
              <tr>
                <td width="40"></td>
                <td width="30">
                  <input type="radio" name="pelayanan" value="Baik" required="required"> <span class="glyphicon glyphicon-heart"></span><span class="glyphicon glyphicon-heart"></span><span class="glyphicon glyphicon-heart"></span>
                  <br>
                  <input type="radio" name="pelayanan" value="Sedang" required="required"> <span class="glyphicon glyphicon-heart"></span><span class="glyphicon glyphicon-heart"></span>
                  <br>
                  <input type="radio" name="pelayanan" value="Buruk" required="required"> <span class="glyphicon glyphicon-heart"></span>
                  <hr>
                </td>
                <td width="3"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><center><h4>Tingkat Ketepatan Waktu</h4></center></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <input type="radio" name="waktu" value="Tepat Waktu" required="required"> <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>
                  <br>
                  <input type="radio" name="waktu" value="Tidak Tepat Waktu" required="required"> <span class="glyphicon glyphicon-star"></span>
                  <hr>
                </td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><center><h4>Tingkat Kepuasan</h4></center></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <input type="radio" name="kepuasan" value="Sangat Puas" required="required"> <span class="glyphicon glyphicon-star-empty"></span><span class="glyphicon glyphicon-star-empty"></span><span class="glyphicon glyphicon-star-empty"></span>
                  <br>
                  <input type="radio" name="kepuasan" value="Puas" required="required"> <span class="glyphicon glyphicon-star-empty"></span><span class="glyphicon glyphicon-star-empty"></span>
                  <br>
                  <input type="radio" name="kepuasan" value="Tidak Puas" required="required"> <span class="glyphicon glyphicon-star-empty"></span>
                </td>
                <td></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <td></td>
                <td><center><input class="btn btn-default" type="submit" name="Submit" value="Submit"></center></td>
                <td></td>
              </tr>
            </table>
          </td>
        </form>
      </tr>
  </table>

  </div>

  <br><br><br>

  <!-- Footer -->
  <div class="panel panel-default">
  <div class="panel-footer"><center>Service Bengkel Panggilan</center></div>
  </div>
  </div>
  </body>
</html>