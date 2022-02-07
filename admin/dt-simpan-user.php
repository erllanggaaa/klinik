<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../login?action=login');
  exit();
}
include("../includes/config.php");

$nama_lengkap = mysqli_real_escape_string($konek, $_POST['nama_lengkap']);
$alamat = mysqli_real_escape_string($konek, $_POST['alamat']);
$umur = mysqli_real_escape_string($konek, $_POST['umur']);
$jk = mysqli_real_escape_string($konek, $_POST['jk']);
$no_telp = mysqli_real_escape_string($konek, $_POST['no_telp']);
$username = mysqli_real_escape_string($konek, $_POST['username']);
$password = md5(mysqli_real_escape_string($konek, $_POST['password']));

$add = mysqli_query($konek, "INSERT INTO tbluser(id_user, nama_lengkap, alamat, umur, jk, no_telp, username, password, role, aktif) VALUES (NULL,'$nama_lengkap','$alamat','$umur','$jk','$no_telp','$username','$password','Admin','Y')");
echo"<script> alert('Data Berhasil Ditambah'); location.href='././dashboard' </script>";

?>