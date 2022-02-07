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

$query = "UPDATE tblsupplier SET nama_supplier = '$nama_supplier', alamat_supplier = '$alamat_supplier', no_telp = '$no_telp' WHERE id_supplier = '".$_POST['id_supplier']."'";

$hasil = mysqli_query($konek, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data Berhasil Diedit'); window.location.href='././dashboard'</script>";
} else {
  echo "<script>window.alert('Data Gagal Diedit!'); window.location.href='././dashboard'</script>";
}
?>