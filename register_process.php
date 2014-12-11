<?php
INCLUDE('connection.php');

$no_ktp = $_POST['no_ktp'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$password = $_POST['password'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
$hak = 'customer';

$query = mysql_query("INSERT INTO customer VALUES('$no_ktp', '$nama', '$alamat', '$username', '$password', '$telepon', '$email', '$hak')") or die(mysql_error());

if ($query) {
	header('location:register.php?message=success');
}
?>