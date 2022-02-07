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

    <title>Klinik Mitra Medika Dashboard - Data Pembayaran</title>

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

        <div class="right_col" role="main">
<div class="row">
<div class="col-md-12 col-sm-12 ">
<div class="x_panel">
<div class="x_title">
<h2>Data Pembayaran</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<div class="row">
<div class="col-sm-12">
<div class="card-box table-responsive">
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<th>Pasien</th>
<th>Dokter</th>
<th>Tanggal Periksa</th>
<th>Resep Obat</th>
<th>Keterangan</th>
<th>Pembayaran</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
        $rekammedis = mysqli_query ($konek, "SELECT tblrekammedis.id_rekammedis, tblrekammedis.tgl_periksa, tblrekammedis.obat_1, tblrekammedis.obat_2, tblrekammedis.obat_3, tblrekammedis.obat_4, tblrekammedis.obat_5, tblrekammedis.keterangan, tbluser.nama_lengkap, tbldokter.nama_dokter, tblpembayaran.id_pembayaran, tblpembayaran.status FROM tblrekammedis
          INNER JOIN tbluser ON tblrekammedis.id_user = tbluser.id_user
          INNER JOIN tbldokter ON tblrekammedis.id_dokter = tbldokter.id_user
          INNER JOIN tblpembayaran ON tblrekammedis.id_rekammedis = tblpembayaran.id_rekammedis
          WHERE tblrekammedis.id_dokter AND tblpembayaran.status = 'Belum Lunas' ORDER BY tblrekammedis.id_dokter DESC");
            if($rekammedis == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($konek));
                    }
                while ($hasilrm = mysqli_fetch_array ($rekammedis)){                            
                            ?>
<tr>
<td><?php echo $hasilrm['nama_lengkap']; ?></td>
<td><?php echo $hasilrm['nama_dokter']; ?></td>
<td><?php echo $hasilrm['tgl_periksa']; ?></td>
<td><?php if ($hasilrm['obat_1']): ?>
<?php echo $hasilrm['obat_1']; ?>
<?php endif; ?>

<?php if ($hasilrm['obat_2']): ?>
, <?php echo $hasilrm['obat_2']; ?>
<?php endif; ?>

<?php if ($hasilrm['obat_3']): ?>
, <?php echo $hasilrm['obat_3']; ?>
<?php endif; ?>

<?php if ($hasilrm['obat_4']): ?>
, <?php echo $hasilrm['obat_4']; ?>
<?php endif; ?>

<?php if ($hasilrm['obat_5']): ?>
, <?php echo $hasilrm['obat_5']; ?>
<?php endif; ?>
</td>
<td><?php echo $hasilrm['keterangan']; ?></td>
<td><?php echo $hasilrm['status']; ?></td>
<td><!-- Single button -->
<div class="input-group-append be-addon">
  <button type="button" data-toggle="dropdown" class="badge btn-default dropdown-toggle">&nbsp;</button>
    <div class="dropdown-menu">
      <?php if ($hasilrm['status'] != 'Lunas'): ?>
      <a href="bayar?id_pembayaran=<?php echo $hasilrm['id_pembayaran']; ?>" class="dropdown-item">Bayar</a>
      <?php endif; ?>
      <?php if ($hasilrm['status'] != 'Belum Lunas'): ?>
      <a href="detail?id_pembayaran=<?php echo $hasilrm['id_pembayaran']; ?>" class="dropdown-item">Detail</a>
      <?php endif; ?>
      </div>
    </div></td>
</tr>
<?php
                        }
                    ?>
</tbody>
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
        </div>
        <!-- /page content -->

<?php
include("../apoteker/includes/footer.php");