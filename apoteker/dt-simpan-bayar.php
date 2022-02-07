<?php
session_start();
if (!isset($_SESSION['apoteker'])) {
  // jika user belum login
  header('Location: ../login?action=login');
  exit();
}
include("../includes/config.php");
date_default_timezone_set('Asia/Jakarta');

$total_bayar = mysqli_real_escape_string($konek, $_POST['total_bayar']);
$tgl_pembayaran = date("Y-m-d H:i:s");

$query = "UPDATE tblpembayaran SET tgl_pembayaran = '$tgl_pembayaran', total_bayar = '$total_bayar', status = 'Lunas' WHERE id_pembayaran = '".$_POST['id_pembayaran']."'";

$hasil = mysqli_query($konek, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Berhasil Dibayar!'); window.location.href='././dashboard'</script>";
} else {
  echo "<script>window.alert('Gagal Dibayar!'); window.location.href='././dashboard'</script>";
}
?>