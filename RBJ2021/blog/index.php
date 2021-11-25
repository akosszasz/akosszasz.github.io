<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 11. 21.
 * Time: 17:33
 */
require('settings.php');
siteContent($catConn);
/**
 * Aktuális szekció
 */
$actQ = @mysqli_query($catConn,"SELECT * FROM ".PREFIX."_sections WHERE (ID = 1) LIMIT 1");
$actA = @mysqli_fetch_array($actQ);
$actKep = 'includes/elements/uploads/sec-img/'.$actA['secKep'];
$actCim = $actA['secCim'];
$actAl =   $actA['secAlcim'];
$zI = 10;
?>
<!--<div class="fix-box" style="z-index:<?php /*echo $zI; */?>">
    <div class="doboz-aktualis">
        <a id="Aktuális" href="aktualis">
            <h2><?php /*echo $actCim; */?></h2>
            <p>
                <?php /*echo $actAl; */?>
            </p>
        </a>
    </div>
</div>
<section id="aktualis" style="background-image: url('<?php /*echo $actKep; */?>')">
    <div class="container main-sec">
        <div class="row"><?php
/*            $actQ = @mysqli_query($catConn,"SELECT * FROM ".PREFIX."_content WHERE (sectionID = 1) ORDER BY cikkSorrend ASC, timeCreated DESC LIMIT 16");

            while($actR = @mysqli_fetch_array($actQ)){
                //Adatok kiszűrése
                $actID = $actR['ID'];
                $actCim = str_replace("\r\n","<br>", $actR['cikkCim']);
                $actKiv = str_replace("\r\n","<br>", $actR['cikkLeiras']);
                $actKiv = limit_words($actKiv,26);
                $actIMG = $actR['dobozKep'];
                $actIMGslide = $actR["kiemeltKep"];
                $actURL = $actR['cikkURL'];
                //Ha nincs kép, akkor háttérszínes div
                if($actIMG != NULL && $actIMGslide != NULL){
                    //Kiíratás
                    echo "
                <div class=\"col-md-3 main\">
                    <a href=\"$actURL\" target='_self'>
                        <div class=\"box\" style=\"background-image: url('site-operator/includes/uploads/site-img/$actID/$actIMG')\">
                            <div class='box-text'>
                                <h3>$actCim</h3>
                                <p>
                                    $actKiv
                                </p>
                            </div>
                        </div>
                    </a>
                </div>";
                }
            }

            */?>

        </div>
    </div>
</section>-->
<!-- DESIGN RÉSZ -->
<!DOCTYPE html>
<html lang="hu">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Rend.Be.Jössz Tanácsadó Központ">
    <!-- SEO -->
    <meta name="keywords" content="pszichologia">
    <meta name="description" content="Érdekes cikkek és téma feldomgozások pszichológia témakörben">
    <meta name="robots" content="index, follow">
    <!-- FACEBOOK -->
    <meta property="og:url" content="http://rendbejossz.hu/pszichologia-blog">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Rend.Be.Jössz Tanácsadó Központ oszichológia blog">
    <meta property="og:description" content="Érdekes cikkek és téma feldomgozások pszichológia témakörben">
    <meta property="og:image" content="http://rendbejossz.hu/img/blogicon-face.jpg">
    <meta property="og:image:alt" content="Rend.Be.Jössz Tanácsadó Központ">

    <title>Rend.Be.Jössz Tanácsadó Központ</title>

    <link rel="icon" href="img/logofav.ico">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

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
                <a id="" class="menuicon" href="pszichologia-blog"><img src="img/blog.svg" alt="pszichológia blog"></a>
                <a id="" class="menuicon" href="kapcsolat"><img src="img/contact.svg" alt="kapcsolat"></a>
                <ul class="nav navbar-nav navbar-right">
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- Header -->
<section id="sub-header" style="margin-bottom:-120px; position:relative; overflow:hidden;">
    <div style=" margin-bottom:-10px;">
        <div id="bigicon-wrapper">
            <div id="bigicon">
                <img src="img/blogbig.svg" alt="pszichologia blog">
            </div>
        </div>
    </div>
</section>
<!-- Content section -->

<section class="container blog">
    <!--<div class="row">
        <h1 class="text-center blog">Pszichológia blog</h1>
    </div>-->
    <div class="row">
        <?php
        $actQ = @mysqli_query($catConn, "SELECT * FROM ".PREFIX."_content WHERE (sectionID = 1) ORDER BY cikkSorrend ASC, timeCreated DESC LIMIT 1000");

        while ($actR = @mysqli_fetch_array($actQ)) {
            //Adatok kiszűrése
            $actID = $actR['ID'];
            $actCim = str_replace("\r\n", "<br>", $actR['cikkCim']);
            $actKiv = str_replace("\r\n", "<br>", $actR['cikkLeiras']);
            $actKiv = limit_words($actKiv, 26);
            $actIMG = $actR['dobozKep'];
            $actIMGslide = $actR["kiemeltKep"];
            $actURL = $actR['cikkURL'];
            //Ha nincs kép, akkor háttérszínes div
            if ($actIMG != NULL && $actIMGslide != NULL) {
                //Kiíratás
                echo "
                        <div class=\"col-md-3\">
                            <a class='box-a' href=\"pszichologia-blog/$actURL\" target='_self'>
                                <!--div class=\"box\" style=\"background-image: url('site-operator/includes/uploads/site-img/$actID/$actIMG')\"-->
                                <img class='img-responsive box-img' src=\"../site-operator/includes/uploads/site-img/$actID/$actIMG\">
                                   <div class='box-text'>
                                       <h2>$actCim</h2>
                                       <h3>
                                           $actKiv
                                       </h3>
                                   </div>                                
                            </a>
                        </div>";
            }
        }
        ?>
    </div>
</section>



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
                    <a class="menuicon-s" href="pszichologia-blog"><img src="img/blog.svg" height="100px" alt="pszichológia blog"></a>
                </div>
                <div class="col-xs-6">
                    <a class="menuicon-s" href="kapcsolat.html"><img src="img/contact.svg" height="100px" alt="kapcsolat"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <span class="text-muted">Rend.Be.Jössz - <a href="mailto:info@rendbejossz.hu">info@rendejossz.hu</a></span>
            </div>
            <div class="col-md-6 text-center">
                <span class="text-muted">design by <a href="http://zugmuhely.com" target="_blank">ZUG műhely</a> | developed by <a href="https://godla.hu" target="_blank">Godla Imre</a></span>
            </div>
        </div>
    </div>
</footer>

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
