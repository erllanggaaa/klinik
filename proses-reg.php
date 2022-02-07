<?php
include 'includes/config.php';

// ambil data dari form
$nama_lengkap = mysqli_real_escape_string($konek, $_POST['nama_lengkap']);
$alamat = mysqli_real_escape_string($konek, $_POST['alamat']);
$umur = mysqli_real_escape_string($konek, $_POST['umur']);
$jk = mysqli_real_escape_string($konek, $_POST['jk']);
$username = mysqli_real_escape_string($konek, $_POST['username']);
$password = md5(mysqli_real_escape_string($konek, $_POST['password']));

$add = mysqli_query($konek, "INSERT INTO tbluser(id_user, nama_lengkap, alamat, umur, jk, username, password, role, aktif) VALUES (NULL,'$nama_lengkap', '$alamat', '$umur',  '$jk', '$username', '$password', 'Pasien', 'Y')");
header ("Location: ./login?action=reg-success");
?>