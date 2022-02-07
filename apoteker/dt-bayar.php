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

    <title>Klinik Mitra Medika Dashboard - Bayar</title>

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
$querytampilprofil = mysqli_query($konek, "SELECT tblpembayaran.id_pembayaran, tblrekammedis.obat_1, tblrekammedis.obat_2, tblrekammedis.obat_3, tblrekammedis.obat_4, tblrekammedis.obat_5 FROM tblpembayaran INNER JOIN tblrekammedis ON tblpembayaran.id_rekammedis = tblrekammedis.id_rekammedis WHERE tblpembayaran.id_pembayaran = '$id'");
if($querytampilprofil == false){
    die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
$hasilin = mysqli_fetch_array($querytampilprofil);
?>
<div class="row">
<div class="col-md-12 col-sm-12 ">
<div class="x_panel">
<div class="x_title">
<h2>Bayar</h2>
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
LIST HARGA OBAT
<select class="form-control select2">
                        <option selected disabled='disabled' value=''>-- Harga Obat --</option>
                        <?php
                $obat="select * from tblobat where id_obat";
                $y=mysqli_query($konek,$obat);
                while($z=mysqli_fetch_array($y)){
                ?>
                <option><?php echo $z['nama_obat']; ?> (<?php echo convertToRupiah($z['harga_obat']); ?>)</option>
                  <?php
                }
                ?>
                    </select><br>
                    <br/>
<div class="item form-group">
<label class="col-form-label col-md-2 col-sm-2 label-align">Obat Pasien
</label>
<div class="col-md-5 col-sm-5 ">
<?php if ($hasilin['obat_1']): ?>
1. <?php echo $hasilin['obat_1']; ?>
<?php endif; ?>

<?php if ($hasilin['obat_2']): ?>
<br>2.<?php echo $hasilin['obat_2']; ?>
<?php endif; ?>

<?php if ($hasilin['obat_3']): ?>
<br>3.<?php echo $hasilin['obat_3']; ?>
<?php endif; ?>

<?php if ($hasilin['obat_4']): ?>
<br>4.<?php echo $hasilin['obat_4']; ?>
<?php endif; ?>

<?php if ($hasilin['obat_5']): ?>
<br>5.<?php echo $hasilin['obat_5']; ?>
<?php endif; ?>
</div>
</div>
<form action="simpan-bayar" method="post" data-parsley-validate class="form-horizontal form-label-left">
<div class="item form-group">
<label class="col-form-label col-md-2 col-sm-2 label-align">Total Harga Bayar <span class="required text-danger">*</span>
</label>
<div class="col-md-5 col-sm-5 ">
<input type="hidden" required="required" name="id_pembayaran" class="form-control" value="<?php echo $hasilin['id_pembayaran']; ?>" autocomplete="off">
<input type="text" required="required" name="total_bayar" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="" autocomplete="off"><br>
</div>
</div>
<div class="item form-group">
<div class="col-md-5 col-sm-5 ">
<b>Catatan :<br>Total harga masih dihitung secara manual pakai kalkulator yang ada.</b>
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
include("../apoteker/includes/footer.php");