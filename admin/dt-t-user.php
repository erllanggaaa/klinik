<?php
session_start();
if (!isset($_SESSION['admin'])) {
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

    <title>Klinik Mitra Medika Dashboard - Tambah Data Admin</title>

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
              <a href="../admin/dashboard" class="site_title"><span>Klinik Mitra Medika</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <?php
            include("../admin/includes/sidebar_menu.php");
            ?>

            
          </div>
        </div>

        <?php
        include("../admin/includes/top_navigation.php");
        ?>

        <div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 ">
<div class="x_panel">
<div class="x_title">
<h2>Tambah</h2>
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
<form action="simpan-admin" method="post" data-parsley-validate class="form-horizontal form-label-left">
<div class="item form-group">
<label class="col-form-label col-md-2 col-sm-2 label-align">Nama Lengkap <span class="required text-danger">*</span>
</label>
<div class="col-md-5 col-sm-5 ">
<input type="text" required="required" name="nama_lengkap" class="form-control" autocomplete="off">
</div>
</div>
<div class="item form-group">
<label class="col-form-label col-md-2 col-sm-2 label-align">Alamat <span class="required text-danger">*</span>
</label>
<div class="col-md-5 col-sm-5 ">
<textarea name="alamat" required="required" class="form-control" autocomplete="off"></textarea>
</div>
</div>
<div class="item form-group">
<label class="col-form-label col-md-2 col-sm-2 label-align">Umur <span class="required text-danger">*</span>
</label>
<div class="col-md-5 col-sm-5 ">
<input type="text" name="umur" required="required" class="form-control" autocomplete="off">
</div>
</div>
<div class="item form-group">
<label class="col-form-label col-md-2 col-sm-2 label-align">Jenis Kelamin <span class="required text-danger">*</span>
</label>
<div class="col-md-5 col-sm-5 ">
<select name="jk" class="form-control" required>
    <option selected value='' disabled>Pilih Jenis Kelamin</option>
    <option value='Laki-Laki'>Laki-Laki</option>
    <option value='Perempuan'>Perempuan</option>
                                        </select>
</div>
</div>
<div class="item form-group">
<label class="col-form-label col-md-2 col-sm-2 label-align">No. Telp <span class="required text-danger">*</span>
</label>
<div class="col-md-5 col-sm-5 ">
<input type="text" name="no_telp" class="form-control" autocomplete="off" required>
</div>
</div>
<div class="item form-group">
<label class="col-form-label col-md-2 col-sm-2 label-align">Username <span class="required text-danger">*</span>
</label>
<div class="col-md-5 col-sm-5 ">
<input type="text" name="username" class="form-control" autocomplete="off" required>
</div>
</div>
<div class="item form-group">
<label class="col-form-label col-md-2 col-sm-2 label-align">Password <span class="required text-danger">*</span>
</label>
<div class="col-md-5 col-sm-5 ">
<input type="password" name="password" class="form-control" autocomplete="off" required>
</div>
</div>
<div class="ln_solid"></div>
<div class="item form-group">
<div class="col-md-5 col-sm-5 offset-md-2">
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
include("../admin/includes/footer.php");