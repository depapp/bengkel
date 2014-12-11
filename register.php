<?php
session_start();

if (isset($_SESSION['username'])) {
header('location:index_customer.php');
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
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
    <li class="active"><a href="">Register</a></li>
  </ul>
  </div>
  
  </div>
  </nav>

  <!-- Home Contents -->
  <!-- Banner Gambar -->
  <br><img src="images/banner.jpg" class="img-responsive center-block" alt="Responsive image"><br>

  <!-- Sukses Daftar -->
  <?php 
    if (!empty($_GET['message']) && $_GET['message'] == 'success') {
       echo '<div class="alert alert-success" role="alert">';
       echo '<center><h2>Berhasil Registrasi. Silahkan Login!</h2></center>';
       echo '</div>';
    }
  ?>

  <!-- Form Input -->
  <center><h2>Silahkan Lengkapi Form Pendaftaran</h2></center>
  <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr>
        <form name="form1" method="post" action="register_process.php">
          <td>
            <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
              <br>
              <tr>
                <td width="45"><span class="glyphicon glyphicon-user"></span></td>
                <td width="25">:</td>
                <td width="300"><input class="form-control" name="nama" type="text" required="required" placeholder=" Nama"></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <td><span class="glyphicon glyphicon-home"></span></td>
                <td>:</td>
                <td><input class="form-control" name="alamat" type="text" required="required" placeholder=" Alamat"></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <td><span class="glyphicon glyphicon-credit-card"></span></td>
                <td>:</td>
                <td><input class="form-control" name="no_ktp" type="number" required="required" placeholder=" No KTP"></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <td><span class="glyphicon glyphicon-phone-alt"></span></td>
                <td>:</td>
                <td><input class="form-control" name="telepon" type="number" required="required" placeholder=" No Telepon"></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <td><span class="glyphicon glyphicon-envelope"></span></td>
                <td>:</td>
                <td><input class="form-control" name="email" type="email" required="required" placeholder=" E-Mail"></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <td><span class="glyphicon glyphicon-user"></td>
                <td>:</td>
                <td><input class="form-control" name="username" type="text" required="required" placeholder=" Username"></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <td><span class="glyphicon glyphicon-lock"></td>
                <td>:</td>
                <td><input class="form-control" name="password" type="password" required="required" placeholder=" Password"></td>
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