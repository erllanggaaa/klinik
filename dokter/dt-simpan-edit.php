<?php
session_start();
if (!isset($_SESSION['dokter'])) {
  // jika user belum login
  header('Location: ../login?action=login');
  exit();
}
include("../includes/config.php");

$obat_1 = mysqli_real_escape_string($konek, $_POST['obat_1']);
$obat_2 = mysqli_real_escape_string($konek, $_POST['obat_2']);
$obat_3 = mysqli_real_escape_string($konek, $_POST['obat_3']);
$obat_4 = mysqli_real_escape_string($konek, $_POST['obat_4']);
$obat_5 = mysqli_real_escape_string($konek, $_POST['obat_5']);
$keterangan = mysqli_real_escape_string($konek, $_POST['keterangan']);

$query = "UPDATE tblrekammedis SET obat_1 = '$obat_1', obat_2 = '$obat_2', obat_3 = '$obat_3', obat_4 = '$obat_4', obat_5 = '$obat_5', keterangan = '$keterangan' WHERE id_rekammedis = '".$_POST['id_rekammedis']."'";

$hasil = mysqli_query($konek, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data Berhasil Diedit'); window.location.href='././dashboard'</script>";
} else {
  echo "<script>window.alert('Data Gagal Diedit!'); window.location.href='././dashboard'</script>";
}
?>