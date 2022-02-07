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

    <title>Klinik Mitra Medika Dashboard - Data Dokter</title>

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
<h2>Data Dokter</h2>&emsp;
                            <a href="tambah-dokter">
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
<th>Nama Lengkap</th>
<th>Alamat</th>
<th>Umur</th>
<th>Jenis Kelamin</th>
<th>No. Telp</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
        $dokter = mysqli_query ($konek, "SELECT tbluser.*, tbldokter.id_user FROM tbluser
inner join tbldokter on tbldokter.id_user = tbluser.id_user");
            if($dokter == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($konek));
                    }
                while ($hasildokter = mysqli_fetch_array ($dokter)){                            
                            ?>
<tr>
<td>Dr. <?php echo $hasildokter['nama_lengkap']; ?></td>
<td><?php echo $hasildokter['alamat']; ?></td>
<td><?php echo $hasildokter['umur']; ?></td>
<td><?php echo $hasildokter['jk']; ?></td>
<td><?php echo $hasildokter['no_telp']; ?></td>
<td><!-- Single button -->
<div class="input-group-append be-addon">
  <button type="button" data-toggle="dropdown" class="badge btn-default dropdown-toggle">&nbsp;</button>
    <div class="dropdown-menu">
      <a href="edit?id_user=<?php echo $hasildokter['id_user']; ?>" class="dropdown-item">Edit</a>
      <a href="hapus?id_user=<?php echo $hasildokter['id_user']; ?>" class="dropdown-item" onclick="return confirm('Yakin anda ingin menghapus data ?')">Hapus</a>
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