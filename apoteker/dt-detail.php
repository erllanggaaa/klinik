<?php
session_start();
if (!isset($_SESSION['apoteker'])) {
  // jika user belum login
  header('Location: ../login?action=login');
  exit();
}

include("../includes/config.php");
function convertToRupiah($convertToRupiah)
{
  return number_format($convertToRupiah,0,',','.');
}
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

    <title>Klinik Mitra Medika Dashboard - Detail Pembayaran</title>

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

    <link rel="stylesheet" href="../assets/build/css/select2.min.css">

    <script>
        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
    </script>
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

        <div class="right_col" role="main">
<?php
$id = $_GET['id_pembayaran'];
$querytampilprofil = mysqli_query($konek, "SELECT tblrekammedis.id_rekammedis, tblrekammedis.tgl_periksa, tblrekammedis.obat_1, tblrekammedis.obat_2, tblrekammedis.obat_3, tblrekammedis.obat_4, tblrekammedis.obat_5, tblrekammedis.keterangan, tbluser.nama_lengkap, tbldokter.nama_dokter, tblpembayaran.id_pembayaran, tblpembayaran.status, tblpembayaran.tgl_pembayaran, tblpembayaran.total_bayar FROM tblrekammedis
          INNER JOIN tbluser ON tblrekammedis.id_user = tbluser.id_user
          INNER JOIN tbldokter ON tblrekammedis.id_dokter = tbldokter.id_user
          INNER JOIN tblpembayaran ON tblrekammedis.id_rekammedis = tblpembayaran.id_rekammedis
          WHERE tblpembayaran.id_pembayaran = '$id'");
if($querytampilprofil == false){
    die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
$hasilin = mysqli_fetch_array($querytampilprofil);
?>
<div class="row">
<div class="col-md-12 col-sm-12 ">
<div class="x_panel">
<div class="x_title">
<h2>Detail</h2>
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
<button onclick="goBack()">Back</button>
  <div class="table table-striped first">
                                <table>
                                    <thead>
                            <tr>
                                <th colspan="2">Nama Pasien</th>
                                <th>:&emsp;<?=$hasilin['nama_lengkap'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">Dokter Pemeriksa</th>
                                <th>:&emsp;Dr. <?=$hasilin['nama_dokter'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">Tanggal Periksa</th>
                                <th>:&emsp;<?=$hasilin['tgl_periksa'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">Resep Obat</th>
                                <th>:&emsp;<?php if ($hasilin['obat_1']): ?>
<?php echo $hasilin['obat_1']; ?>
<?php endif; ?>

<?php if ($hasilin['obat_2']): ?>
 , <?php echo $hasilin['obat_2']; ?>
<?php endif; ?>

<?php if ($hasilin['obat_3']): ?>
 , <?php echo $hasilin['obat_3']; ?>
<?php endif; ?>

<?php if ($hasilin['obat_4']): ?>
 , <?php echo $hasilin['obat_4']; ?>
<?php endif; ?>

<?php if ($hasilin['obat_5']): ?>
 , 5.<?php echo $hasilin['obat_5']; ?>
<?php endif; ?></th>
                            </tr>
                            <tr>
                                <th colspan="2">Keterangan</th>
                                <th>:&emsp;<?=$hasilin['keterangan'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">Pembayaran</th>
                                <th>:&emsp;<?=$hasilin['status'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">Tanggal Pembayaran</th>
                                <th>:&emsp;<?=$hasilin['tgl_pembayaran'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">Total Bayar</th>
                                <th>:&emsp;Rp. <?php echo convertToRupiah($hasilin['total_bayar']);?></th>
                            </tr>
                            </thead>
                                </table>
                                </div>

</div>
</div>
</div>
</div>


              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<script>
    function goBack() {
        window.history.back();
    }
</script>
<?php
include("../apoteker/includes/footer.php");