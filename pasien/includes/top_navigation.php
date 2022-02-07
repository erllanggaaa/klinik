<?php
$id_user=$_SESSION['id_user'];
$sql = mysqli_query($konek, "SELECT * FROM tbluser WHERE id_user='$id_user'");
$hasil = mysqli_fetch_array($sql);
?>

<!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $hasil['nama_lengkap']; ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="ubah-password"><i class="fa fa-edit pull-right"></i> Ubah Password</a>
                    <a class="dropdown-item"  href="logout"><i class="fa fa-sign-out pull-right"></i> Logout</a>
                  </div>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->