<?php
INCLUDE('connection.php');

$id_stok = $_POST['id_stok'];
$service_kecil = $_POST['service_kecil'];
$service_besar = $_POST['service_besar'];
$full_service = $_POST['full_service'];

$query = mysql_query("update stok set service_kecil='$service_kecil', service_besar='$service_besar', full_service='$full_service' where id_stok='$id_stok'") or die(mysql_error());

if ($query) {
	header('location:index_adminbarang.php');
}
?>