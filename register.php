<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <title>Klinik Mitra Medika - Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Klinik Mitra Medika" />
        <meta name="keywords" content="Klinik Mitra Medika" />
        <meta name="author" content="Klinik Mitra Medika" />

        <link href="./assets/images/favicon.png" rel="shortcut icon">

        <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->

         <!-- CSS Files
    ================================================== -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/animate.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/owl.transitions.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/magnific-popup.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/jquery.countdown.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- color scheme -->
    <link id="colors" href="./assets/css/colors/scheme-02.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/coloring.css" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div id="wrapper">
            <!-- header begin -->
            
            <header class="transparent scroll-light header-light">
                 <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <div class="align-self-center header-col-left">
                    <!-- logo begin -->
                    <div id="logo">
                        <a href="http://localhost/klinik">
                            
                            <img alt="" style="width: 70px" class="mt-1 logo" src="./assets/images/logo-white.png" />
                            <img alt="" style="width: 70px" class="mt-1 logo-2" src="./assets/images/logo.png" />
                        </a>
                    </div>
                    <!-- logo close -->
                </div>
                <div class="align-self-center ml-auto header-col-mid">
                    <!-- mainmenu begin -->
                    <ul id="mainmenu">
                        <li>
                            <!-- <a href="./">Home</a> -->
                        </li>
                    </ul>
                </div>
                <div class="align-self-center ml-auto header-col-right">
                    <a class="btn-custom" href="././login"><i class="fa fa-user"></i> Login</a>
                </div>
                <div class="clearfix"></div>
                
            </div>
        </div>
    </div>
</div>
 
            </header>
            <!-- header close -->
            <!-- content begin -->
            <div class="no-bottom no-top" id="content">
                <div id="top"></div>

            <section id="subheader" data-bgimage="url(./assets/images/background/5.png) bottom">
            </section>
            <!-- section close -->
            

            <section class="no-top" data-bgimage="url(./assets/images/background/3.png) top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            
                            
                            <div class="spacer-10"></div>
                            
                            <form class="form-border" method="post" action='proses-reg.php'>
<h3>Silahkan Isi Data Dengan Benar</h3>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>Nama Lengkap <span class="required text-danger">*</span> :</label>
                                            <input type='text' name='nama_lengkap' class="form-control" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>Alamat <span class="required text-danger">*</span> :</label>
                                            <textarea name='alamat' class="form-control" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>Umur <span class="required text-danger">*</span> :</label>
                                            <input type='text' name='umur' class="form-control" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>Jenis Kelamin <span class="required text-danger">*</span> :</label>
                                            <select name="jk" class="form-control" required 
                                            oninvalid="this.setCustomValidity('Pilih Jenis Kelamin!')"
                                            oninput="setCustomValidity('')">
                                            <option selected disabled="disabled" value="">-- Pilih --</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>Username <span class="required text-danger">*</span> :</label>
                                            <input type='text' name='username' class="form-control" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="field-set">
                                            <label>Password <span class="required text-danger">*</span> :</label>
                                            <input type='password' name='password' class="form-control" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="text-center">
                                            <input type='submit' value='Register' class="btn btn-custom color-2">
                                        </div>

                                        <div class="clearfix"></div>

                                    </div>

                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </section>
            
        </div>
        <!-- content close -->

<?php
include("./includes/footer.php");
?>