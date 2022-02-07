<?php
session_start();
if (!isset($_SESSION['apoteker'])) {
  // jika user belum login
  header('Location: ../login?action=login');
  exit();
}
include("../includes/config.php");

$nama_supplier = mysqli_real_escape_string($konek, $_POST['nama_supplier']);
$alamat_supplier = mysqli_real_escape_string($konek, $_POST['alamat_supplier']);
$no_telp = mysqli_real_escape_string($konek, $_POST['no_telp']);

$add = mysqli_query($konek, "INSERT INTO tblsupplier(id_supplier, nama_supplier, alamat_supplier, no_telp) VALUES (NULL,'$nama_supplier', '$alamat_supplier', '$no_telp')");
echo"<script> alert('Data Berhasil Ditambah'); location.href='././dashboard' </script>";
?>