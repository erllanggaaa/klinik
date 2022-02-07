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

$query = "UPDATE tbluser SET nama_lengkap = '$nama_lengkap', alamat = '$alamat', umur = '$umur', jk = '$jk' WHERE id_user = '".$_POST['id_user']."'";

$hasil = mysqli_query($konek, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data Berhasil Diedit'); window.location.href='././dashboard'</script>";
} else {
  echo "<script>window.alert('Data Gagal Diedit!'); window.location.href='././dashboard'</script>";
}
?>