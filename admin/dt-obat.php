<?php
session_start();
if (!isset($_SESSION['admin'])) {
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

    <title>Klinik Mitra Medika Dashboard - Data Obat</title>

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
<h2>Data Obat</h2>&emsp;
                            <a href="tambah-obat">
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
<th>Nama Obat</th>
<th>Stok</th>
<th>Harga</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
        $obat = mysqli_query ($konek, "SELECT * FROM tblobat WHERE id_obat order by id_obat ASC");
            if($obat == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($konek));
                    }
                while ($hasilobat = mysqli_fetch_array ($obat)){                            
                            ?>
<tr>
<td><?php echo $hasilobat['nama_obat']; ?></td>
<td><?php echo $hasilobat['stok_obat']; ?></td>
<td>Rp. <?php echo convertToRupiah($hasilobat['harga_obat']); ?></td>
<td><!-- Single button -->
<div class="input-group-append be-addon">
  <button type="button" data-toggle="dropdown" class="badge btn-default dropdown-toggle">&nbsp;</button>
    <div class="dropdown-menu">
      <a href="edit-obat?id_obat=<?php echo $hasilobat['id_obat']; ?>" class="dropdown-item">Edit</a>
      <a href="hapus-obat?id_obat=<?php echo $hasilobat['id_obat']; ?>" class="dropdown-item" onclick="return confirm('Yakin anda ingin menghapus data ?')">Hapus</a>
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
include("../admin/includes/footer.php");