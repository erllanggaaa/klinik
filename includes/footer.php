<!-- footer begin -->
             <footer class="footer footer-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="widget">
                    <h5>Klinik Mitra Medika</h5>
                    <div class="spacer-5"></div>
                    <p>Klinik Mitra Medika bekerja sama dengan dokter umum yang kompeten di bidangnya dibantu perawat dan tenaga administrasi siap memberikan layanan kesehatan umum kepada masyarakat Umum, peserta ASKES (BPJS) dan Askes InHealth.</p>
                </div>
            </div>

            <div class="col-lg-3">
                        <div class="widget">
                            
                            <div class="spacer-5"></div>
                            
                        </div>
                    </div>


            <div class="col-lg-5">
                <div class="widget">
                    <h5>Alamat Dan Kontak</h5>
                    <div class="spacer-5"></div>
                <ul>
                                <li class="mb-1"><i class="fa fa-phone"></i> <a href="tel:05113251295">0511 - 325 1295</a></li>
                                <li class="mb-1"><i class="fa fa-envelope"></i> <a href="mailto:admin@modernesia.com">admin@klinikmitramedika.com</a></li>
                                <li class="mb-1"><i class="fa fa-map-marker"></i> KP. Cabang RT. 003/006 Desa Jayasakti, Muara Gembong. Bekasi - Jawa Barat</li>
                            </ul>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 sm-text-center mb-sm-30">
                <div class="mt10">Copyright &copy; 2021</div>
            </div>

            <div class="col-md-6 text-md-right text-sm-left">
                <div class="mt10">Templates by <a href="http://bootstrap.com">Bootstrap</a></div>
            </div>
        </div>
    </div>
</footer>
 
            <!-- footer close -->

             <div id="preloader">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
 
        </div>

         <div id="selector">
    <span class="opt tc1" data-color="scheme-01"></span>
    <span class="opt tc2" data-color="scheme-02"></span>
    <span class="opt tc3" data-color="scheme-03"></span>
    <span class="opt tc4" data-color="scheme-04"></span>
    <span class="opt tc5" data-color="scheme-05"></span>

    <span class="dark-mode">
        Enable Dark Mode
    </span>
</div>
 

        <!-- Javascript Files
    ================================================== -->
            <script>
                window.setTimeout(function () {
                    $(".alert-danger").fadeTo(300, 0).slideUp(300, function () {
                        $(this).remove();
                    });
                }, 3000);

                window.setTimeout(function () {
                    $(".alert-warning").fadeTo(300, 0).slideUp(300, function () {
                        $(this).remove();
                    });
                }, 3000);

                window.setTimeout(function () {
                    $(".alert-success").fadeTo(300, 0).slideUp(300, function () {
                        $(this).remove();
                    });
                }, 3000);
            </script>

<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/jquery.isotope.min.js"></script>
<script src="./assets/js/easing.js"></script>
<script src="./assets/js/owl.carousel.js"></script>
<script src="./assets/js/validation.js"></script>
<script src="./assets/js/jquery.magnific-popup.min.js"></script>
<script src="./assets/js/enquire.min.js"></script>
<script src="./assets/js/jquery.stellar.min.js"></script>
<script src="./assets/js/jquery.plugin.js"></script>
<script src="./assets/js/typed.js"></script>
<script src="./assets/js/jquery.countTo.js"></script>
<script src="./assets/js/jquery.countdown.js"></script>
<script src="./assets/js/designesia.js"></script>
 

        <script>
            $(document).ready(function() {
                $(".testimonial-carousel").slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: false,
                    arrows: true,
                    prevArrow: $(".testimonial-carousel-controls .prev"),
                    nextArrow: $(".testimonial-carousel-controls .next")
                });
            });
        </script>
        
        <script>
            (function () {
                "use strict";

                var carousels = function () {
                    $(".owl-carousel1").owlCarousel({
                    loop: true,
                    center: true,
                    margin: 0,
                    responsiveClass: true,
                    nav: false,
                    responsive: {
                        0: {
                        items: 1,
                        nav: false
                        },
                        680: {
                        items: 2,
                        nav: false,
                        loop: false
                        },
                        1000: {
                        items: 3,
                        nav: true
                        }
                    }
                    });
                };

                (function ($) {
                    carousels();
                })(jQuery);
            })();
        </script>

    </body>
</html>
