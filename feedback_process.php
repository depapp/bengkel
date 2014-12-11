<?php
INCLUDE('connection.php');

$nama = $_POST['nama'];
$pelayanan = $_POST['pelayanan'];
$waktu = $_POST['waktu'];
$kepuasan = $_POST['kepuasan'];

$query = mysql_query("INSERT INTO feedback VALUES('', '$nama', '$pelayanan', '$waktu', '$kepuasan')") or die(mysql_error());
if ($query)
{
	header('location:pemesanan.php?message=feedback');
}

?>