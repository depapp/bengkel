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

<?php
$id_stok = $_GET['id_stok'];
$query = mysql_query("select * from stok where id_stok='$id_stok'") or die(mysql_error());
$data = mysql_fetch_array($query);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Edit Stok - <?php echo $_SESSION['username']; ?></title>
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

  <!-- Form Input -->
  <center><h2>Update Stok Barang</h2></center>
  <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr>
        <form name="form1" method="post" action="input_stok_process.php">
          <input type="hidden" name="id_stok" value="<?php echo $id_stok; ?>" />
          <td>
            <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
              <br>
              <tr>
                <td width="200">Service Kecil</span></td>
                <td width="25">:</td>
                <td width="300"><input class="form-control" name="service_kecil" type="text" required="required" value=" <?php echo $data['service_kecil']; ?>"></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <td>Service Besar</span></td>
                <td>:</td>
                <td><input class="form-control" name="service_besar" type="text" required="required" value=" <?php echo $data['service_besar']; ?>"></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <td>Full Service</span></td>
                <td>:</td>
                <td><input class="form-control" name="full_service" type="text" required="required" value=" <?php echo $data['full_service']; ?>"></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input class="btn btn-default" type="submit" name="Submit" value="Update Stok"></td>
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