<?php
session_start();
if (!isset($_SESSION['dokter'])) {
  // jika user belum login
  header('Location: ../login?action=login');
  exit();
}
include("../includes/config.php");
date_default_timezone_set('Asia/Jakarta');

$id_rekammedis = mysqli_real_escape_string($konek, $_POST['id_rekammedis'])+1;
$id_user = mysqli_real_escape_string($konek, $_POST['id_user']);
$id_dokter = mysqli_real_escape_string($konek, $_POST['id_dokter']);
$tgl_periksa = date("Y-m-d H:i:s");
$obat_1 = !empty($_POST['obat_2']) ? $_POST['obat_2'] : '';
$obat_2 = !empty($_POST['obat_2']) ? $_POST['obat_2'] : '';
$obat_3 = !empty($_POST['obat_3']) ? $_POST['obat_3'] : '';
$obat_4 = !empty($_POST['obat_4']) ? $_POST['obat_4'] : '';
$obat_5 = !empty($_POST['obat_5']) ? $_POST['obat_5'] : '';
$keterangan = mysqli_real_escape_string($konek, $_POST['keterangan']);

if ($add = mysqli_query($konek, "INSERT INTO tblrekammedis(id_rekammedis, id_user, id_dokter, tgl_periksa, obat_1, obat_2, obat_3, obat_4, obat_5, keterangan) VALUES (NULL,'$id_user', '$id_dokter', '$tgl_periksa', '$obat_1', '$obat_2', '$obat_3','$obat_4','$obat_5','$keterangan')")){
	if($add){
		$addstock = mysqli_query($konek, "INSERT INTO tblpembayaran(id_pembayaran, id_rekammedis, status) VALUES (NULL,'$id_rekammedis','Belum Lunas')");
		echo "<script> alert('Data Berhasil Ditambah'); location.href='././dashboard' </script>";
		exit();
	}
		
	}
die ("<script> alert('Data Gagal Ditambah Karena Sudah Ada'); location.href='././dashboard' </script>". mysqli_error($konek));
?>