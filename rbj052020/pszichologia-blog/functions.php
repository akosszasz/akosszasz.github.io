<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 11. 21.
 * Time: 17:44
 */

/**
 * Ez a fájl tartalmazza az oldalt működtető fő funkciókat. A fájl önállóan nem nyitható meg a böngésőben.
 */

//Ha direkt szeretnék megnyitni a functions.inc-t, akkor a beállított címre küldi az "érdeklődőt".
if (!defined('SZABAD')){
    define('ATIRANYIT',FRONTEND);
    header('location: '.ATIRANYIT);
    exit();
}
//php fájl direkt megnyitásának tiltása
$erKn = 'Si5QÚ-'.SZABAD.'#hEt5%lk!ű';
function tilt($erKn){
    if (!$erKn){
        header('location: '.ATIRANYIT);
    }
}
/*** Admin felület ***/
if(filter_input(INPUT_GET,'p') == 'operator'){
    header("location: site-operator/operator.php");
}
/*** SEO és TITLE***/
//$seoURL = filter_input(INPUT_GET,"p");
//$seoURL értéke szerint, ami a link, megjeleníti a cikk aloldal vagy szekció aloldal seo tartalmát. Ha null, akkor a főoldali seo-t tölti be. Ha a 404 aloldalra küld, akkor a 404 seo-t tölti be.
//seo robots alapértelmezett értéke a cikkekhez igazítva: index, nofollow.
function seo($catConn){
    $seoURL = ltrim(filter_input(INPUT_SERVER,"PATH_INFO"),'/');
    if($seoURL != NULL){
        //Ha nem nulla, akkor először cikkre ellenőrzök
        $cikkID1 = @mysqli_query($catConn,"SELECT ID,cikkCim FROM ".PREFIX."_content WHERE (cikkURL = '$seoURL') LIMIT 1");
        $cikkID2 = @mysqli_fetch_array($cikkID1);
        $cikkID = $cikkID2['ID'];
        $title = $cikkID2['cikkCim'].' - Rend.Be.Jössz Tanácsadó Központ';
		$seoImg = 'site-operator/includes/uploads/site-img/'.$cikkID.'/'.$cikkID2['kiemeltKep'];
        if ($cikkID != NULL){
            //Ha talált ID-t, akkor kiírom a seo adatokat.
            $seoD1 = @mysqli_query($catConn,"SELECT * FROM ".PREFIX."_seo WHERE (seoID = '1' AND oldalID = '$cikkID') LIMIT 1");
            $seoD2 = @mysqli_fetch_array($seoD1);
            $seoKey = $seoD2['keywords'];
            $seoDesc = $seoD2['description'];
            $seoRob = $seoD2['robots'];
            //kiírom az adatokat
            echo "    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"author\" content=\"Rend.Be.Jössz Tanácsadó Központ\">
    
    <title>$title</title>
    
    <link rel=\"icon\" href=\"/img/logofav.ico\">
    
    <meta name=\"keywords\" content=\"$seoKey\">
    <meta name=\"description\" content=\"$seoDesc\">
    <meta name=\"robots\" content=\"$seoRob\">
    
    <meta property=\"og:url\" content=\"http://rendbejossz.hu/pszichologia-blog/index.php/$seoURL\">
    <meta property=\"og:type\" content=\"website\">
    <meta property=\"og:title\" content=\"$title\">
    <meta property=\"og:description\" content=\"$seoDesc\">
    <meta property=\"og:image\" content=\"http://rendbejossz.hu/$seoImg\">
    <meta property=\"og:image:alt\" content=\"Rend.Be.Jössz Tanácsadó Központ\">
    
    <!-- Bootstrap Core CSS -->
    <link href=\"/vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">

    <!-- Theme CSS -->
    <link href=\"/css/theme.css\" rel=\"stylesheet\">
    <link href=\"/css/custom.css\" rel=\"stylesheet\">

    <!-- Custom Fonts -->
    <link href=\"/vendor/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
    <link href=\"https://fonts.googleapis.com/css?family=Montserrat:400,700\" rel=\"stylesheet\" type=\"text/css\">
    <link href=\"https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic\" rel=\"stylesheet\" type=\"text/css\">

    <!--Global site tag (gtag.js) - Google Analytics-->
    <script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-108723637-1\"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108723637-1');
  </script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
  <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
  <![endif]-->
";
        } elseif(!$cikkID) {
            //Ha nem talált cikket, akkor megvizsgálom, hogy szekciót talál-e
            $secID1 = @mysqli_query($catConn,"SELECT ID,secCim FROM ".PREFIX."_sections WHERE (secURL = '$seoURL') LIMIT 1");
            $secID2 = @mysqli_fetch_array($secID1);
            $secID = $secID2['ID'];
            $title = $secID2['secCim'];
            if ($secID != NULL){
                //Ha talált ID-t, akkor kiírom a seo adatokat.
                $seoD1 = @mysqli_query($catConn,"SELECT * FROM ".PREFIX."_seo WHERE (seoID = '2' AND oldalID = '$secID') LIMIT 1");
                $seoD2 = @mysqli_fetch_array($seoD1);
                $seoKey = $seoD2['keywords'];
                $seoDesc = $seoD2['description'];
                $seoRob = $seoD2['robots'];
                //kiírom az adatokat
                echo "    <meta name=\"keywords\" content=\"$seoKey\">
    <meta name=\"description\" content=\"$seoDesc\">
    <meta name=\"robots\" content=\"$seoRob\">
    <title>$title</title>
";
            } elseif(!$secID){
                //Ha nincs szekció ID sem, akkor 404 seo-t jelenítek meg. Ezt itt írom meg.
                //kiírom az adatokat
                echo "<meta name=\"keywords\" content=\"404!\">
    <meta name=\"description\" content=\"A keresett oldal nem található.\">
    <meta name=\"robots\" content=\"noindex, nofollow\">
    <title>404! - Salsa Mojito Tánciskola</title>
";
            }
        }

    } else {
        //Ha üres az URL, akkor főoldalon vagyok és a főoldali seo-t jelenítem meg.
        $seoF1 = @mysqli_query($catConn,"SELECT * FROM ".PREFIX."_seo WHERE (seoID = 0) LIMIT 1");
        $seoF = @mysqli_fetch_array($seoF1);
        $seoKey = $seoF['keywords'];
        $seoDesc = $seoF['description'];
        $seoRob = $seoF['robots'];
        $titleQ = @mysqli_query($catConn,"SELECT adat FROM ".PREFIX."_settings WHERE (megnevezes = 'weboldalCim') LIMIT 1");
        $titleA = @mysqli_fetch_array($titleQ);
        $title = $titleA['adat'];
        //kiírom az adatokat
        echo "<meta name=\"keywords\" content=\"$seoKey\">
    <meta name=\"description\" content=\"$seoDesc\">
    <meta name=\"robots\" content=\"$seoRob\">
    <title>$title</title>
    <!-- FACEBOOK META SETTINGS -->
    <meta property=\"og:url\" content=\"https://salsamojito.hu/\">
    <meta property=\"og:type\" content=\"website\">
    <meta property=\"og:title\" content=\"$title\">
    <meta property=\"og:description\" content=\"$seoDesc\">
    <meta property=\"og:image\" content=\"https://salsamojito.hu/includes/theme/images/salsamojitofb.jpg\">
    <meta property=\"og:image:alt\" content=\"$title\">

";
    }
}
/*** WEBOLDAL CÍME ***/
//A logo alt img tag-je
function logoAlt($catConn){
    $titQ = @mysqli_query($catConn,"SELECT adat FROM ".PREFIX."_settings WHERE (megnevezes='weboldalCim') LIMIT 1");
    $titA = @mysqli_fetch_array($titQ);
    $logA = $titA['adat'];
    if(!$logA){
        $logA = 'Salsa Mojito Tánciskola';
    }
    echo $logA;
}
/*** SITE CONTENT ***/
//Ha az URL-ben nem az index szerepel, akkor megvizsgája, hogy cikk aloldalon vagy szekció aloldalon vagyunk-e. Átadja a SEO-nak a cikk vagy szekció ID-t. és a 404-nek az ismeretlen hivatkozást.
function siteContent($catConn){
    //include_once('elements/sitebody/site-main-sections.php');
    //Megvizsgáljuk az URL-t
    //$getURL = filter_input(INPUT_SERVER,'QUERY_STRING');
    $getURL1 = filter_input(INPUT_SERVER,"PATH_INFO");
    $getURL = ltrim($getURL1, '/');
    //var_dump($getURL);
    //Ha üres a link, akkor megjelenítjük a főoldalt.
    if($getURL == NULL){
        //echo '<pre>'.var_export($_SERVER,true)."</pre>";
        return false;
    } else {
        //Ha van link, akkor lekérdezem az adatbázist, hogy található-e cikk vagy szekció. Ha nem, akkor 404-re küldöm.
        //Először cikkre vizsgálok
        //var_dump($getURL);exit();
        $cikkURL1 = @mysqli_query($catConn,"SELECT * FROM ".PREFIX."_content WHERE (cikkURL='$getURL') LIMIT 1");
        $cikkURL2 = @mysqli_fetch_array($cikkURL1);
        $cikkURL = $cikkURL2['cikkURL'];
        //Ha talál linket, akkor meghívja a site-content.php-t
        if($cikkURL){
            include_once ('site-content.php');
        } else {
            //Ha nem talált, akkor szekcióra vizsgálok
            $secURL1 = @mysqli_query($catConn,"SELECT secURL FROM ".PREFIX."_sections WHERE (secURL='$getURL') LIMIT 1");
            $secURL2 = @mysqli_fetch_array($secURL1);
            $secURL = $secURL2['secURL'];
            //Ha talált linket, akkor meghívom a szekc
            if($secURL){
                include_once ('elements/sitebody/site-section.php');
            } else {
                include_once ('elements/sitebody/404.php');
            }
        }
    }
}
    //Ha van link, akkor lekérdezem az adatbázist, hogy található-e cikk vagy szekció. Ha nem, akkor 404-re küldöm.
    /*if($getURL != NULL){
        //Először cikkre vizsgálok
        $cikkURL1 = @mysqli_query($catConn,"SELECT * FROM ".PREFIX."_content WHERE (cikkURL='$getURL') LIMIT 1");
        $cikkURL2 = @mysqli_fetch_array($cikkURL1);
        $cikkURL = $cikkURL2['cikkURL'];
        //Ha talál linket, akkor meghívja a site-content.php-t
        if($cikkURL){
            include_once ('elements/sitebody/site-content.php');
        } else {
            //Ha nem talált, akkor szekcióra vizsgálok
            $secURL1 = @mysqli_query($catConn,"SELECT secURL FROM ".PREFIX."_sections WHERE (secURL='$getURL') LIMIT 1");
            $secURL2 = @mysqli_fetch_array($secURL1);
            $secURL = $secURL2['secURL'];
            //Ha talált linket, akkor meghívom a szekc
            if($secURL){
                include_once ('elements/sitebody/site-section.php');
            } else {
                include_once ('elements/sitebody/404.php');
            }
        }
    }
};*/
/*** GOOGLE KÖVETŐKÓD ***/
//Ha be van írva a Google követőkód, akkor megjeleníti a body végén.
function followCode($catConn){
    $follCQ = mysqli_query($catConn,"SELECT adat FROM ".PREFIX."_settings WHERE (megnevezes='googleKod') LIMIT 1");
    $follCA = mysqli_fetch_array($follCQ);
    $follC = $follCA['adat'];
    if($follC != NULL){
        echo "<script type=\"text/javascript\">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    
        ga('create', '$follC', 'auto');
        ga('send', 'pageview');
    </script>
";
    }
}

/**
 * @param $text string, a szöveg, aminek hosszát nézzük
 * @param $limit int, amivel beállítottad a megengedett mennyiséget
 * @return string, a lvágott szöveg ...-al a végén.
 */
function limit_words($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]).'...';
    }
    /*if(strlen($text) >= $limit){
        $text = substr($text,0,$limit)."...";
    }*/
    return $text;
}
function limit_text($text, $limit) {
    if(strlen($text) >= $limit){
        $text = substr($text,0,$limit)."...";
    }
    return $text;
}