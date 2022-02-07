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

$query = "UPDATE tblobat SET nama_obat = '$nama_obat', stok_obat = '$stok_obat', harga_obat = '$harga_obat' WHERE id_obat = '".$_POST['id_obat']."'";

$hasil = mysqli_query($konek, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data Berhasil Diedit'); window.location.href='././dashboard'</script>";
} else {
  echo "<script>window.alert('Data Gagal Diedit!'); window.location.href='././dashboard'</script>";
}
?>