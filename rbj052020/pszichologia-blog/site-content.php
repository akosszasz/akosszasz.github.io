<!DOCTYPE html>
<html lang="hu">

<head>
<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 11. 22.
 * Time: 15:54
 */
//SEO
seo($catConn);
?>
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
                <a id="" class="menuicon" href="/"><img src="/img/home.svg" alt="logo"></a>
                <a id="" class="menuicon" href="/gyerekeknek"><img src="/img/kids.svg" alt="gyerekeknek"></a>
                <a id="" class="menuicon" href="/felnotteknek"><img src="/img/adults.svg" alt="felnőtteknek"></a>
                <a id="" class="menuicon" href="/szakemberek"><img src="/img/professionals.svg" alt="szakemberek"></a>
                <a id="" class="menuicon" href="/arak"><img src="/img/prices.svg" alt="árak"></a>
                <a id="" class="menuicon" href="/teremberles"><img src="/img/rent.svg" alt="terembérlés"></a>
                <a id="" class="menuicon" href="/pszichologia-blog"><img src="/img/blog.svg" alt="pszichológia blog"></a>
                <a id="" class="menuicon" href="/kapcsolat"><img src="/img/contact.svg" alt="kapcsolat"></a>
                <ul class="nav navbar-nav navbar-right">
                </ul>
            </div>
        </div>
    </nav>
</div>
    <?php
/**
 * Cikk aloldal megjelenítő
 * Aktuális, szolgáltatások, tánctanárok, fő slider cikkek.
 */
$cikkURL = ltrim(filter_input(INPUT_SERVER,"PATH_INFO"),'/');
$cikkCQ = @mysqli_query($catConn,"SELECT * FROM ".PREFIX."_content WHERE cikkURL = '$cikkURL'");
$cikkCA = @mysqli_fetch_array($cikkCQ);
$cikkC = $cikkCA['cikkCim'];
$cikkAl = str_replace("\r\n","<br>", $cikkCA['cikkLeiras']);
$cikkTa = str_replace("\r\n","<br>", $cikkCA['cikkTartalom']);
$cikkID = $cikkCA['ID'];
//$cikkKep = 'includes/elements/uploads/site-img/'.$cikkCA['kiemeltKep'];
$cikkKep = '/site-operator/includes/uploads/site-img/'.$cikkID.'/'.$cikkCA['kiemeltKep'];
?>
    <div class="cikk-kep">
        <img class="img-responsive header-w" src="../../img/HEADER_BG_W.png" alt="header white"/>
        <img class="img-responsive header-img" src="<?php echo $cikkKep; ?>" alt="<?php echo $cikkC; ?>"/>
    </div>
    <section class="aloldal">
        <article class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-12 text-center">
                        <h1 class="content-heading"><?php echo $cikkC ?></h1>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <h2 class="content-heading text-center"><?php echo $cikkAl ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 aloldal text-justify">
                        <!-- <p class="aloldal">
                            <?php /*echo $cikkTa */?>

                        </p>-->
                        <?php echo $cikkTa ?>
                    </div>
                </div>
            </div>
        </article>
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
                    <a class="menuicon-s" href="/"><img src="/img/home.svg" height="100px" alt="logo"></a>
                </div>
                <div class="col-xs-6">
                    <a class="menuicon-s" href="/gyerekeknek"><img src="/img/kids.svg" height="100px" alt="gyerekeknek"></a>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-6">
                    <a class="menuicon-s" href="/felnotteknek"><img src="/img/adults.svg" height="100px" alt="felnőtteknek"></a>
                </div>
                <div class="col-xs-6">
                    <a class="menuicon-s" href="/szakemberek"><img src="/img/professionals.svg" height="100px" alt="szakemberek"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <a class="menuicon-s" href="/arak"><img src="/img/prices.svg" height="100px" alt="árak"></a>
                </div>
                <div class="col-xs-6">
                    <a class="menuicon-s" href="/teremberles"><img src="/img/rent.svg" height="100px" alt="terembérlés"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <a class="menuicon-s" href="/pszichologia-blog"><img src="/img/blog.svg" height="100px" alt="pszichológia blog"></a>
                </div>
                <div class="col-xs-6">
                    <a class="menuicon-s" href="/kapcsolat"><img src="/img/contact.svg" height="100px" alt="kapcsolat"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('footer.php')?>

<!-- jQuery -->
<script src="/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="/js/jqBootstrapValidation.js"></script>
<script src="/js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="/js/freelancer.min.js"></script>

<!-- GDPR -->
<script src="/js/gdpr_for_categorycms.js"></script>

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
<?php exit();?>