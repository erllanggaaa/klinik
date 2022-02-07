<?php
session_start();
if (!isset($_SESSION['apoteker'])) {
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

    <title>Klinik Mitra Medika Dashboard</title>

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
              <a href="../apoteker/dashboard" class="site_title"><span>Klinik Mitra Medika</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <?php
            include("../apoteker/includes/sidebar_menu.php");
            ?>

            
          </div>
        </div>

        <?php
        include("../apoteker/includes/top_navigation.php");
        ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-group"></i> Total Pasien</span>
              <div class="count">
                <?php 
                $query = mysqli_query($konek,"SELECT * FROM tbluser WHERE role='Pasien'");
                $count = mysqli_num_rows($query);
                echo $count;
                ?>
              </div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user-md"></i> Total Dokter</span>
              <div class="count">
                <?php 
                $query = mysqli_query($konek,"SELECT * FROM tbluser WHERE role='Dokter'");
                $count = mysqli_num_rows($query);
                echo $count;
                ?>
              </div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-plus-square"></i> Total Apoteker</span>
              <div class="count">
                <?php 
                $query = mysqli_query($konek,"SELECT * FROM tbluser WHERE role='Apoteker'");
                $count = mysqli_num_rows($query);
                echo $count;
                ?>
              </div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-cube"></i> Total Obat</span>
              <div class="count">
                <?php 
                $query = mysqli_query($konek,"SELECT * FROM tblobat WHERE id_obat");
                $count = mysqli_num_rows($query);
                echo $count;
                ?>
              </div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-code-fork"></i> Total Rekam Medis</span>
              <div class="count">
                <?php 
                $query = mysqli_query($konek,"SELECT * FROM tblrekammedis WHERE id_rekammedis");
                $count = mysqli_num_rows($query);
                echo $count;
                ?>
              </div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Admin</span>
              <div class="count">
                <?php 
                $query = mysqli_query($konek,"SELECT * FROM tbluser WHERE role='Admin'");
                $count = mysqli_num_rows($query);
                echo $count;
                ?>
              </div>
            </div>
          </div>
        </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row">
                  <div class="col-md-12">
              <h2 align="center">SELAMAT DATANG DI KLINIK MITRA MEDIKA DASHBOARD</h2>

                </div>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>


              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php
include("../apoteker/includes/footer.php");