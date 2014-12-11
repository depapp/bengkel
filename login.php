<?php
session_start();

if (isset($_SESSION['username'])) {
header('location:index_customer.php');
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="all">
    <script src="js/bootstrap.js"></script>

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
    <li class="active"><a href="">Login</a></li>
    <li><a href="register.php">Register</a></li>
  </ul>
  </div>
  
  </div>
  </nav>

  <!-- Home Contents -->
  <!-- Banner Gambar -->
  <br><img src="images/banner.jpg" class="img-responsive center-block" alt="Responsive image"><br>

  <!-- Gagal Login -->
  <?php 
    if (!empty($_GET['message']) && $_GET['message'] == 'failed') {
       echo '<div class="alert alert-danger" role="alert">';
       echo '<center><h2>Gagal Login. Silahkan Login Kembali!</h2></center>';
       echo '</div>';
    }
  ?>

  <!-- Form Input -->
  <center><h2>Silahkan Login Terlebih Dahulu</h2></center>
  <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr>
        <form name="form1" method="post" action="login_process.php">
          <td>
            <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
              <br>
              <tr>
                <td width="45"><span class="glyphicon glyphicon-user"></span></td>
                <td width="25">:</td>
                <td width="300"><input class="form-control" name="username" type="text" required="required" placeholder=" Username"></td>
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
                <td><input class="btn btn-default" type="submit" name="Submit" value="Login"></td>
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