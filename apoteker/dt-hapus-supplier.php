<?php
session_start();
if (!isset($_SESSION['apoteker'])) {
  // jika user belum login
  header('Location: ../login?action=login');
  exit();
}

include("../includes/config.php");

if($delete = mysqli_query ($konek, "DELETE from tblsupplier WHERE id_supplier = '".$_GET['id_supplier']."'")){
    echo "<script> alert('Data Berhasil Dihapus!'); location.href='././dashboard' </script>";
    exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>