<?php 
// mengaktifkan session pada php
session_start();
include 'includes/config.php';

// ambil data
$username = mysqli_real_escape_string($konek, $_POST['username']);
$password = md5(mysqli_real_escape_string($konek, $_POST['password']));


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($konek,"select * from tbluser where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$queryuser = mysqli_query ($konek, "SELECT * FROM tbluser WHERE username='$username'");
	$data = mysqli_fetch_array ($queryuser);

	if($data["role"] == 'Admin' && $data["aktif"] == 'Y'){

		$_SESSION['admin'] 			= $data;
		$_SESSION["id_user"]		= $data["id_user"];
		$_SESSION["username"] 		= $data["username"];
		$_SESSION["nama_lengkap"] 	= $data["nama_lengkap"];
		$_SESSION["role"] 			= $data["role"];
		
		header("location: ./admin/dashboard");
		exit();

	}else if($data["role"] == 'Dokter' && $data["aktif"] == 'Y'){

		$_SESSION['dokter'] 		= $data;
		$_SESSION["id_user"]		= $data["id_user"];
		$_SESSION["username"] 		= $data["username"];
		$_SESSION["nama_lengkap"] 	= $data["nama_lengkap"];
		$_SESSION["role"] 			= $data["role"];
		
		header("location: ./dokter/dashboard");
		exit();

	}else if($data["role"] == 'Apoteker' && $data["aktif"] == 'Y'){

		$_SESSION['apoteker'] 		= $data;
		$_SESSION["id_user"]		= $data["id_user"];
		$_SESSION["username"] 		= $data["username"];
		$_SESSION["nama_lengkap"] 	= $data["nama_lengkap"];
		$_SESSION["role"] 			= $data["role"];
		
		header("location: ./apoteker/dashboard");
		exit();

	}else if($data["role"] == 'Pasien' && $data["aktif"] == 'Y'){

		$_SESSION['pasien'] 		= $data;
		$_SESSION["id_user"]		= $data["id_user"];
		$_SESSION["username"] 		= $data["username"];
		$_SESSION["nama_lengkap"] 	= $data["nama_lengkap"];
		$_SESSION["role"] 			= $data["role"];
		
		header("location: ./pasien/dashboard");
		exit();


}else{

		header("location: ./login?action=failed");
	}

}else{
	header("location: ./login?action=failed");
}
?>