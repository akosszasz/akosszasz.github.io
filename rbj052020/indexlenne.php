<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 11. 22.
 * Time: 15:57
 */
require('blog/settings.php');
siteContent($catConn);
?>
<!DOCTYPE html>
<html lang="hu">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Rend.Be.Jössz Tanácsadó Központ">
    <!-- SEO -->
    <meta name="keywords" content="pszichológus Budapest">
    <meta name="description" content="Pszichológiai tanácsadás, pszichológus szakemberek Budapest II. kerületében, ahol pszichológus, pszichoterápiás és mentálhigiénés szakemberek segítenek.">
    <meta name="robots" content="index, follow">
    <!-- FACEBOOK -->
    <meta property="og:url" content="http://rendbejossz.hu">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Rend.Be.Jössz Tanácsadó Központ">
    <meta property="og:description" content="Pszichológiai tanácsadás Budapest II. kerületében, ahol pszichológus, pszichoterápiás és mentálhigiénés szakemberek segítenek.">
    <meta property="og:image" content="http://rendbejossz.hu/img/home-face.jpg">
    <meta property="og:image:alt" content="Rend.Be.Jössz Tanácsadó Központ">

    <title>Rend.Be.Jössz Tanácsadó Központ</title>

    <link rel="icon" href="img/logofav.ico">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/theme.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!--Global site tag (gtag.js) - Google Analytics-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108723637-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-108723637-1');
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body id="page-top" class="index">
<!-- Navigation -->
<div id="MagicMenu" class="nav-down">
    <nav id="mainNav " class=" navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <div class="navbar-header page-scroll mobile-navbar">
                <div class="hidden-lg hidden-md hidden-sm">
                    <a href="#portfolioModal0" class="portfolio-link" data-toggle="modal">
                        <i class="fa fa-bars" style="font-size: 20px;"></i>
                    </a>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <a id="" class="menuicon" href="/"><img src="img/home.svg" alt="logo"></a>
                <a id="" class="menuicon" href="gyerekeknek"><img src="img/kids.svg" alt="gyerekeknek"></a>
                <a id="" class="menuicon" href="felnotteknek"><img src="img/adults.svg" alt="felnőtteknek"></a>
                <a id="" class="menuicon" href="szakemberek"><img src="img/professionals.svg" alt="szakemberek"></a>
                <a id="" class="menuicon" href="arak"><img src="img/prices.svg" alt="árak"></a>
                <a id="" class="menuicon" href="teremberles"><img src="img/rent.svg" alt="terembérlés"></a>
                <a id="" class="menuicon" href="pszichologia-blog"><img src="img/blogicon.png" alt="pszichológia blog"></a>
                <a id="" class="menuicon" href="kapcsolat"><img src="img/contact.svg" alt="kapcsolat"></a>


                <ul class="nav navbar-nav navbar-right">

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>

<!-- Header -->
<header>
    <div class="container" id="maincontent" tabindex="-1">
        <div class="row">
            <div class="col-lg-12">
                <p class="hidden-lg hidden-md hidden-sm"> <br></p>
                <img class="hidden-xs hidden-sm" src="img/logo.svg" style="width:17%; margin-top:0vh;" alt="logo">
                <img class="hidden-lg hidden-md hidden-sm" style="width:40%; margin-top:7vh;" src="img/logo.svg" alt="logo">
                <img class="hidden-xs hidden-md hidden-lg" src="img/logo.svg" style="width:25%; margin-top:15vh;" alt="logo">

            </div>
        </div>
    </div>
</header>

<section id="introduction" class="" style="padding:0;">
    <div class="half hidden-xs hidden-sm hidden-md" style="background-image:url('../img/csoportkep.png'); background-size:cover;">
        <img src="img/csoportkep.png" class=" img-responsive" style="min-height:400px;" alt="csoportkép">
    </div>
    <div class="half hidden-xs hidden-sm hidden-md">
        <div id="halftext">
            <h3>
                Szeretettel köszöntjük a Rend.Be.Jössz Tanácsadó Központ honlapján!
            </h3>

            <p>
                Központukban pszichológusok, valamint pszichoterápiás és mentálhigiénés szakemberek várják jelentkezését, amennyiben életvezetési vagy lelki eredetű problémájával szeretne megoldásra jutni.
            </p>
            <p>
                Hatékony módszerek, tapasztalt, lelkes, korrekt és elhivatott szakemberek állnak az Ön rendelkezésére, hogy szakmai tudásukkal, elfogadásukkal és együttérzésükkel segítsék át életének nehéz időszakain.
            </p>
            <h3>
                Forduljon hozzánk bátran, bizalommal!
            </h3>
        </div>
    </div>

    <div class="container hidden-lg">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>
                    <br>
                    Szeretettel köszöntjük a Rend.Be.Jössz Tanácsadó Központ honlapján!
                </h3>

                <p>
                    Központukban pszichológusok, valamint pszichoterápiás és mentálhigiénés szakemberek várják jelentkezését, amennyiben életvezetési vagy lelki eredetű problémájával szeretne megoldásra jutni.
                </p>
                <p>
                    Hatékony módszerek, tapasztalt, lelkes, korrekt és elhivatott szakemberek állnak az Ön rendelkezésére, hogy szakmai tudásukkal, elfogadásukkal és együttérzésükkel segítsék át életének nehéz időszakain.
                </p>
                <h3>
                    Forduljon hozzánk bátran, bizalommal!
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align:center;">
                <img src="img/csoportkep.png" class="img-responsive" style="position: relative; z-index: -1; bottom:-10px" alt="csoportkép">
            </div>
        </div>
    </div>


</section>
<img style="margin-top:-85px; z-index:2;" class="hidden-xs" width="100%" height="auto" src="img/wave_bottom.svg" alt="hullám kép">



<!-- Portfolio Grid Section -->
<section id="news">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Aktuális</h2>
                <h1 style="margin:-10px 0 30px 0;font-size:18px;">Kövesse aktuális híreinket pszichológiai tanácsadás témakörben!</h1>
            </div>
        </div>
        <div class="row hidden-lg hidden-md hidden-sm"> <!-- MOBILE FACEBOOK INTEGRATION -->
            <div class="col-md-6 portfolio-item" style="text-align:center;">
                <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Frendbejossz%2Fphotos%2Fa.454955338197416.1073741828.447464562279827%2F456265618066388%2F%3Ftype%3D3%26theater&width=250&show_text=true&height=678&appId" width="250" height="678" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                <br><br>
            </div>
            <div class="col-md-6 portfolio-item" style="text-align:center;">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Frendbejossz%2F&tabs=timeline&width=250&height=678&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="250" height="678" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            </div>
        </div>

        <div class="row hidden-xs"> <!-- MOBILE FACEBOOK INTEGRATION -->
            <div class="col-md-6 portfolio-item" style="text-align:center;">
                <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Frendbejossz%2Fphotos%2Fa.454955338197416.1073741828.447464562279827%2F456265618066388%2F%3Ftype%3D3%26theater&width=400&show_text=true&height=678&appId" width="400" height="678" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>                <br><br>
            </div>
            <div class="col-md-6 portfolio-item" style="text-align:center;">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Frendbejossz%2F&tabs=timeline&width=400&height=678&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="400" height="678" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                <br><br>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Grid Section -->
<section id="portfolio" style="margin-bottom:-75px; padding-bottom:0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Szakemberek</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1 portfolio-item text-center">
            </div>
            <div class="col-sm-3 portfolio-item text-center">
                <a href="#portfolioModal1" data-keyboard="true" class="portfolio-link" data-toggle="modal">

                    <img src="img/szp/luca.png" class="img-responsive" alt="Hajnóczy Luca központvezető">
                    <p style="text-align:center;">Hajnóczy Luca<br>
                        központvezető</p>
                </a>
            </div>
            <div class="col-sm-4 portfolio-item text-center">
                <a href="#portfolioModal2" data-keyboard="true" class="portfolio-link" data-toggle="modal">
                    <img src="img/szp/gergo.png" class="img-responsive" alt="Bányász Réka">
                    <p>Andó Gergely<br></p>
                </a>
            </div>
            <div class="col-sm-3 portfolio-item text-center">
                <a href="#portfolioModal3" data-keyboard="true" class="portfolio-link" data-toggle="modal">
                    <img src="img/szp/gabi.png" class="img-responsive" alt="Bányász Réka">
                    <p>Arany Gabriella<br></p>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 portfolio-item text-center">
                <a href="#portfolioModal4" data-keyboard="true" class="portfolio-link" data-toggle="modal">
                    <img src="img/szp/reka.png" class="img-responsive" alt="Bányász Réka">
                    <p>Bányász Réka<br></p>
                </a>
            </div>
            <div class="col-sm-3 portfolio-item text-center">
                <a href="#portfolioModal5" data-keyboard="true" class="portfolio-link" data-toggle="modal">
                    <img src="img/szp/zsuzsi.png" class="img-responsive" alt="Erdélyi Zsuzsanna">
                    <p>Erdélyi Zsuzsanna<br></p>
                </a>
            </div>
            <div class="col-sm-3 portfolio-item text-center">
                <a href="#portfolioModal6" data-keyboard="true" class="portfolio-link" data-toggle="modal">
                    <img src="img/szp/nora.png" class="img-responsive" alt="Erdélyi Zsuzsanna">
                    <p>Franczia Nóra<br></p>
                </a>
            </div>
            <div class="col-sm-3 portfolio-item text-center">
                <a href="#portfolioModal7" data-keyboard="true" class="portfolio-link" data-toggle="modal">
                    <img src="img/szp/mark.png" class="img-responsive" alt="dr. Golub Márko">
                    <p>dr. Golub Márko<br></p>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 portfolio-item text-center">
                <a href="#portfolioModal8" data-keyboard="true" class="portfolio-link" data-toggle="modal">
                    <img src="img/szp/agi.png" class="img-responsive" alt="Hornyák Ágnes">
                    <p>Hornyák Ágnes<br></p>
                </a>
            </div>
            <div class="col-sm-3 portfolio-item text-center">
                <a href="#portfolioModal9" data-keyboard="true" class="portfolio-link" data-toggle="modal">
                    <img src="img/szp/flora.png" class="img-responsive" alt="Hornyák Ágnes">
                    <p>dr. Ijjas Flóra<br></p>
                </a>
            </div>
            <div class="col-sm-3 portfolio-item text-center">
                <a href="#portfolioModal10" data-keyboard="true" class="portfolio-link" data-toggle="modal">
                    <img src="img/szp/zsofi.png" class="img-responsive" alt="Kolontai Zsófi">
                    <p>Kolontai Zsófi<br></p>
                </a>
            </div>
            <div class="col-sm-3 portfolio-item text-center">
                <a href="#portfolioModal11" data-keyboard="true" class="portfolio-link" data-toggle="modal">
                    <img src="img/szp/maria.png" class="img-responsive" alt="Küzmös Mária">
                    <p>Küzmös Mária<br></p>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 portfolio-item text-center">
                <a href="#portfolioModal12" data-keyboard="true" class="portfolio-link" data-toggle="modal">
                    <img src="img/szp/sandor.png" class="img-responsive" alt="Lőrincz Sándor">
                    <p>Lőrincz Sándor<br></p>
                </a>
            </div>
            <div class="col-sm-3 portfolio-item text-center">
                <a href="#portfolioModal13" data-keyboard="true" class="portfolio-link" data-toggle="modal">
                    <img src="img/szp/barbi.png" class="img-responsive" alt="Lőrincz Sándor">
                    <p>Solti Barbara<br></p>
                </a>
            </div>
            <div class="col-sm-3 portfolio-item text-center">
                <a href="#portfolioModal14" data-keyboard="true" class="portfolio-link" data-toggle="modal">
                    <img src="img/szp/dorka.png" class="img-responsive" alt="Széles Dorottya">
                    <p>Széles Dorottya<br></p>
                </a>
            </div>
            <div class="col-sm-3 portfolio-item text-center">
                <a href="#portfolioModal15" data-keyboard="true" class="portfolio-link" data-toggle="modal">
                    <img src="img/szp/lili.png" class="img-responsive" alt="Szirtes Lili">
                    <p>Szirtes Lili<br></p>
                </a>
            </div>
            <p class="hidden-lg hidden-md hidden-sm"> <br><br><br></p>
        </div>
    </div>
    </div>
</section>


<!-- Footer -->
<footer style="padding-bottom:0px;" class="text-center">

    <div class="footer-above">
        <div class="hidden-xs" style="position: relative; bottom: 5px;">
            <img src="img/wave_top_sm.svg" width="110%" style="margin-top: -75px; position:relative; left:-2px; bottom:0;" alt="hullám kép">
        </div>
        <div class="hidden-sm hidden-md hidden-lg" style="position: relative; bottom: 5px;">
            <img src="img/wave_top_sm.svg" width="110%" style="margin-top: -75px; position:relative; left:-2px; bottom:0;" alt="hullám kép">
        </div>
        <div class="container">
            <div class="row" style="padding-top: 100px;">
                <div class="footer-col col-md-6" style="text-align:left;  padding-bottom:0px; margin-bottom:215px;">
                    <h3>KAPCSOLAT</h3>

                    <h4 style="color:#059B90;">
                        Kizárólag előzetes bejelentkezés és időpontegyeztetés után tudjuk Önt fogadni tanácsadónkban!</h4>
                    <br>
                    <h4 style="color:#fff;">
                        Jelentkezzen be az Ön által választott <a style="color:#fff ;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; text-decoration:underline;" href="szakemberek.html">szakembernél</a> személyesen!</h4>

                    <p>Amennyiben további útmutatásra lenne szüksége a módszer és a szakember kiválasztását illetően, keressen bátran a központi elérhetőségünkön hétköznap 9:00-18:00 között!
                        <br>
                        <br><i class="fa fa-envelope-o" style="font-size:24px; color:#059B90; margin-right:15px;"></i><a style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; text-decoration:underline; color:#fff; font-size:18px;" href="mailto:info@rendbejossz.hu">info@rendbejossz.hu</a>
                        <br>
                        <br><i class="fa fa-map-marker" style="font-size:24px; color:#059B90; margin-right:15px;"></i>1024 Budapest, Fillér utca 19.
                        <br>
                        <br><i class="fa fa-mobile" style="font-size:24px; color:#059B90; margin-right:15px;"></i>+36 20 313 64 03 <br> &nbsp;&nbsp;&nbsp;&nbsp; Hajnóczy Luca, központvezető
                        <br>
                        <br><i class="fa fa-facebook" style="font-size:24px; color:#059B90; margin-right:15px;"></i> <a style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; text-decoration:underline; color:#fff; font-size:18px;" href="https://facebook.com/rendbejossz/" target="_blank">facebook.com/rendbejossz</a>
                    <p class="hidden-lg hidden-md hidden-sm"> <br><br><br></p>

                    </p>
                </div>
                <div class="footer-col col-md-6 intrinsic-container hidden-md hidden-lg">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2694.963683028794!2d19.019732215967892!3d47.510098479178424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dea41d92e367%3A0x5409ab768ab56c60!2sBudapest%2C+Fill%C3%A9r+u.+19%2C+1024!5e0!3m2!1shu!2shu!4v1494894240441" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="footer-col col-md-6 intrinsic-container hidden-xs hidden-sm">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2694.963683028794!2d19.019732215967892!3d47.510098479178424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dea41d92e367%3A0x5409ab768ab56c60!2sBudapest%2C+Fill%C3%A9r+u.+19%2C+1024!5e0!3m2!1shu!2shu!4v1494894240441" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <p class=""> <br><br></p>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>





<!-- Portfolio Modals -->

<div class="portfolio-modal modal fade" id="portfolioModal0" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" style="margin-top:40px;">

                <div class="col-xs-6">
                    <a class="menuicon-s" href="/"><img src="img/home.svg" height="100px" alt="logo"></a>
                </div>
                <div class="col-xs-6">
                    <a class="menuicon-s" href="gyerekeknek"><img src="img/kids.svg" height="100px" alt="gyerekeknek"></a>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-6">
                    <a class="menuicon-s" href="felnotteknek"><img src="img/adults.svg" height="100px" alt="felnőtteknek"></a>
                </div>
                <div class="col-xs-6">
                    <a class="menuicon-s" href="szakemberek"><img src="img/professionals.svg" height="100px" alt="szakemberek"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <a class="menuicon-s" href="arak"><img src="img/prices.svg" height="100px" alt="árak"></a>
                </div>
                <div class="col-xs-6">
                    <a class="menuicon-s" href="teremberles"><img src="img/rent.svg" height="100px" alt="terembérlés"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <a class="menuicon-s" href="pszichologia-blog"><img src="img/blogicon.png" height="100px" alt="pszichológia blog"></a>
                </div>
                <div class="col-xs-6">
                    <a class="menuicon-s" href="kapcsolat.html"><img src="img/contact.svg" height="100px" alt="kapcsolat"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Luca -->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <img class="img-responsive" src="img/szp/luca_fotel.png" alt="HAJNÓCZY LUCA pszichológus">
                </div>
                <div class="col-md-4 text-left">
                    <h2 style="font-size:24px;">
                        HAJNÓCZY LUCA
                    </h2>
                    <br>
                    <p>
                        <b>pszichológus</b><br>
                        integratív hipnoterapeuta jelölt<br>
                        a Rend.Be.Jössz Tanácsadó Központ vezetője<br>
                        <br>
                    </p>
                    <p class="szakemberinfo">

                        <a href="mailto:luca.hajnoczy@gmail.com">luca.hajnoczy@gmail.com</a><br>
                        +36 20 / 313 64 03
                    </p>
                    <div style="background-color:#68D1C9; color:white; padding:30px;">
                        <p>
                            FOGADÁSI IDŐ<br>
                            <div style="display:flex;">
                        <p style="margin-right:30px;">
                            Kedd<br>
                            Csütörtök<br>
                            Péntek<br>
                        </p>

                        <p>
                            8:00 - 20:00 <br>
                            13:00 - 20:00<br>
                            8:00 - 13:00<br>
                        </p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-8 col-md-offset-2 text-left">
                <h2 style="font-size:24px; "><br>
                    MIT JELENT SZÁMOMRA A PSZICHOLÓGIA?
                </h2>
                <p>
                    <br>
                    Gyermekkorom óta foglalkoztat az emberek megértése, különbözősége, életcélja s fejlődésük útja. Úgy érzem, számomra a pszichológia nem csak egy szakma, hanem életfeladat és hivatás.
                    <br><br>
                </p>
                <h2 style="font-size:24px;">
                    SZEMLÉLETEM
                </h2>
                <p>
                    <br>
                    Hiszem, hogy a belső útmutatás meghallása által mindenki egy olyan térképpé válhat önmaga számára, ami segít felfedezni a benne rejlő értékeket, elrejtett kincseket. Meglátásom szerint a legnagyobb biztonság mindenki számára önmagában lakozik. A találkozások alkalmával, a hozzám fordulók számára elhivatott együttérzéssel segítek ennek megtalálásában.
                    <br><br>
                    “Csak kétféleképpen élheted az életed. Vagy abban hiszel, hogy a világon semmi sem varázslat, vagy pedig abban, hogy a világon minden varázslat.” (Albert Einstein)
                    <br><br>
                    Márpedig úgy gondolom, hogy nyitott szívvel: minden varázslat. Munkám során rájöttem, hogy erre tanítanak minket a gyermekek is!
                    <br><br>

                </p>
                <h2 style="font-size:24px; ">
                    KÉPZETTSÉG
                </h2>
                <br>
                <p>
                    <b>2015 –</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichodinamikus mozgás- és táncterápiás csoportvezető módszerspecifikus képzés <br>  Magyar Mozgás- és Táncterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014-2016</b>
                </p>
                <p style="margin-left:50px;">
                    Integratív Pszichoterápia módszerspecifikus képzés  <br> Integratív Hipnoterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2013</b>
                </p>
                <p style="margin-left:50px;">
                    Tanácsadás- és iskolapszichológiai mesterképzés
                    <br>Eötvös Lóránd Tudományegyetem
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2008-2009</b>
                </p>
                <p style="margin-left:50px;">
                    Metamorphoses meseterápiás módszer
                    <br>Boldizsár Ildikó
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2007-2010</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológia alapképzés
                    <br>Károli Gáspár Református Egyetem, Pszichológiai Intézet
                    <br><br>
                </p>

                <h2 style="font-size:24px; ">
                    SZAKMAI TAPASZTALATOK
                </h2>
                <br>
                <p>
                    <b>2015 –</b>
                </p>
                <p style="margin-left:50px;">
                    Életvezetési tanácsadás, magánpraxis
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014 –</b>
                </p>
                <p style="margin-left:50px;">
                    Óvodapszichológus, X. kerület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2012 – 2015</b>
                </p>
                <p style="margin-left:50px;">
                    Kollégiumi pszichológus, XIV. kerület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2010 –</b>
                </p>
                <p style="margin-left:50px;">
                    L’élek Egyesület alapító tag
                    <br><br>
                </p>
            </div>


        </div>
    </div>
</div>
</div>

<!-- A. Gergely -->
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <img class="img-responsive" src="img/szp/gergo_fotel.png" alt="HAJNÓCZY LUCA pszichológus">
                </div>
                <div class="col-md-4 text-left">
                    <h2 style="font-size:24px;">
                        ANDÓ GERGELY
                    </h2>
                    <br>
                    <p>
                        <b>pszichológus</b><br>
                        felnőtt klinikai szakpszichológus jelölt<br>

                        <br>
                    </p>
                    <p class="szakemberinfo">

                        <a href="mailto:ando.gergo@gmail.com">ando.gergo@gmail.com</a><br>
                        +36 70 / 419 09 34
                    </p>
                    <div style="background-color:#68D1C9; color:white; padding:30px;">
                        <p>
                            FOGADÁSI IDŐ<br>
                            <div style="display:flex;">
                        <p style="margin-right:30px;">
                            Hétköznaponként 17:00-20:00 megbeszélés szerint.
                        </p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-8 col-md-offset-2 text-left">
                <h2 style="font-size:24px; "><br>
                    MIT JELENT SZÁMOMRA A PSZICHOLÓGIA?
                </h2>
                <p>
                    <br>
                    Tudomány és filozófia. Segíti annak megismerését, hogy hogyan kapcsolódunk másokhoz, a világhoz és önmagunkhoz.                                                 <br><br>
                </p>
                <h2 style="font-size:24px;">
                    SZEMLÉLETEM
                </h2>
                <p>
                    <br>
                    Szemléletemben a jungi mélylélektani irányzat, valamint az interperszonális-egzisztencialista módszer meghatározó. Úgy gondolom, hogy a tünetek és a lélek különféle megrezdülései üzenet-értékűek, amelyeket közösen megértve, megélve és átdolgozva egyfajta átalakulás történhet az életvezetésben, annak minőségében, és a belső, lelki világban is. Mindehhez nagy segítséget nyújthatnak az álmok, a fantáziák, a kapcsolódás, a beszélgetés.
                    <br><br>

                </p>
                <h2 style="font-size:24px; ">
                    KÉPZETTSÉG
                </h2>
                <br>
                <p>
                    <b>2015 –</b>
                </p>
                <p style="margin-left:50px;">
                    Felnőtt klinikai szakpszichológus jelölt <br>  
                    szakképzés, Pécsi Tudományegyetem
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2015 -</b>
                </p>
                <p style="margin-left:50px;">
                    Az analitikus pszichológia alapjai <br>
                    módszerspecifikus képzés, Magyar C. G. Jung analitikus pszichológiai egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014-2016</b>
                </p>
                <p style="margin-left:50px;">
                    Komplex Művészeti Terapeuta
                    <br>módszerspecifikus képzés, Wesley János Lelkészképző Főiskola
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2010-2012</b>
                </p>
                <p style="margin-left:50px;">
                    Klinikai pszichológiai és egészségpszichológiai mesterképzés – Okleveles pszichológus
                    <br>Károli Gáspár Református Egyetem
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2007-2010</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológia alapképzés - Viselkedéselemző
                    <br>Károli Gáspár Református Egyetem
                    <br><br>
                </p>

                <h2 style="font-size:24px; ">
                    SZAKMAI TAPASZTALATOK
                </h2>
                <br>
                <p>
                    <b>2016 –</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichés támogatás, egyéni konzultáció, csoportvezetés<br>
                    Flór Ferenc Kórház, pszichiátriai osztály

                    <br><br>
                </p>

                <br>
                <p>
                    <b>2013–2016</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichés támogatás, egyéni konzultáció, csoportvezetés<br>
                    Egészségmegőrzési Központ, Dunaújváros
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2010 – 2015</b>
                </p>
                <p style="margin-left:50px;">
                    Krízisintervenciós és drogprevenciós kortárssegítő<br>
                    Helperek Önkéntes Segítők Közhasznú Egyesülete
                    <br><br>
                </p>
            </div>


        </div>
    </div>
</div>
</div>

<!-- A. Gabriella -->
<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <img class="img-responsive" src="img/szp/gabi_fotel.png" alt="HAJNÓCZY LUCA pszichológus">
                </div>
                <div class="col-md-4 text-left">
                    <h2 style="font-size:24px;">
                        ARANY GABRIELLA
                    </h2>
                    <br>
                    <p>
                        <b>pszichológus</b><br>
                        tanácsadó szakpszichológus jelölt<br>
                        <br>
                    </p>
                    <p class="szakemberinfo">
                        <a href="http://www.aranygabi.hu/">aranygabi.hu</a><br>
                        <a href="mailto:arany.j.gabriella@gmail.com">arany.j.gabriella@gmail.com</a><br>
                        +36 20 / 928 83 50
                    </p>
                    <div style="background-color:#68D1C9; color:white; padding:30px;">
                        <p>
                            FOGADÁSI IDŐ<br>
                            <div style="display:flex;">
                        <p style="margin-right:30px;">
                            Péntek de.<br>
                            Péntek du.<br>
                        </p>

                        <p>
                            10:00 - 12:00 <br>
                            14:00 - 20:00<br>
                        </p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-8 col-md-offset-2 text-left">
                <h2 style="font-size:24px; "><br>
                    MIT JELENT SZÁMOMRA A PSZICHOLÓGIA?
                </h2>
                <p>
                    <br>
                    A pszichológia számomra egy pozitív eszköz, egy kulcs, mely segít boldogabb, kiegyensúlyozottabb életet élni. Hiszem, hogy ha megértjük önmagunkat és a körülöttünk élő embereket, az segít kapcsolatainkat harmonikusabbá tenni. Úgy gondolom, hozzáállásunkkal, akaratunkkal jobbá tehetjük önmagunk és a hozzánk közelállók életét.<br><br>
                </p>
                <h2 style="font-size:24px;">
                    SZEMLÉLETEM
                </h2>
                <p>
                    <br>
                    Érdekelnek az emberek tetteinek miértjei, az emberekben zajló lelki folyamatok, a köztük lévő kapcsolatok, viszonyok. Fontosnak tartom, hogy képesek legyünk alázattal elfogadni a külső körülmények kényszerítő erejének hatására a belső és külső erőforrásainkat megfelelően felhasználni. Alapvetően tisztelem és igyekszem megérteni az embereket. Munkámban a mélyklélektani módszereket részesítem előnyben, ezen belül is Adler-i dinamikus személyiség-szemléletet. Ez a gyakorlatban – a gyermekkori emlékképek alapján – az életstílus feltárásából és annak szükséges korrekciójából áll.
                    <br><br>

                </p>
                <h2 style="font-size:24px; ">
                    KÉPZETTSÉG
                </h2>
                <br>
                <p>
                    <b>2016 –</b>
                </p>
                <p style="margin-left:50px;">
                    ELTE tanácsadó szakpszichológus szakképzés
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2017</b>
                </p>
                <p style="margin-left:50px;">
                    Meseelemző- módszerspecifikus képzés <br>
                    LEA Egészségvédő Alapítvány
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2017</b>
                </p>
                <p style="margin-left:50px;">
                    Művészetterápia- módszerspecifikus képzés <br>
                    LEA Egészségvédő Alapítvány
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2013-2015</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológus, tanácsadás-beavatkozás szak (mesteri képzés)
                    <br>Babes Bolyai Tudományegyetem Kolozsvár, Románia
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2010-2013</b>
                </p>
                <p style="margin-left:50px;">
                    Általános pszichológus
                    <br>Babes Bolyai Tudományegyetem Kolozsvár, Románia
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2012</b>
                </p>
                <p style="margin-left:50px;">
                    Mediátor, személyi és életvezetési tanácsadó
                    <br>Magyar Coach Szövetség
                    <br><br>
                </p>


                <h2 style="font-size:24px; ">
                    SZAKMAI TAPASZTALATOK
                </h2>
                <br>
                <p>
                    <b>2016 –</b>
                </p>
                <p style="margin-left:50px;">
                    Heves Megyei Pedagógiai Szakszolgálat Hevesi Tagintézménye<br>
                    pszichológus
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2015 –</b>
                </p>
                <p style="margin-left:50px;">
                    Életvezetési tanácsadás, magánpraxis
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014 –</b>
                </p>
                <p style="margin-left:50px;">
                    Heves Város  Gyermekjóléti Szolgálata és Családsegítő Központja<br>
                    pszichológus
                    <br><br>
                </p>
            </div>


        </div>
    </div>
</div>
</div>

<!-- B. Réka -->
<div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <img class="img-responsive" src="img/szp/reka_fotel.png" alt="BÁNYÁSZ RÉKA pszichológus és pszichológia szakos tanár">
                </div>
                <div class="col-md-4 text-left">
                    <h2 style="font-size:24px;">
                        BÁNYÁSZ RÉKA
                    </h2>
                    <br>
                    <p>
                        <b>pszichológus és pszichológia szakos tanár</b><br>
                        klinikai szakpszichológus, relaxációs és szimbólumterapeuta, integratív hipnoterapeuta jelölt
                        <br>
                    </p>
                    <p class="szakemberinfo">
                        <a href="mailto:info@banyaszreka.hu">info@banyaszreka.hu</a><br>
                        <a href="http://banyaszreka.hu">banyaszreka.hu</a><br>
                        +36 70 602 69 15  
                    </p>
                    <div style="background-color:#68D1C9; color:white; padding:30px;">
                        <p>
                            FOGADÁSI IDŐ<br>
                            <div style="display:flex;">
                        <p style="margin-right:30px;">
                            Hétfő <br>
                            <br>
                            Szerda<br>
                            Csütörtök
                        </p>

                        <p>
                            9:00 - 13:00 <br>
                            14:00 - 18:00<br>
                            9:00 - 15:00 <br>
                            13:00 - 17:00
                        </p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-8 col-md-offset-2 text-left">
                <h2 style="font-size:24px; "><br>
                    MIT JELENT SZÁMOMRA A PSZICHOLÓGIA?
                </h2>
                <p>
                    <br>
                    Magyar társadalmunkban igen elterjedt tévhit, hogy pszichológushoz annak kell mennie, aki „beteg” vagy „nem normális”. Hivatásomnak tekintem, hogy e tévhit ellen küzdjek, és a pszichológiai kultúrát terjesszem.
                    <br>Noha a klinikai pszichológia eszközeivel lehetőség van a betegségek lelki/mentális eszközökkel való gyógyítására, rendkívül fontos, hogy problémák jelentkezése esetén ne várjunk, amíg a szenvedés már elviselhetetlen, hanem időben kérjünk segítséget a fejlődés és megelőzés érdekében.
                    <br><br>
                </p>
                <h2 style="font-size:24px;">
                    SZEMLÉLETEM
                </h2>
                <p>
                    <br>
                    Segítséget kérni, támaszt keresni válságos helyzetben – egyik legnagyobb erőforrásunk. Annak, aki szakértő támogatásért fordul hozzám, szeretném átadni a hitemet, hogy a problémákra vannak megoldások, és a sebek begyógyíthatóak. Minden szakmai tudásommal és tapasztalatommal arra törekszem, hogy a hozzám fordulóknak azt a segítséget nyújtsam, amire személyesen és aktuálisan szükségük van.
                    <br><br>

                </p>
                <h2 style="font-size:24px; ">
                    KÉPZETTSÉG
                </h2>
                <br>
                <p>
                    <b>2017 -</b>
                </p>
                <p style="margin-left:50px;">
                    Integratív pszichoterápia módszerspecifikus képzés
                    <br>Integratív Pszichoterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2011-2015</b>
                </p>
                <p style="margin-left:50px;">
                    Szimbólumterápiás képzés
                    <br>Magyar Relaxációs és Szimbólumterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2011-2012</b>
                </p>
                <p style="margin-left:50px;">
                    Várandós és gyermekrelaxáció
                    <br>Magyar Relaxációs és Szimbólumterápiás Egyesület
                    <br><br>
                </p>


                <br>
                <p>
                    <b>2010-2011</b>
                </p>
                <p style="margin-left:50px;">
                    Autogén tréning képzés
                    <br>Magyar Relaxációs és Szimbólumterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2005-2009</b>
                </p>
                <p style="margin-left:50px;">
                    Klinikai és mentálhigiéniai szakpszichológus képzés
                    <br>SOTE ÁOK Klinikai Pszichológiai Tanszék
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2008</b>
                </p>
                <p style="margin-left:50px;">
                    Kognitív viselkedésterápia haladóknak
                    <br>SOTE ÁOK Klinikai Pszichológiai Tanszék
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2003</b>
                </p>
                <p style="margin-left:50px;">
                    A tanulás és oktatás modern módszerei és stratégiái
                    <br>Gereformeerde Hogeschool Zwolle
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2002-2005</b>
                </p>
                <p style="margin-left:50px;">
                    250 óra pszichodráma sajátélmény, csoportdinamikai szeminárium (pszichodráma asszisztens képzés része)
                    <br>Romániai Pszichodráma Egyesület (SPJLM)
                    <br><br>
                </p>

                <br>
                <p>
                    <b>1999-2003</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológia szak
                    <br>Babes-Bolyai Tudományegyetem Pszichológia és Neveléstudományok Kar, Kolozsvár
                    <br><br>
                </p>


                <h2 style="font-size:24px; ">
                    SZAKMAI TAPASZTALATOK
                </h2>

                <br>
                <p>
                    <b>2010 –</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológiai magánrendelés
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2009-2012</b>
                </p>
                <p style="margin-left:50px;">
                    Palotás Gábor Általános Iskola, Budapest
                    <br>Prevenciós tevékenység, tanácsadás, terápia
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2003-2009</b>
                </p>
                <p style="margin-left:50px;">
                    Nevelési Tanácsadó, Zalaegerszeg
                    <br>Diagnosztikai és terápiás tevékenység
                    <br><br>
                </p>
            </div>


        </div>
    </div>
</div>
</div>

<!-- E. Zsuzsanna -->
<div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <img class="img-responsive" src="img/szp/zsuzsi_fotel.png" alt="ERDÉLYI ZSUZSANNA pszichológus">
                </div>
                <div class="col-md-4 text-left">
                    <h2 style="font-size:24px;">
                        ERDÉLYI ZSUZSANNA
                    </h2>
                    <br>
                    <p>
                        <b>pszichológus</b><br>
                        pár- és családterapeuta jelölt<br>
                        <br>
                    </p>
                    <p class="szakemberinfo">
                        <a href"mailto:erdelyizsuzsanna.87@gmail.com">erdelyizsuzsanna.87@gmail.com</a>
                    </p>
                    <div style="background-color:#68D1C9; color:white; padding:30px;">
                        <p>
                            FOGADÁSI IDŐ<br>
                            <div style="display:flex;">
                        <p style="margin-right:30px;">
                            Hétfő
                        </p>

                        <p>
                            15:00 - 20:00 
                        </p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-8 col-md-offset-2 text-left">
                <h2 style="font-size:24px; "><br>
                    MIT JELENT SZÁMOMRA A PSZICHOLÓGIA?
                </h2>
                <p>
                    <br>
                    A pszichológia számomra egy út, egy módszer, amely segíthet jobban megérteni magunkat, a választásainkat, a történetünket. Az elakadások a jelen állapot nehézségére hívják fel a figyelmet, és sokszor ezek állítanak meg, és késztetnek arra, hogy jobban megismerjük, felfedezzük magunkat. Ennek köszönhetően egy olyan életet alakíthatunk ki, amelyben élni szeretnénk. Én ezt kaptam tőle. És arra vállalkozom, hogy ezen az úton másokat is végig kísérjek együttérzéssel és elfogadással.
                    <br><br>
                </p>
                <h2 style="font-size:24px;">
                    SZEMLÉLETEM
                </h2>
                <p>
                    <br>
                    Egy viselkedés mögött számtalan ok állhat. A gyerekek, életkorukból fakadóan, sokszor még nem tudják megfogalmazni, hogy mi zajlik bennük, viszont viselkedésükkel és hangulatukkal jeleznek felénk. Amikor egy szülő bizonytalannak érzi magát gyermeke viselkedése miatt, sokat segíthet, ha egy külső szakemberrel, egy pszichológussal beszéli át és gondolkodnak együtt rajta. Úgy gondolom, hogy ez az együttműködő csapatmunka közelebb tud vinni a megoldáshoz.
                    <br><br>
                </p>
                <h2 style="font-size:24px; ">
                    KÉPZETTSÉG
                </h2>
                <br>
                <p>
                    <b>2016</b>
                </p>
                <p style="margin-left:50px;">
                    Dinamikus szenzoros integrációs terápia
                    <br>Magyar Dinamikus Szenzoros Integrációs Terápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014 </b>
                </p>
                <p style="margin-left:50px;">
                    Pedagógiai szakpszichológus képzés
                    <br>Eötvös Lóránd Tudományegyetem
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2012</b>
                </p>
                <p style="margin-left:50px;">
                    Pár és családterápia
                    <br>Magyar Családterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2011</b>
                </p>
                <p style="margin-left:50px;">
                    Dohányzásról való leszokást támogató szakember képzés
                    <br>Egészséges Magyarországért Központ
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2011</b>
                </p>
                <p style="margin-left:50px;">
                    Szuggesztiók alkalmazása a szomatikus orvoslásban képzés
                    <br>Magyar Hipnózis Egyesület és a Semmelweis Egyetem Aneszteziológiai és Intenzív Terápiás Klinika
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2009 - 2012</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológia mesterképzés
                    <br>klinikai és egészségpszichológia szakirány,  Eötvös Loránd Tudományegyetem
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2006-2009</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológia alapképzés
                    <br>Eötvös Loránd Tudományegyetem
                    <br><br>
                </p>

                <h2 style="font-size:24px; ">
                    SZAKMAI TAPASZTALATOK
                </h2>
                <br>
                <p>
                    <b>2013 –</b>
                </p>
                <p style="margin-left:50px;">
                    Óvodapszichológus, X. kerület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2012 – 2013</b>
                </p>
                <p style="margin-left:50px;">
                    Óvoda és iskolapszichológus, XIII. Kerület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2011 – 2012</b>
                </p>
                <p style="margin-left:50px;">
                    Önkéntes óvoda és iskolapszichológus, Felismerés Alapítvány
                    <br><br>
                </p>
            </div>
        </div>
    </div>
</div>
</div>

<!-- F. Nóra -->
<div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <img class="img-responsive" src="img/szp/nora_fotel.png" alt="HAJNÓCZY LUCA pszichológus">
                </div>
                <div class="col-md-4 text-left">
                    <h2 style="font-size:24px;">
                        FRANCZIA NÓRA
                    </h2>
                    <br>
                    <p>
                        <b>pszichológus</b><br>
                        klinikai szakpszichológus jelölt, család- és párterapeuta jelölt<br>
                        <br>
                    </p>
                    <p class="szakemberinfo">

                        <a href="mailto:luca.hajnoczy@gmail.com">luca.hajnoczy@gmail.com</a><br>
                        +36 20 / 313 64 03
                    </p>
                    <div style="background-color:#68D1C9; color:white; padding:30px;">
                        <p>
                            FOGADÁSI IDŐ<br>
                            <div style="display:flex;">
                        <p style="margin-right:30px;">
                            Hétfő<br>
                        </p>

                        <p>
                            15:30 - 19:30 <br>
                        </p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-8 col-md-offset-2 text-left">
                <h2 style="font-size:24px; "><br>
                    MIT JELENT SZÁMOMRA A PSZICHOLÓGIA?
                </h2>
                <p>
                    <br>
                    A pszichológia a maga szerteágazó személeti keretével a világ, egyben önmagunk megismerésének, ezen keresztül elfogadásának eszköze az én szememben. Elméleti és gyakorlati szinten is azzal szembesít, hogy ugyanazt a jelenséget, megélést számtalan módon leírhatjuk; és hogy gyógyító ereje van, ha megtaláljuk a számunkra leghitelesebb narratívát, ahogy annak is, ha ennek köszönhetően rálátunk, hogy ettől másoké nem kevésbé érvényes.
                    <br><br>
                </p>
                <h2 style="font-size:24px;">
                    SZEMLÉLETEM
                </h2>
                <p>
                    <br>
                    A rendszerszemlélet jegyében hiszek benne, hogy az egyéni önismereti munka is minőségi változást hozhat kapcsolatainkban és saját működésünk megértésében egyaránt. Ha rátekintünk életutunk vagy aktuális élethelyzetünk kontextusára, árnyaltabban érzékelhetjük saját felelősségünket, illetve azokat a családi, társadalmi mintákat és (akár tudattalan) elvárásokat, amelyek még hozzájárulhattak annak alakulásához. Ezek tisztázása, megértése elősegítheti, hogy együttérzéssel tekintsünk saját magunkra, ezáltal környezetünkre is.
                    <br>
                    <br>Segítőként ezen a felfedezőúton kísérem a hozzám fordulókat, kíváncsian arra, mi kéri éppen a figyelmüket, és érzékenyen arra, hogy milyen tempóban, milyen irányba szeretnének haladni.
                    <br><br>

                </p>
                <h2 style="font-size:24px; ">
                    KÉPZETTSÉG
                </h2>
                <br>
                <p>
                    <b>2015 –</b>
                </p>
                <p style="margin-left:50px;">
                    Klinikai és mentálhigiéniai gyermek- és serdülő szakpszichológia
                    <br>Szakképzés, Pécsi Tudományegyetem
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2017 –</b>
                </p>
                <p style="margin-left:50px;">
                    Családterápiás szupervízió 
                    <br>módszerspecifikus képzés, Magyar Családterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2015–2016</b>
                </p>
                <p style="margin-left:50px;">
                    Családterápiás szupervízió 
                    <br>módszerspecifikus képzés, Magyar Családterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014-2015</b>
                </p>
                <p style="margin-left:50px;">
                    Családterápiás alapképzés 
                    <br>módszerspecifikus képzés, Magyar Családterápiás Egyesület
                    <br><br>
                </p>

                <h2 style="font-size:24px; ">
                    SZAKMAI TAPASZTALATOK
                </h2>
                <br>
                <p>
                    <b>2017 –</b>
                </p>
                <p style="margin-left:50px;">
                    Életvezetési tanácsadás, család- és párterápia, magánpraxis
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014 –</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológus (nevelési tanácsadás, szakértői tevékenység, családterápia), Fővárosi Pedagógiai Szakszolgálat VI. Kerületi Tagintézménye
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2013 – 2014</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológus (nevelési tanácsadás, szakértői tevékenység), Pest Megyei Pedagógiai Szakszolgálat Érdi Tagintézménye
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2011 –</b>
                </p>
                <p style="margin-left:50px;">
                    Projektalapító, Body Image and Marketing Project
                    <br><br>
                </p>
            </div>


        </div>
    </div>
</div>
</div>

<!-- dr. G. Márko -->
<div class="portfolio-modal modal fade" id="portfolioModal7" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <img class="img-responsive" src="img/szp/mark_fotel.png" alt="DR. GOLUB MÁRKO pszichiáter szakorvos">
                </div>
                <div class="col-md-4 text-left">
                    <h2 style="font-size:24px;">
                        DR. GOLUB MÁRKO
                    </h2>
                    <br>
                    <p>
                        <b>pszichiáter szakorvos</b><br>
                        <br>
                    </p>
                    <p class="szakemberinfo">

                        <a href="mailto:drgolubmarko@gmail.com">drgolubmarko@gmail.com</a><br>
                        +36 20 319 82 65
                    </p>
                    <div style="background-color:#68D1C9; color:white; padding:30px;">
                        <p>
                            FOGADÁSI IDŐ<br>
                            <div style="display:flex;">
                        <p style="margin-right:30px;">
                            Kedd<br>
                            Csütörtök <br>
                            Péntek

                        </p>

                        <p>
                            15:00 - 20:00<br>
                            8:00 - 12:00<br>
                            10:00 - 16:00

                        </p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-8 col-md-offset-2 text-left">
                <h2 style="font-size:24px; "><br>
                    MIT JELENT SZÁMOMRA A PSZICHOLÓGIA?
                </h2>
                <p>
                    <br>
                    Szakmámat hivatásnak tekintve igyekszem segíteni a lelki nehézségekkel küzdő, hozzám forduló pácienseknek. A pszichiátria számomra holisztikus, az embert egészében, testi és lelki “egységben” tekintő tudomány.
                    <br><br>
                </p>
                <h2 style="font-size:24px;">
                    SZEMLÉLETEM
                </h2>
                <p>
                    <br>
                    A pszichiátriai betegekhez kötődő ellenérzésekkel, megbélyegzéssel mindennapi életünkben gyakran találkozunk. Hitem szerint mindenki küzdhet pszichés problémákkal, és a szakemberhez való fordulás sokszor nem könnyű döntés. Bizalommal, kellő türelemmel, megértő, odaforduló magatartással igyekszem támogatni pácienseimet.
                    <br>A gyógyszeres terápia kapcsán a közös konzultációt helyezem előtérbe, a lehetséges terápiákról kellő információnyújtásra törekedve. Mindezt alapvetőnek tartom a gyógyulási folyamatban.
                    <br><br>

                </p>
                <h2 style="font-size:24px; ">
                    KÉPZETTSÉG
                </h2>
                <br>
                <p>
                    <b>2006–2011</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichiátriai szakképzés
                    <br> Semmelweis Egyetem
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2000-2006</b>
                </p>
                <p style="margin-left:50px;">
                    Általános orvosi diploma
                    <br>Semmelweis Egyetem, Általános Orvosi Kar
                    <br><br>
                </p>

                <h2 style="font-size:24px; ">
                    SZAKMAI TAPASZTALATOK
                </h2>

                <br>
                <p>
                    <b>2011 –</b>
                </p>
                <p style="margin-left:50px;">
                    Magánpraxis
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014 – </b>
                </p>
                <p style="margin-left:50px;">
                    Pszichiáter szakorvos, VI. kerületi Pszichiátriai Gondozó
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2012–2014</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichiáter szakorvos, Terézvárosi Egészségügyi Szolgálat Pszichiátriai szakrendelés                        <br><br>
                </p>

                <br>
                <p>
                    <b>2012–2013</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichiáter szakorvos, Fővárosi Önkormányzat Alacskai úti Idősek Otthona
                </p>

                <br>
                <p>
                    <b>2012–2013</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichiátriai szakorvosi ügyeleti ellátás, Jahn Ferenc Kórház
                </p>

                <br>
                <p>
                    <b>2012–2015</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichiátriai szakorvosi ügyeleti ellátás, Erzsébet Kórház Krízis Intervenciós és Pszichiátriai Osztály
                </p>

                <br>
                <p>
                    <b>2011–2012</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichiáter szakorvos, Nyírő Gyula Kórház III. Pszichiátriai Osztály
                </p>

                <br>
                <p>
                    <b>2007–2011</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichiáter szakorvosjelölt, Nyírő Gyula Kórház  II. Pszichiátriai Osztály
                </p>

                <br>
                <p>
                    <b>2006–2007</b>
                </p>
                <p style="margin-left:50px;">



                    OPNI  IV. Pszichiátriai Osztály (központi gyakornok)
                </p>
            </div>
        </div>
    </div>
</div>
</div>

<!-- H. Ágnes -->
<div class="portfolio-modal modal fade" id="portfolioModal8" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <img class="img-responsive" src="img/szp/agi_fotel.png" alt="HORNYÁK ÁGNES pszichológus">
                </div>
                <div class="col-md-4 text-left">
                    <h2 style="font-size:24px;">
                        HORNYÁK ÁGNES
                    </h2>
                    <br>
                    <p>
                        <b>pszichológus</b><br>
                        tanácsadó szakpszichológus jelölt<br>
                        <br>
                    </p>
                    <p class="szakemberinfo">

                        <a href="mailto:hornyak.agnes@gmail.com">hornyak.agnes@gmail.com</a><br>
                        +36 30 469 52 02
                    </p>
                    <div style="background-color:#68D1C9; color:white; padding:30px;">
                        <p>
                            FOGADÁSI IDŐ<br>
                            <div style="display:flex;">
                        <p style="margin-right:30px;">
                            Kedd de.<br>
                            Kedd du.

                        </p>

                        <p>
                            8:00 - 10:00<br>
                            16:00 - 20:00

                        </p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-8 col-md-offset-2 text-left">
                <h2 style="font-size:24px; "><br>
                    MIT JELENT SZÁMOMRA A PSZICHOLÓGIA?
                </h2>
                <p>
                    <br>
                    A segítői hivatás számomra a másikra való ráhangolódás és a pszichológia módszereinek egyre elmélyültebb és hitelesebb alkalmazását jelenti egy adott lelki támaszkérés mentén.
                    <br><br>
                </p>
                <h2 style="font-size:24px;">
                    SZEMLÉLETEM
                </h2>
                <p>
                    <br>
                    Egy segítő folyamatban számomra a kapcsolaton van a fókusz. Ha a segítséget kérőt kísérni tudom teljes elköteleződésemmel és jelenlétemmel, akkor azt érzem, mind a ketten éppen a legfontosabb dolgot tesszük az életünkben.
                    <br>Ha a másik, aki épp küzd pszichés életének egy megakadásával, krízisével, vagy növekedési vágyával, igyekszem a célunkat minél tisztábbá tenni, és a rendelkezésemre álló módszerekkel őt abban segíteni, hogy képes legyen autonóm módon, életbátorságában növekedni és közelíteni a közös cél felé.
                    <br><br>

                </p>
                <h2 style="font-size:24px; ">
                    KÉPZETTSÉG
                </h2>
                <br>
                <p>
                    <b>2017 –</b>
                </p>
                <p style="margin-left:50px;">
                    Integratív csoportterápiás képzés
                    <br> Integratív Hipnoterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2016 –</b>
                </p>
                <p style="margin-left:50px;">
                    Tanácsadó szakpszichológus szakirányú továbbképzés
                    <br>Eötvös Lóránt Tudomány Egyetem
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2016 –</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichodráma vezető vizsga
                    <br>Magyar Pszichodráma Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2015 –</b>
                </p>
                <p style="margin-left:50px;">
                    Integratív Pszichoterápia módszerspecifikus képzés
                    <br>Integratív Hipnoterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2013 –</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichodráma asszisztens vizsga
                    <br>Magyar Pszichodráma Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2007 –</b>
                </p>
                <p style="margin-left:50px;">
                    Gyermek Integratív Pszichoterápiás módszerspecifikus képzés elméleti szakasza
                    <br>Integratív Hipnoterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2002-2007</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológia képzés (osztatlan)
                    <br>Károli Gáspár Református Egyetem, Pszichológiai Intézet
                    <br><br>
                </p>

                <h2 style="font-size:24px; ">
                    SZAKMAI TAPASZTALATOK
                </h2>

                <br>
                <p>
                    <b>2015 –</b>
                </p>
                <p style="margin-left:50px;">
                    Életvezetési tanácsadás integratív szemléletben, egyéni vállalkozás formájában
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2008 – 2011</b>
                </p>
                <p style="margin-left:50px;">
                    Iskolapszicológus, Európa 2000 Középiskola
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2007 –</b>
                </p>
                <p style="margin-left:50px;">
                    Iskolapszichológus, Salkaházi Sára Nevelési Oktatási Központ
                    <br><br>
                </p>
            </div>
        </div>
    </div>
</div>
</div>

<!-- dr. I. Flóra -->
<div class="portfolio-modal modal fade" id="portfolioModal9" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <img class="img-responsive" src="img/szp/flora_fotel.png" alt="HORNYÁK ÁGNES pszichológus">
                </div>
                <div class="col-md-4 text-left">
                    <h2 style="font-size:24px;">
                        DR. IJJAS FLÓRA
                    </h2>
                    <br>
                    <p>
                        önismereti tanácsadó, jógatanár<br>
                        <br>
                    </p>
                    <p class="szakemberinfo">
                        <a href="http://yogatherapy.hu">yogatherapy.hu</a><br>
                        <a href="mailto:fijjas@gmail.com">fijjas@gmail.com</a><br>
                        +36 30 364 03 63
                    </p>
                    <div style="background-color:#68D1C9; color:white; padding:30px;">
                        <p>
                            FOGADÁSI IDŐ<br>
                            <div style="display:flex;">
                        <p style="margin-right:30px;">
                            Megbeszélés szerint.
                        </p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-8 col-md-offset-2 text-left">
                <h2 style="font-size:24px; "><br>
                    MIT JELENT SZÁMOMRA A PSZICHOLÓGIA?
                </h2>
                <p>
                    <br>
                    Az önismereti tanácsadás és a jógaterápia számomra a nyugati önismereti módszerek és a keleti jógafilozófia ötvözését jelenti.
                    <br>A gyakorlatban leginkább relaxációs technikákat, humanisztikus szemléletmódot és jógapszichológiát alkalmazok.
                    <br><br>
                </p>
                <h2 style="font-size:24px;">
                    SZEMLÉLETEM
                </h2>
                <p>
                    <br>
                    Nagyon érdekel az Ember. Minden sejtemmel azon vagyok, hogy megértsem, főleg, ha segítségért fordul hozzám. Kitartóan kísérem az Önmaga felé vezető úton, valamint abban, hogy kiderítse miért és hol akadt el, s hogyan lendülhet tovább az emberlétben való fejlődés irányába.
                    <br><br>
                </p>
                <h2 style="font-size:24px; ">
                    KÉPZETTSÉG
                </h2>
                <br>
                <p>
                    <b>2016 –</b>
                </p>
                <p style="margin-left:50px;">
                    Társadalomtudományok doktora (PhD)
                    <br>  Budapesti Műszaki és Gazdaságtudományi Egyetem
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2015 –</b>
                </p>
                <p style="margin-left:50px;">
                    Jóga tanár
                    <br>Integratív Pszichoterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2013 –</b>
                </p>
                <p style="margin-left:50px;">
                    Integratív hipnoterapeuta
                    <br>módszerspecifikus képzés, Integratív Pszichoterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2013 –</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológia képzés (folyamatban)
                    <br>Pécsi Tudományegyetem, Károli Gáspár Református Egyetem
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2012 –</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichodráma asszisztens
                    <br>Pszichodráma Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2012 –</b>
                </p>
                <p style="margin-left:50px;">
                    Fejlődéslélektan és Pszichopatológia képzés
                    <br>Integratív Pszichoterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2008</b>
                </p>
                <p style="margin-left:50px;">
                    Okleveles közgazdász (MSC)
                    <br>Budapesti Műszaki és Gazdaságtudományi Egyetem
                    <br><br>
                </p>

                <h2 style="font-size:24px; ">
                    SZAKMAI TAPASZTALATOK
                </h2>

                <br>
                <p>
                    <b>2014 –</b>
                </p>
                <p style="margin-left:50px;">
                    Önismereti tanácsadás
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2013 –</b>
                </p>
                <p style="margin-left:50px;">
                    Jóga tanítás
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2013 –</b>
                </p>
                <p style="margin-left:50px;">
                    Egyetemi tanársegéd, BME
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2007–2010</b>
                </p>
                <p style="margin-left:50px;">
                    Előadó, Integrál Akadémia
                    <br><br>
                </p>
            </div>
        </div>
    </div>
</div>
</div>

<!-- K. Zsófi -->
<div class="portfolio-modal modal fade" id="portfolioModal10" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <img class="img-responsive" src="img/szp/zsofi_fotel.png" alt="KOLONTAI ZSÓFI Mentálhigiénés szakember">
                </div>
                <div class="col-md-4 text-left">
                    <h2 style="font-size:24px;">
                        KOLONTAI ZSÓFI
                    </h2>
                    <br>
                    <p>
                        <b>Mentálhigiénés szakember</b><br>
                        <br>
                        <br>
                    </p>
                    <p class="szakemberinfo">

                        <a href="mailto:zskolontai@gmail.com">zskolontai@gmail.com</a><br>

                    </p>
                    <div style="background-color:#68D1C9; color:white; padding:30px;">
                        <p>
                            FOGADÁSI IDŐ<br>
                            <div style="display:flex;">
                        <p style="margin-right:30px;">
                            Megbeszélés szerint.
                        </p>
                        <p></p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-8 col-md-offset-2 text-left">
                <h2 style="font-size:24px; "><br>
                    MIT JELENT SZÁMOMRA A MENTÁLHIGIÉNÉ?
                </h2>
                <p>
                    <br>
                    Bár szerencsére manapság egyre többet foglalkozunk testünk egészségének megtartásával, tapasztalatom szerint, ha lelki elakadásról van szó, hajlamosak vagyunk elodázni, halogatni a magunkkal való „törődést”.
                    <br>Mint ahogy gyerekkorunkban elsajátítjuk az alapvető higiéniai szabályokat, úgy van szükségünk egyfajta lelki, szellemi frissesség kialakítására és megőrzésére is. Ehhez találtam segítő módszereket a mentálhigiéniában.
                    <br><br>
                </p>
                <h2 style="font-size:24px;">
                    SZEMLÉLETEM
                </h2>
                <p>
                    <br>
                    Édesanyám szerint előbb kezdtem el beszélni, mint járni… Minden bizonnyal nem akartam időt vesztegetni, és minél előbb az emberekhez való kapcsolódást kerestem. Meggyőződésem, hogy bár kapcsolataink - vagy éppen azok hiánya, diszfunkciója - okoz számunkra nehézségeket, ennek ellenére az emberi kapcsolatok igenis gyógyítólag hatnak. Munkám során arra törekszem, hogy empátiámmal, nyitott személyiségemmel, pozitív attitűdömmel hamar, oldott és bizalmi légkört teremtsek, ezzel teret adva az elfogadás megtapasztalásának, mely tovább kiséri utasát az önismeret felé.
                    <br><br>
                </p>
                <h2 style="font-size:24px; ">
                    KÉPZETTSÉG
                </h2>
                <br>
                <p>
                    <b>2016 –</b>
                </p>
                <p style="margin-left:50px;">
                    Magyar Pszichodráma Egyesület Asszisztensi képzés
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014–2016</b>
                </p>
                <p style="margin-left:50px;">
                    250 óra pszichodráma sajátélmény, csoportdinamikai szeminárium
                    <br>(pszichodráma asszisztens képzés része)
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2012–2014</b>
                </p>
                <p style="margin-left:50px;">
                    Károli Gáspár Református Egyetem, Pszichológiai Intézet, Mentálhigiéné
                    <br><br>
                </p>

                <br>
                <p>
                    <b>1997–2002</b>
                </p>
                <p style="margin-left:50px;">
                    Eötvös Lóránd Tudományegyetem angol – magyar nyelvtanári szak
                    <br><br>
                </p>

                <h2 style="font-size:24px; ">
                    SZAKMAI TAPASZTALATOK
                </h2>

                <br>
                <p>
                    <b>2017 –</b>
                </p>
                <p style="margin-left:50px;">
                    Mentálhigiénés konzultáció multinacionális cégek számára
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014 -</b>
                </p>
                <p style="margin-left:50px;">
                    Életvezetési tanácsadás, magánpraxis
                    <br><br>
                </p>
            </div>
        </div>
    </div>
</div>
</div>

<!-- K. Mária -->
<div class="portfolio-modal modal fade" id="portfolioModal11" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <img class="img-responsive" src="img/szp/maria_fotel.png" alt="KÜZMÖS MÁRIA pszichológus">
                </div>
                <div class="col-md-4 text-left">
                    <h2 style="font-size:24px;">
                        KÜZMÖS MÁRIA
                    </h2>
                    <br>
                    <p>
                        <b>pszichológus</b><br>
                        Integratív Hipnoterapeuta jelölt<br>
                        Család- és szervezetállító
                        <br>
                    </p>
                    <p class="szakemberinfo">

                        <a href="mailto:maria@kuzmos.hu">maria@kuzmos.hu</a><br>
                        +36 20 324 41 28
                    </p>
                    <div style="background-color:#68D1C9; color:white; padding:30px;">
                        <p>
                            FOGADÁSI IDŐ<br>
                            <div style="display:flex;">
                        <p style="margin-right:30px;">
                            Megbeszélés szerint.
                        </p>
                        <p></p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-8 col-md-offset-2 text-left">
                <h2 style="font-size:24px; "><br>
                    BEMUTATKOZÁS
                </h2>
                <p>
                    <br>
                    Pályafutásomat közgazdászként kezdtem, azonban már gyerekkoromban is pszichológus akartam lenni. Ez a kitérő is szükséges volt ahhoz, hogy több szempontból rálássak az emberi működésre és elköteleződjek a pszichológia mellett.
                    <br><br>
                </p>

                <h2 style="font-size:24px; "><br>
                    MIT JELENT SZÁMOMRA A PSZICHOLÓGIA?
                </h2>
                <p>
                    <br>
                    A pszichológia a hivatásom. Erőt ad, hogy azt az utat járhatom, amit szeretek és magaménak vallok. Ezzel az erővel igyekszem támogatni a hozzám fordulókat.
                    <br><br>
                </p>
                <h2 style="font-size:24px;">
                    SZEMLÉLETEM
                </h2>
                <p>
                    <br>
                    Ismerd meg önmagad!
                    <br>Saját tapasztalatból fakadó belső meggyőződésem, hogy azáltal, hogy energiát fektetek önmagam megismerésébe, kiegyensúlyozottabb és derűsebb életet élhetek. Ezért elhivatottan kísérem azokat, akik úgy döntenek, hogy elindulnak önmaguk felfedezésére.
                    <br><br>

                </p>
                <h2 style="font-size:24px; ">
                    KÉPZETTSÉG
                </h2>
                <br>
                <p>
                    <b>2016-2017</b>
                </p>
                <p style="margin-left:50px;">
                    Jógapszichoterápia és életmód tanácsadó képzés
                    <br> Narada Védikus Akadémia
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014-2016</b>
                </p>
                <p style="margin-left:50px;">
                    Integratív hipnoterapeuta módszerspecifikus képzés
                    <br>Integratív Pszichoterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2013-2015</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológia mesterképzés, klinikai és egészségpszichológia szakirány
                    <br>Szegedi Tudományegyetem
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2012–2016</b>
                </p>
                <p style="margin-left:50px;">
                    Család- és szervezetállító képzés
                    <br>Hellinger Intézet
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2010-2013</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológia alapképzés
                    <br>Debreceni Egyetem
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2004–2008</b>
                </p>
                <p style="margin-left:50px;">
                    Közgazdász - nemzetközi kommunikáció szak
                    <br>Budapesti Gazdasági Főiskola Külkereskedelmi Főiskolai Kar
                    <br><br>
                </p>

                <h2 style="font-size:24px; ">
                    SZAKMAI TAPASZTALATOK
                </h2>

                <br>
                <p>
                    <b>2016 –</b>
                </p>
                <p style="margin-left:50px;">
                    Életvezetési tanácsadás, magánpraxis
                    <br><br>
                </p>
            </div>
        </div>
    </div>
</div>
</div>

<!-- L. Sándor -->
<div class="portfolio-modal modal fade" id="portfolioModal12" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <img class="img-responsive" src="img/szp/sandor_fotel.png" alt="LŐRINCZ SÁNDOR tapasztalati szakember">
                </div>
                <div class="col-md-4 text-left">
                    <h2 style="font-size:24px;">
                        LŐRINCZ SÁNDOR
                    </h2>
                    <br>
                    <p>
                        <b>tapasztalati szakember </b><br>
                        sajátélményű segítő<br>
                        <br>
                    </p>
                    <p class="szakemberinfo">

                        <a href="mailto:szermentesen@gmail.com">szermentesen@gmail.com</a><br>
                        <a href="http://www.szermentesen.hu">szermentesen.hu</a><br>
                        +36 70 607 50 42
                    </p>
                    <div style="background-color:#68D1C9; color:white; padding:30px;">
                        <p>
                            FOGADÁSI IDŐ<br>
                            <div style="display:flex;">
                        <p style="margin-right:30px;">
                            Szombati napokon megbeszélés szerint.
                        </p>

                        <p>
                        </p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-8 col-md-offset-2 text-left">
                <h2 style="font-size:24px; "><br>
                    MIT JELENT SZÁMOMRA A SZENVEDÉLYBETEG SEGÍTÉS?
                </h2>
                <p>
                    <br>
                    Húsz éves szerhasználó időszak után, 2004–óta józanodom, 2006-óta dolgozom az életükön változtatni akaró szenvedélybetegekkel és hozzátartozóikkal, elsősorban alkohol, drog, és gyógyszer függőkkel.  A sorsazonosság megkönnyít, annak a biztonságos és empatikus légkörnek a megteremtését, ahol őszintén beszélhetünk a szerhasználat abbahagyásának lehetőségeiről és az azokkal kapcsolatos félelmekről.                         <br><br>
                </p>
                <h2 style="font-size:24px;">
                    SZEMLÉLETEM
                </h2>
                <p>
                    <br>
                    Segítői munkám a „betegségelv” –re, és rendszerszemléletre épül, e szerint a függőség krónikus és progresszív betegség, mely a szerhasználóra és a környezetében élőkre is romboló hatással van. Saját és a munkámban szerzett tapasztalataim alapján, úgy gondolom a szerhasználat (a választott szertől függetlenül) egyfajta öngyógyítás. Egy viszonylag egyszerű módja, hogy felülírjuk a nehéz, romboló érzéseinket.  A szermentesség elérése után, új megoldásokat kell találnunk érzéseink kezelésére, hogy szerek nélkül is jól érezzük magunkat a bőrünkben, ami elengedhetetlen a tartós józansághoz.  A szerhasználat abbahagyása nem pusztán akaraterő kérdése, fontos a nyitottság és a bátorság, hogy változtatni tudjunk eddigi életükön.
                    <br><br>

                </p>
                <h2 style="font-size:24px; ">
                    KÉPZETTSÉG
                </h2>
                <br>
                <p>
                    <b>2015 –</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichodinamikus mozgás- és táncterápiás csoportvezető módszerspecifikus képzés
                    <br> Magyar Mozgás- és Táncterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2010–2012</b>
                </p>
                <p style="margin-left:50px;">
                    Színházterapeuta módszerspecifikus képzés
                    <br>az INDIT közalapítvány és Magyar Mozgás- és Táncterápiás Egyesület szervezésében
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2007</b>
                </p>
                <p style="margin-left:50px;">
                    Szociálterápiás szerepjáték alkalmazó módszerspecifikus képzés
                    <br><br>
                </p>

                <h2 style="font-size:24px; ">
                    SZAKMAI TAPASZTALATOK
                </h2>

                <br>
                <p>A munkahelyeim mellet, az elmúlt években a következő intézményekkel működtem/ működöm együtt különböző programokban:</p>
                <br>
                <p><i>Józanság megtartó csoport:</i></p>
                <br>
                <p>Nyírő Gyula kórház – addiktológiai rehabilitációs osztály, Gálfi Béla kórház - Kiskovácsi</p>
                <br>
                <p><i>Prevenció:</i></p>
                <br>
                <p>Lauder Javne Iskola, Óbudai Waldorf Iskola, Kürt – Alapítványi Gimnázium</p>
                <p>TEGYESZ – Erzsébet királyné útja</p>
                <br>
                <p>
                    <b>2013 -</b>
                </p>
                <p style="margin-left:50px;">
                    Kékpont Alapítvány, közösségi gondozó
                    <br><br>
                </p>
                <br>
                <p>
                    <b>2013 -</b>
                </p>
                <p style="margin-left:50px;">
                    Félúton Alapítvány, Orczy Klub, közösségi gondozó
                    <br><br>
                </p>
                <br>
                <p>
                    <b>2011-2013</b>
                </p>
                <p style="margin-left:50px;">
                    Megálló Csoport Alapítvány Szenvedélybetegekért, közösségi gondozó
                    <br><br>
                </p>
                <br>
                <p>
                    <b>2006-2011</b>
                </p>
                <p style="margin-left:50px;">
                    Mérföldkő Egyesület rehabilitációs otthona, terápiás munkatárs
                    <br><br>
                </p>

            </div>
        </div>
    </div>
</div>
</div>

<!-- S. Barbara -->
<div class="portfolio-modal modal fade" id="portfolioModal13" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <img class="img-responsive" src="img/szp/barbi_fotel.png" alt="HORNYÁK ÁGNES pszichológus">
                </div>
                <div class="col-md-4 text-left">
                    <h2 style="font-size:24px;">
                        SOLTI BARBARA
                    </h2>
                    <br>
                    <p>
                        <b>pszichológus</b><br>
                        klinikai szakpszichológus jelölt<br>
                        <br>
                    </p>
                    <p class="szakemberinfo">

                        <a href="mailto:solti.barbara.nikolett@gmail.com">solti.barbara.nikolett@gmail.com</a><br>
                        +36 30 575 51 29
                    </p>
                    <div style="background-color:#68D1C9; color:white; padding:30px;">
                        <p>
                            FOGADÁSI IDŐ<br>
                            <div style="display:flex;">
                        <p style="margin-right:30px;">
                            Csütörtök<br>
                            Péntek

                        </p>

                        <p>
                            17:00 - 20:00<br>
                            17:00 - 20:00

                        </p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-8 col-md-offset-2 text-left">
                <h2 style="font-size:24px; "><br>
                    MIT JELENT SZÁMOMRA A PSZICHOLÓGIA?
                </h2>
                <p>
                    <br>
                    A pszichológia számomra egy eszköz, ami lehetőséget biztosít arra, hogy jobban megismerhessük és megérthessük önmagunkat, valamint a körülöttünk levő világot.
                    <br><br>
                </p>
                <h2 style="font-size:24px;">
                    SZEMLÉLETEM
                </h2>
                <p>
                    <br>
                    Minden ember életében adódnak olyan helyzetek, amelyek nehézséget jelentenek a számunkra. Van olyan, aki könnyedebben kezeli ezeket a szituációkat, van olyan, akinek ez nagyobb kihívást jelent. Célom az, hogy ezekben a nehéznek tűnő pillanatokban segítséget és támogatást tudjak nyújtani, legyen szó akár testi megbetegedésről (pl. daganatos megbetegedések), vagy lelki problémáról, illetve hogy közös erővel megtaláljuk az Ön számára legjobb megoldást.
                    <br>“Az igazi kihívás az ember számára, hogy megtalálja az utat önmagához.” (Hermann Hesse)
                    <br><br>
                </p>
                <h2 style="font-size:24px; ">
                    KÉPZETTSÉG
                </h2>
                <br>
                <p>
                    <b>2016 –</b>
                </p>
                <p style="margin-left:50px;">
                    Klinikai és mentálhigiéniai szakpszichológus szakképzés
                    <br> Semmelweis Egyetem
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2015 –</b>
                </p>
                <p style="margin-left:50px;">
                    Indiviuálpszichológia módszerspecifikus felnőtt szakirányú tanácsadó képzés
                    <br>módszerspecifikus képzés, Magyar Individuálpszichológiai Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2015 –</b>
                </p>
                <p style="margin-left:50px;">
                    Gyógyító képzelet (forrás C. Simonton) tréning
                    <br>akkreditált továbbképzés, Vadaskert Alapítvány
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014–2015</b>
                </p>
                <p style="margin-left:50px;">
                    Autogén tréning
                    <br>módszerspecfikus képzés, Magyar Relaxációs és Szimbólumterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2012–2014</b>
                </p>
                <p style="margin-left:50px;">
                    Klinikai- és egészségpszichológus specializáció
                    <br>mester képzés, ELTE Pedagógiai és Pszichológiai Kar
                    <br><br>
                </p>

                <h2 style="font-size:24px; ">
                    SZAKMAI TAPASZTALATOK
                </h2>

                <br>
                <p>
                    <b>2017 –</b>
                </p>
                <p style="margin-left:50px;">
                    Fejér Megyei Gesztenyés Egyesített Szociális Intézmény; Pszichiátriai betegek otthona
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2016 – 2017</b>
                </p>
                <p style="margin-left:50px;">
                    Egyesített Szent István és Szent László Kórház –
                    <br>Rendelőintézet; Merényi Gusztáv Kórház, Pszichiátriai és Addiktológiai Centrum, Pszichiátriai Osztály
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014 – 2016</b>
                </p>
                <p style="margin-left:50px;">
                    Fővárosi Pedagógia Szakszolgálat, XXII. Kerületi Tagintézménye
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014 – 2016</b>
                </p>
                <p style="margin-left:50px;">
                    Klebelsberg Intézményfenntartó Központ, XXII. Kerületi Tagintézménye
                    <br><br>
                </p>


                <h2 style="font-size:24px; ">
                    ÖNKÉNTESSÉG
                </h2>

                <br>
                <p>
                    <b>2015 – 2016</b>
                </p>
                <p style="margin-left:50px;">
                    Szent Margit Kórház, Onkológiai Osztály
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2013 – 2016</b>
                </p>
                <p style="margin-left:50px;">
                    A RÁK ELLEN, AZ EMBERÉRT, A HOLNAPÉRT Társadalmi Alapítvány <br><br>
                </p>

                <br>
                <p>
                    <b>2013 – 2014</b>
                </p>
                <p style="margin-left:50px;">
                    Tűzmadár Alapítvány A Minőségi Életért
                    <br><br>
                </p>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Sz. Dorottya -->
<div class="portfolio-modal modal fade" id="portfolioModal14" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <img class="img-responsive" src="img/szp/dorka_fotel.png" alt="SZÉLES DOROTTYA pszichológus">
                </div>
                <div class="col-md-4 text-left">
                    <h2 style="font-size:24px;">
                        SZÉLES DOROTTYA
                    </h2>
                    <br>
                    <p>
                        <b>pszichológus</b><br>
                        autogén tréner<br>
                        <br>
                    </p>
                    <p class="szakemberinfo">

                        <a href="mailto:szelesdorottya@gmail.com">szelesdorottya@gmail.com</a><br>
                        +36 30 181 12 83
                    </p>
                    <div style="background-color:#68D1C9; color:white; padding:30px;">
                        <p>
                            FOGADÁSI IDŐ<br>
                            <div style="display:flex;">
                        <p style="margin-right:30px;">
                            Hétfő <br>
                            Csütörtök<br>
                            Péntek<br>
                        </p>

                        <p>
                            16:00 - 20:00 <br>
                            16:00 - 20:00 <br>
                            9:00 - 12:00<br>
                        </p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-8 col-md-offset-2 text-left">
                <h2 style="font-size:24px; "><br>
                    MIT JELENT SZÁMOMRA A PSZICHOLÓGIA?
                </h2>
                <p>
                    <br>
                    Olyan mentális tér, tágra szabott gondolkodási keret, amely lehetőséget ad emberi mivoltunk mélyebb megértésére. Ebben a térben szabadok vagyunk a kapcsolódásra, kreativitásra, fejlődésre.
                    <br><br>
                </p>
                <h2 style="font-size:24px;">
                    SZEMLÉLETEM
                </h2>
                <p>
                    <br>
                    Hiszem, hogy időnk előrehaladtával egyre többet tudhatunk meg arról, hogyan élhetünk saját magunkkal és környezetünkkel harmóniában. Számomra ez tapasztalást, és a tapasztalásban rejlő erőt is magában foglalja. Vannak azonban olyan nehézségek, amelyeket nem megoldani tudunk, de talán képesek vagyunk túljutni, túlnőni rajtuk. Alázatot tanulunk. Úgy tapasztalom, hogy a nehézségek meghaladásának képessége a személyiségben már meglévő kreatív erő. A mi feladatunk az, hogy ennek az erőnek teret adjunk. Ebben a folyamatban szegődöm klienseim mellé kísérőként; ez az együttes folyamat engem is tanít és sok örömöt ad.
                    <br><br>

                </p>
                <h2 style="font-size:24px; ">
                    KÉPZETTSÉG
                </h2>
                <br>
                <p>
                    <b>2017 –</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichodinamikus mozgás- és táncterápiás csoport módszerspecifikus képzés
                    <br>Magyar Mozgás- és Táncterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014-2016</b>
                </p>
                <p style="margin-left:50px;">
                    Body-Mind Centering ® módszer tanulása
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2015</b>
                </p>
                <p style="margin-left:50px;">
                    Mediátor alap- és haladó képzés
                    <br>Lege Artis Kft.
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2010-2012</b>
                </p>
                <p style="margin-left:50px;">
                    Klinikai és egészségpszichológiai mesterképzés
                    <br>Károli Gáspár Református Egyetem, Pszichológiai Intézet
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2009-2011</b>
                </p>
                <p style="margin-left:50px;">
                    Komplex kortársoktató képzés
                    <br>Kompánia Alapítvány
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2009-2010</b>
                </p>
                <p style="margin-left:50px;">
                    Relaxációs módszerspecifikus képzés
                    <br>Magyar Relaxációs és Szimbólumterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2007-2010</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológia alapképzés
                    <br>Károli Gáspár Református Egyetem, Pszichológiai Intézet
                    <br><br>
                </p>

                <h2 style="font-size:24px; ">
                    SZAKMAI TAPASZTALATOK
                </h2>

                <br>
                <p>
                    <b>2017 –</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológus, Kesztyűgyár Közösségi Ház
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014 –</b>
                </p>
                <p style="margin-left:50px;">
                    Életvezetési tanácsadás, magánpraxis
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2012 –</b>
                </p>
                <p style="margin-left:50px;">
                    Önismereti csoportok vezetése a Pálferi, Teljes Életért Közhasznú Alapítvány
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2016.</b>
                </p>
                <p style="margin-left:50px;">
                    Közösségi gondozó, Megálló Csoport Alapítvány Szenvedélybetegért
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2014 – 2016</b>
                </p>
                <p style="margin-left:50px;">
                    Pártfogó felügyelő, Pest Megyei Kormányhivatal, Igazságügyi Szolgálat
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2013 – 2014</b>
                </p>
                <p style="margin-left:50px;">
                    EVS önkéntes, pszichológus, Amber Initiatives (Nagy Britannia)
                    <br><br>
                </p>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Sz. Lili -->
<div class="portfolio-modal modal fade" id="portfolioModal15" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <img class="img-responsive" src="img/szp/lili_fotel.png" alt="SZIRTES LILI pszichológus">
                </div>
                <div class="col-md-4 text-left">
                    <h2 style="font-size:24px;">
                        SZIRTES LILI
                    </h2>
                    <br>
                    <p>
                        <b>pszichológus</b><br>
                        pszichodráma asszisztens<br>
                        integratív hipnoterapeuta jelölt<br>
                        <br>
                    </p>
                    <p class="szakemberinfo">

                        <a href="mailto:szirteslili@gmail.com">szirteslili@gmail.com</a><br>
                        +36 20 326 89 54
                    </p>
                    <div style="background-color:#68D1C9; color:white; padding:30px;">
                        <p>
                            FOGADÁSI IDŐ<br>
                            <div style="display:flex;">
                        <p style="margin-right:30px;">
                            Szerda<br>
                            Csütörtök<br>
                            Péntek<br>
                        </p>

                        <p>
                            17:00 - 21:00<br>
                            9:00 - 14:00<br>
                            16:00 - 20:00<br>
                        </p>
                    </div>
                    </p>
                </div>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-8 col-md-offset-2 text-left">
                <h2 style="font-size:24px; "><br>
                    MIT JELENT SZÁMOMRA A PSZICHOLÓGIA?
                </h2>
                <p>
                    <br>
                    A pszichológiára, mint életszemléletre tekintek, amely a külső és legbensőbb világunkban egyaránt a mélyebb tudatosság megtapasztalását segíti elő.
                    <br><br>
                </p>
                <h2 style="font-size:24px;">
                    SZEMLÉLETEM
                </h2>
                <p>
                    <br>
                    Az életünk természetes része a változás, amely kisebb-nagyobb hullámvölgyekkel-hegyekkel tarkított. Felfoghatjuk ezt úgy, mint egy érzelmekben, izgalmakban gazdag színházi előadást. A választás szabadsága abban áll, hogy az ember e darabban nézőként vagy alkotóként vállal-e szerepet.
                    <br><br>

                </p>
                <h2 style="font-size:24px; ">
                    KÉPZETTSÉG
                </h2>

                <br>
                <p>
                    <b>2017 -</b>
                </p>
                <p style="margin-left:50px;">
                    Tanácsadó szakpszichológus szakirányú továbbképzés
                    <br>ELTE Pedagógiai és Pszichológiai Kar
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2015-2016</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichodráma asszisztens módszerspecifikus képzés
                    <br>Magyar Pszichodráma Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2015 –</b>
                </p>
                <p style="margin-left:50px;">
                    Integratív hipnoterapeuta módszerspecifikus képzés
                    <br>Integratív Pszichoterápiás Egyesület
                    <br><br>
                </p>

                <br>
                <p>
                    <b>2010-2013</b>
                </p>
                <p style="margin-left:50px;">
                    Klinikai pszichológiai és egészségpszichológiai mesterképzés
                    <br>Károli Gáspár Református Egyetem, Pszichológiai Intézet
                    <br><br>
                </p>
                <br>
                <p>
                    <b>2007-2010</b>
                </p>
                <p style="margin-left:50px;">
                    Pszichológia alapképzés
                    <br>Károli Gáspár Református Egyetem, Pszichológiai Intézet
                    <br><br>
                </p>

                <h2 style="font-size:24px; ">
                    SZAKMAI TAPASZTALATOK
                </h2>
                <br>

                <div>
                    <p>
                        <b>2016 -</b>
                    </p>
                    <p style="margin-left:50px;">
                        Óraadó: Csoportdinamika és filmes pszichodráma kurzus
                        <br>KRE-BTK Pszichológiai Intézet
                        <br><br>
                    </p>
                    <p>
                        <b>2016 -</b>
                    </p>
                    <p style="margin-left:50px;">
                        Életvezetési tanácsadás,
                        <br> magánpraxis
                        <br><br>
                    </p>
                    <p>
                        <b>2016 -</b>
                    </p>
                    <p style="margin-left:50px;">
                        Érzékenyítő előadássorozat droghasználatról 12-14 éveseknek
                        <br><br>
                    </p>
                    <p>
                        <b>2015 -</b>
                    </p>
                    <p style="margin-left:50px;">
                        Tanácsadó, coach
                        <br>Come&Grow
                        <br><br>
                    </p>
                    <p>
                        <b>2013 -</b>
                    </p>
                    <p style="margin-left:50px;">
                        Inside Business Partner
                        <br>FranklinCovey Magyarország
                        <br><br>
                    </p>
                    <p>
                        <b>2013 -</b>
                    </p>
                    <p style="margin-left:50px;">
                        Óvodapszichológus
                        <br>Törökbálinti Bóbita Óvoda
                        <br><br>
                    </p>
                    <p>
                        <b>2010</b>
                    </p>
                    <p style="margin-left:50px;">
                        L’élek Egyesület Alapító tag, Elnök
                        <br><br>
                    </p>
                    <p>
                        <b>2009 - 2012</b>
                    </p>
                    <p style="margin-left:50px;">
                        Krízisintervenciós és drogprevenciós kortárssegítő
                        <br>Helperek Önkéntes Segítők Közhasznú Egyesülete
                        <br><br>
                    </p>
                </div>

                <h2 style="font-size:24px;">
                    PUBLIKÁCIÓK, KONFERENCIA-ELŐADÁSOK
                </h2>
                <p>
                    <br>
                    Szirtes L. (2013). <i> Fantom a tükörben: A transzgenerációs traumaátadás megjelenése álmokban. </i> In. IMAGO Budapest, 2013/2.: Álomszövegek és – metaforák: 93-104.
                    <br><br>
                    Szirtes L. (2013). <i> HIV-vel élők identitás-rekonstrukciója: a Tükör-stádium újrajátszása. </i> Magyar Pszichoanalitikus Egyesület XX. Centenáriumi Konferenciája: A jelent mozgató múlt, 2013. 10. 11-12.
                    <br><br>

                </p>
            </div>
        </div>
    </div>
</div>
</div>


<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="js/freelancer.min.js"></script>

<script type="text/javascript">
    // Hide Header on on scroll down
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = 100;

    $(window).scroll(function(event){
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = $(this).scrollTop();

        // Make sure they scroll more than delta
        if(Math.abs(lastScrollTop - st) <= delta)
            return;

        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight){
            // Scroll Down
            $('#MagicMenu').removeClass('nav-down').addClass('nav-up');
        } else {
            // Scroll Up
            if(st + $(window).height() < $(document).height()) {
                $('#MagicMenu').removeClass('nav-up').addClass('nav-down');
            }
        }

        lastScrollTop = st;
    }
</script>

</body>

</html>

