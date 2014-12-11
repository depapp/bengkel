<?php
INCLUDE('connection.php');

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tgl_pesan = date("Y-m-d");
$no_stnk = $_POST['no_stnk'];
$no_plat = $_POST['no_plat'];
$jenis_kendaraan = $_POST['jenis_kendaraan'];
$jenis_service = $_POST['jenis_service'];
$tanggal = $_POST['tanggal'];
$jadwal_service = $_POST['jadwal_service'];

if ($_POST['jenis_service']=='Service Kecil') {
	$harga = '250000';
} elseif ($_POST['jenis_service']=='Service Besar') {
	$harga = '500000';
} else {
	$harga = '750000';
}


if ($_POST['jenis_service']=='Service Kecil') {
	$nilaiservicekecil = mysql_query("select service_kecil from stok");
	$data1 = mysql_fetch_array($nilaiservicekecil);
	$hasil1 = $data1['service_kecil'] - 1;
	mysql_query("update stok set service_kecil=($hasil1)") or die(mysql_error());

} elseif ($_POST['jenis_service']=='Service Besar') {
	$nilaiservicebesar = mysql_query("select service_besar from stok");
	$data2 = mysql_fetch_array($nilaiservicebesar);
	$hasil2 = $data2['service_besar'] - 1;
	mysql_query("update stok set service_besar=($hasil2)") or die(mysql_error());

} else {
	$nilaifullservice = mysql_query("select full_service from stok");
	$data3 = mysql_fetch_array($nilaifullservice);
	$hasil3 = $data3['full_service'] - 1;
	mysql_query("update stok set full_service=($hasil3)") or die(mysql_error());
}


if (strtotime($tanggal) <= strtotime($tgl_pesan)) {
	header('location:pemesanan.php?message=failed');
} else {
		$query = mysql_query("INSERT INTO data_service VALUES('', '$nama', '$alamat', '$tgl_pesan', '$no_stnk', '$no_plat', '$jenis_kendaraan', '$jenis_service', '$tanggal', '$jadwal_service', '$harga', '$total')") or die(mysql_error());
		if ($query)
		{
			header('location:pemesanan.php?message=success');
		}
}

?>