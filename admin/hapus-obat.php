<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../login?action=login');
  exit();
}

include("../includes/config.php");

if($delete = mysqli_query ($konek, "DELETE from tblobat WHERE id_obat = '".$_GET['id_obat']."'")){
    echo "<script> alert('Data Berhasil Dihapus!'); location.href='././dashboard' </script>";
    exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>