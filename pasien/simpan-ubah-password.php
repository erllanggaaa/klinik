<?php
session_start();
if (!isset($_SESSION['pasien'])) {
  // jika user belum login
  header('Location: ../login?action=login');
  exit();
}
include("../includes/config.php");

$id = $_SESSION['pasien']['id_user'];
$sqlcekpass = mysqli_query($konek, "SELECT password FROM tbluser WHERE id_user = '$id'");
$hasilcekpass = mysqli_fetch_array($sqlcekpass);
if(md5($_POST['passlama']) != $hasilcekpass['password']){
	echo '<script> alert("Password Lama Salah"); location.href="ubah-password" </script>';
	exit;	
}else{
	$update = mysqli_query($konek, "UPDATE tbluser SET password='".md5($_POST['passbaru'])."' WHERE id_user = '$id'");
		if($update){
			echo '<script> alert("Password Berhasil Diubah"); location.href="././logout" </script>';
			exit;
		}
}
?>