<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= CONF_SITE_NAME; ?></title>
    <!-- PLUGINS CSS STYLE -->
    <!-- Bootstrap -->
    <link href="<?= url("assets/web/"); ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= url("assets/web/"); ?>plugins/font-awsome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Magnific Popup -->
    <link href="<?= url("assets/web/"); ?>plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
    <!-- Slick Carousel -->
    <link href="<?= url("assets/web/"); ?>plugins/slick/slick.css" rel="stylesheet">
    <link href="<?= url("assets/web/"); ?>plugins/slick/slick-theme.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="<?= url("assets/web/"); ?>css/style.css" rel="stylesheet">
    <link href="<?= url("assets/web/"); ?>css/message.css" rel="stylesheet">
    <!-- FAVICON -->
    <link href="<?= url("assets/web/"); ?>images/favicon.png" rel="shortcut icon">
</head>
<body class="body-wrapper">
<!--========================================
=            Navigation Section            =
=========================================-->
<nav class="navbar main-nav border-less fixed-top navbar-expand-lg p-0">
    <div class="container-fluid p-0">
        <!-- logo -->
        <a class="navbar-brand" href="<?= url(); ?>">
            <img src="<?= url("assets/web/"); ?>images/logo.png" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= url(); ?>">Home<span>/</span></a>
                </li>
                <!--
                <li class="nav-item dropdown active dropdown-slide">
                    <a class="nav-link" href="#"  data-toggle="dropdown">Home
                        <span>/</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Homepage</a>
                        <a class="dropdown-item" href="#">Homepage 2</a>
                    </div>
                </li>
                -->
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="#">Speakers
                        <span>/</span>
                    </a>
                </li>
                -->
                <li class="nav-item dropdown dropdown-slide">
                    <a class="nav-link" href="#" data-toggle="dropdown">Pages<span>/</span></a>
                    <!-- Dropdown list -->
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= url("sobre"); ?>">About Us</a>
                        <a class="dropdown-item" href="<?= url("faq"); ?>">FAQ</a>
                        <!--
                        <a class="dropdown-item" href="#">Single Speaker</a>
                        <a class="dropdown-item" href="#">Gallery</a>
                        <a class="dropdown-item" href="#">Gallery-02</a>
                        -->
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-slide">
                    <a class="nav-link" href="#" data-toggle="dropdown">Projetos<span>/</span></a>
                    <!-- Dropdown list -->
                    <div class="dropdown-menu">
                        <?php
                        foreach ($categories as $category){
                            ?>
                            <a class="dropdown-item" href="<?= url("projetos/medio/{$category->id}"); ?>"><?= $category->level . " " . $category->field; ?></a>
                            <?php
                        }
                        ?>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-slide">
                    <a class="nav-link" href="#" data-toggle="dropdown">Submeter Trabalhos<span>/</span></a>
                    <!-- Dropdown list -->
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= url("cadastrar"); ?>">Cadastrar</a>
                        <a class="dropdown-item" href="<?= url("login"); ?>">Entrar</a>
                    </div>
                </li>
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="schedule.html">Schedule<span>/</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sponsors.html">Sponsors<span>/</span></a>
                </li>
                -->
                <li class="nav-item dropdown dropdown-slide">
                    <a class="nav-link" href="#"  data-toggle="dropdown">News
                        <span>/</span>
                    </a>
                    <!-- Dropdown list -->
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="news.html">News without sidebar</a>
                        <a class="dropdown-item" href="news-right-sidebar.html">News with right sidebar</a>
                        <a class="dropdown-item" href="news-left-sidebar.html">News with left sidebar</a>
                        <a class="dropdown-item" href="news-single.html">News Single</a>
                    </div>
                </li>
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                -->
            </ul>
            <a href="#" class="ticket">
                <img src="<?= url("assets/web/"); ?>images/icon/ticket.png" alt="ticket">
                <span>Buy Ticket</span>
            </a>
        </div>
    </div>
</nav>

<?= $this->section("content"); ?>

<!--================================
=            Google Map            =
=================================-->

<section class="map">
    <!-- Google Map -->
    <div id="map"></div>
    <div class="address-block">
        <h4>Docklands Convention</h4>
        <ul class="address-list p-0 m-0">
            <li><i class="fa fa-home"></i><span>Street Address, Location, <br>City, Country.</span></li>
            <li><i class="fa fa-phone"></i><span>[00] 000 000 000</span></li>
        </ul>
        <a href="#" class="btn btn-white-md">Get Direction</a>
    </div>
</section>

<!--====  End of Google Map  ====-->

<!--============================
=            Footer            =
=============================-->

<footer class="footer-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <div class="footer-logo">
                        <img src="images/footer-logo.png" alt="logo" class="img-fluid">
                    </div>
                    <ul class="social-links-footer list-inline">
                        <li class="list-inline-item">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fa fa-rss"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fa fa-vimeo"></i></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- Subfooter -->
<footer class="subfooter">
    <div class="container">
        <div class="row">
            <div class="col-md-6 align-self-center">
                <div class="copyright-text">
                    <p><a href="#">Eventre</a> &#169; 2017 All Right Reserved</p>
                </div>
            </div>
            <div class="col-md-6">
                <a href="#" class="to-top"><i class="fa fa-angle-up"></i></a>
            </div>
        </div>
    </div>
</footer>


<!-- JAVASCRIPTS -->
<!-- jQuey -->
<script src="<?= url("assets/web/"); ?>plugins/jquery/jquery.js"></script>
<!-- Popper js -->
<script src="<?= url("assets/web/"); ?>plugins/popper/popper.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= url("assets/web/"); ?>plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- Smooth Scroll -->
<script src="<?= url("assets/web/"); ?>plugins/smoothscroll/SmoothScroll.min.js"></script>
<!-- Isotope -->
<script src="<?= url("assets/web/"); ?>plugins/isotope/mixitup.min.js"></script>
<!-- Magnific Popup -->
<script src="<?= url("assets/web/"); ?>plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Slick Carousel -->
<script src="<?= url("assets/web/"); ?>plugins/slick/slick.min.js"></script>
<!-- SyoTimer -->
<script src="<?= url("assets/web/"); ?>plugins/syotimer/jquery.syotimer.min.js"></script>
<!-- Google Mapl -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<script type="text/javascript" src="<?= url("assets/web/"); ?>plugins/google-map/gmap.js"></script>
<!-- Custom Script -->
<script src="<?= url("assets/web/"); ?>js/custom.js"></script>
</body>

</html>