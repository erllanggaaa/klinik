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

    <title>Klinik Mitra Medika Dashboard - Data Supplier</title>

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
<h2>Data Supplier</h2>&emsp;
                            <a href="tambah-supplier">
                            <button class="btn btn-primary">
                        <i class="fa fa-plus"> Tambah</i>
                        </button>
                    </a>
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
<th>Nama Supplier</th>
<th>Alamat Supplier</th>
<th>No. Telp</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
        $supplier = mysqli_query ($konek, "SELECT * FROM tblsupplier WHERE id_supplier");
            if($supplier == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($konek));
                    }
                while ($hasilsup = mysqli_fetch_array ($supplier)){                            
                            ?>
<tr>
<td><?php echo $hasilsup['nama_supplier']; ?></td>
<td><?php echo $hasilsup['alamat_supplier']; ?></td>
<td><?php echo $hasilsup['no_telp']; ?></td>
<td><!-- Single button -->
<div class="input-group-append be-addon">
  <button type="button" data-toggle="dropdown" class="badge btn-default dropdown-toggle">&nbsp;</button>
    <div class="dropdown-menu">
      <a href="edit?id_supplier=<?php echo $hasilsup['id_supplier']; ?>" class="dropdown-item">Edit</a>
      <a href="hapus?id_supplier=<?php echo $hasilrm['id_supplier']; ?>" class="dropdown-item">Hapus</a>
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