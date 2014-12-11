<?php
INCLUDE('connection.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$password'");

if (mysql_num_rows($query) == 1) {
	$ceklogin = mysql_fetch_array($query);
	$_SESSION['username'] = $ceklogin['username'];
	$_SESSION['hak'] = $ceklogin['hak'];
	
	if($ceklogin['hak']=="kasir") {
	header('location:index_adminkasir.php');

	} else if($ceklogin['hak']=="barang"){
			header('location:index_adminbarang.php');

			}

} else {
	header('location:login_admin.php?message=failed');
}
?>