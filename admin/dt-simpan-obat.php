<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../login?action=login');
  exit();
}
include("../includes/config.php");

$nama_obat = mysqli_real_escape_string($konek, $_POST['nama_obat']);
$stok_obat = mysqli_real_escape_string($konek, $_POST['stok_obat']);
$harga_obat = mysqli_real_escape_string($konek, $_POST['harga_obat']);

$add = mysqli_query($konek, "INSERT INTO tblobat(id_obat, nama_obat, stok_obat, harga_obat) VALUES (NULL,'$nama_obat', '$stok_obat', '$harga_obat')");
echo"<script> alert('Data Berhasil Ditambah'); location.href='././dashboard' </script>";
?>