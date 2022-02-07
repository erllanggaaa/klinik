<?php
session_start();
if (!isset($_SESSION['dokter'])) {
  // jika user belum login
  header('Location: ../login?action=login');
  exit();
}

include("../includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../assets/images/favicon.png" />

    <title>Klinik Mitra Medika Dashboard - Ubah Password</title>

    <!-- Bootstrap -->
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../dokter/dashboard" class="site_title"><span>Klinik Mitra Medika</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <?php
            include("../dokter/includes/sidebar_menu.php");
            ?>

            
          </div>
        </div>

        <?php
        include("../dokter/includes/top_navigation.php");
        ?>

        <div class="right_col" role="main">
<?php
$id = $_SESSION['dokter']['id_user'];
$querytampilprofil = mysqli_query($konek, "SELECT * FROM tbluser WHERE id_user = '$id'");
if($querytampilprofil == false){
    die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
$hasilin = mysqli_fetch_array($querytampilprofil);
?>
<div class="row">
<div class="col-md-12 col-sm-12 ">
<div class="x_panel">
<div class="x_title">
<h2>Ubah Password</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<ul class="dropdown-menu" role="menu">
</ul>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<br />
<form action="simpan-ubah-password" method="post" data-parsley-validate class="form-horizontal form-label-left">
<div class="item form-group">
<label class="col-form-label col-md-3 col-sm-3 label-align">Password Lama <span class="required text-danger">*</span>
</label>
<div class="col-md-6 col-sm-6 ">
<input type="password" required="required" name="passlama" class="form-control ">
</div>
</div>
<div class="item form-group">
<label class="col-form-label col-md-3 col-sm-3 label-align">Password Baru <span class="required text-danger">*</span>
</label>
<div class="col-md-6 col-sm-6 ">
<input type="password" name="passbaru" required="required" class="form-control">
</div>
</div>
<div class="ln_solid"></div>
<div class="item form-group">
<div class="col-md-6 col-sm-6 offset-md-3">
<input class="btn btn-primary" type="reset" value="Reset">
<input type="submit" class="btn btn-success" value="Simpan">
</div>
</div>
</form>
</div>
</div>
</div>
</div>


              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php
include("../dokter/includes/footer.php");