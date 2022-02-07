<?php
session_start();
if (!isset($_SESSION['dokter'])) {
  // jika user belum login
  header('Location: ../login?action=login');
  exit();
}

include("../includes/config.php");
$rm = mysqli_query($konek, "SELECT * FROM tblrekammedis WHERE id_rekammedis ORDER BY id_rekammedis DESC");
$row = mysqli_fetch_array($rm);
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

    <title>Klinik Mitra Medika Dashboard - Tambah Rekam Medis</title>

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
<form action="simpan-rekam-medis" method="post" data-parsley-validate class="form-horizontal form-label-left">
<div class="item form-group">
<label class="col-form-label col-md-2 col-sm-2 label-align">Pasien <span class="required text-danger">*</span>
</label>
<div class="col-md-5 col-sm-5 ">
<input type="hidden" name="id_rekammedis" class="form-control" value="<?php echo $row['id_rekammedis']; ?>" autocomplete="off">
<input type="hidden" name="id_dokter" required="required" class="form-control" value="<?php echo $_SESSION['id_user']; ?>" autocomplete="off">
<select name="id_user" class="form-control select2" required 
                                            oninvalid="this.setCustomValidity('Pilih Pasien !')"
                                            oninput="setCustomValidity('')">
                        <option selected disabled='disabled' value=''>-- Pasien --</option>
                        <?php
                $pasien="select * from tbluser where id_user AND role='Pasien'";
                $y=mysqli_query($konek,$pasien);
                while($z=mysqli_fetch_array($y)){
                echo "
                <option value=\"$z[id_user]\" $pilih>$z[nama_lengkap]</option>";
                }
                ?>
                    </select>
</div>
</div>
<div class="item form-group">
<label class="col-form-label col-md-2 col-sm-2 label-align">Resep Obat <span class="required text-danger">*</span>
</label>
<div class="col-md-5 col-sm-5 ">
<select name="obat_1" class="form-control select2" required 
                                            oninvalid="this.setCustomValidity('Pilih Obat !')"
                                            oninput="setCustomValidity('')">
                        <option selected disabled='disabled' value=''>-- Obat 1 --</option>
                        <?php
                $obat1="select * from tblobat where id_obat";
                $y=mysqli_query($konek,$obat1);
                while($z=mysqli_fetch_array($y)){
                echo "
                <option value=\"$z[nama_obat]\" $pilih>$z[nama_obat]</option>";
                }
                ?>
                    </select><br>
<select name="obat_2" class="form-control select2"
                                            oninvalid="this.setCustomValidity('Pilih Obat !')"
                                            oninput="setCustomValidity('')">
                        <option selected disabled='disabled' value=''>-- Obat 2 --</option>
                        <?php
                $obat2="select * from tblobat where id_obat";
                $y=mysqli_query($konek,$obat2);
                while($z=mysqli_fetch_array($y)){
                echo "
                <option value=\"$z[nama_obat]\" $pilih>$z[nama_obat]</option>";
                }
                ?>
                    </select><br>
<select name="obat_3" class="form-control select2"
                                            oninvalid="this.setCustomValidity('Pilih Obat !')"
                                            oninput="setCustomValidity('')">
                        <option selected disabled='disabled' value=''>-- Obat 3 --</option>
                        <?php
                $obat3="select * from tblobat where id_obat";
                $y=mysqli_query($konek,$obat3);
                while($z=mysqli_fetch_array($y)){
                echo "
                <option value=\"$z[nama_obat]\" $pilih>$z[nama_obat]</option>";
                }
                ?>
                    </select><br>
<select name="obat_4" class="form-control select2"
                                            oninvalid="this.setCustomValidity('Pilih Obat !')"
                                            oninput="setCustomValidity('')">
                        <option selected disabled='disabled' value=''>-- Obat 4 --</option>
                        <?php
                $obat4="select * from tblobat where id_obat";
                $y=mysqli_query($konek,$obat4);
                while($z=mysqli_fetch_array($y)){
                echo "
                <option value=\"$z[nama_obat]\" $pilih>$z[nama_obat]</option>";
                }
                ?>
                    </select><br>
<select name="obat_5" class="form-control select2"
                                            oninvalid="this.setCustomValidity('Pilih Obat !')"
                                            oninput="setCustomValidity('')">
                        <option selected disabled='disabled' value=''>-- Obat 5 --</option>
                        <?php
                $obat5="select * from tblobat where id_obat";
                $y=mysqli_query($konek,$obat5);
                while($z=mysqli_fetch_array($y)){
                echo "
                <option value=\"$z[nama_obat]\" $pilih>$z[nama_obat]</option>";
                }
                ?>
                    </select>
</div>
</div>
<div class="item form-group">
<label class="col-form-label col-md-2 col-sm-2 label-align">Keterangan <span class="required text-danger">*</span>
</label>
<div class="col-md-5 col-sm-5 ">
<textarea name="keterangan" required="required" class="form-control"></textarea>
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
include("../dokter/includes/footer.php");