<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 03. 01.
 * Time: 14:57
 */
//form feldolgozása
if(filter_input(INPUT_POST, 'submit-single') == 'submit-single'){
    //Azért dumump, mert az editorba beszúrt képet szeretném látni.
    //var_dump($_POST); echo '<hr/>'; var_dump($_FILES);exit();
    //cikk címe
    if(!empty(filter_input(INPUT_POST,'cikkcim'))){
        $cikkAz = filter_input(INPUT_GET,'ID');
        $cikkCim = strip_tags(trim(filter_input(INPUT_POST,'cikkcim',FILTER_SANITIZE_STRING)));
        //var_dump($cikkCim);
        //var_dump($cikkAz);
        //előkészítem a címet a friendlyURL-hez, de csak akkor használom, ha nincs kitöltve a keresőbarát input
        $string = $cikkCim;
        //Keresőbarát URL
        if(!empty(filter_input(INPUT_POST,'niceurl'))){
            $keresoNev = strip_tags(trim(filter_input(INPUT_POST,'niceurl',FILTER_SANITIZE_STRING)));
            //var_dump($keresoNev);
        } else {
            $keresoNev = get_friendly_url($string,'');
            //var_dump($keresoNev);
        }
        //Szekcióhoz hozzárendelni
        if(!empty(filter_input(INPUT_POST,'section'))){
            $section = strip_tags(trim((int)filter_input(INPUT_POST,'section',FILTER_SANITIZE_NUMBER_INT)));
            //var_dump($section);
        } else {
            //Ez lesz az alapértelmezett, ha meg lesz a szekció nélküli oldalak bővítés
            /*$section = '0';
            var_dump($section);*/
            //Addig így fog működni:
            $section = '1';
            //var_dump($section);
        }
        //Kiemelt Main Slider
        if(!empty(filter_input(INPUT_POST,'kiemelt'))){
            $kiemelt = strip_tags(trim((int)filter_input(INPUT_POST,'kiemelt',FILTER_SANITIZE_NUMBER_INT)));
            //var_dump($kiemelt);
        } else {
            //Ha nem kerül be az érték, akkor alapértelmzetetten 0, azaz nem fog megjelenni a sliderben.
            $kiemelt = 0;
            //var_dump($kiemelt);
        }
        if(!empty(filter_input(INPUT_POST,'kiemeltcikk'))){
            $kiemeltCikk = strip_tags(trim((int)filter_input(INPUT_POST,'kiemeltcikk',FILTER_SANITIZE_NUMBER_INT)));
            //var_dump($kiemelt);
        } else {
            //Ha nem kerül be az érték, akkor alapértelmzetetten 0, azaz nem fog megjelenni a sliderben.
            $kiemeltCikk = 0;
            //var_dump($kiemelt);
        }
        if(!empty(filter_input(INPUT_POST,'cikktartalom'))) {
            //Tartalom
            $cikkTartalom1 = trim(filter_input(INPUT_POST, 'cikktartalom'));
            $cikkTartalom2 = str_replace("'","\'",$cikkTartalom1);
            $cikkTartalom = preg_replace( "/\r|\n/", "", $cikkTartalom2);
            //var_dump($cikkTartalom);exit();
        } else {
            $cikkTartalom1 = $cikkCim;
            $cikkTartalom2 = str_replace("'","\'",$cikkTartalom1);
            $cikkTartalom = preg_replace( "/\r|\n/", "", $cikkTartalom2);
        }
        //Bevezető szöveg
        if(!empty(filter_input(INPUT_POST,'cikkleiras'))) {
            //$cikkLeiras = trim(filter_input(INPUT_POST, 'cikkleiras'));
            $cikkLeiras1 = trim(filter_input(INPUT_POST, 'cikkleiras'));
            $cikkLeiras2 = str_replace("'","\'",$cikkLeiras1);
            $cikkLeiras = preg_replace( "/\r|\n/", "", $cikkLeiras2);
//            var_export('<pre>'.$cikkLeiras.'</pre>');exit();
        } else {
            //Ha üres, akkor leveszük az első 14 szót a tartatlomból.
            $cikkTart = strip_tags($cikkTartalom);
            $cikkLeiras = limit_text($cikkTart, 14);
            //var_dump($cikkLeiras);
        }
        //SEO
        //kulcsszavak
        if(!empty(filter_input(INPUT_POST,'keywords'))) {
            $keywords = strip_tags(trim(filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_STRING)));
            //var_dump($cikkLeiras);
        } else {
            //Ha üres, akkor leveszük az első 14 szót a tartatlomból.
            $keywords = limit_text($cikkCim, 2);
            //var_dump($keywords);
        }
        //leírás
        if(!empty(filter_input(INPUT_POST,'description'))) {
            $description = strip_tags(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));
            //var_dump($cikkLeiras);
        } else {
            //Ha üres, akkor leveszük az első 14 szót a tartatlomból.
            $description = $cikkLeiras;
            //var_dump(description);
        }
        //robotok
        if(!empty(filter_input(INPUT_POST,'in-f'))) {
            $robots = strip_tags(trim(filter_input(INPUT_POST, 'in-f', FILTER_SANITIZE_STRING)));
            //var_dump($cikkLeiras);
        } else {
            //Ha üres, akkor leveszük az első 14 szót a tartatlomból.
            $robots = 'index, nofollow';
            //var_dump(description);
        }
        //először megvizsgáljuk, hogy változott-e a kép
        //Ha változott, akkor feltöltjük és változóba tesszük a nevet
        /*if ($_FILES["kep"] != '') {//Ha képfeltöltést kezdeményez, és...
            if (is_uploaded_file($_FILES['kep']["tmp_name"])) {//...ha van kép a memóriában, és...
                if ($kepData = getimagesize($_FILES["kep"]["tmp_name"])) {//...ha van a képnek valós adattartalma, és...
                    if ($kepData["mime"] == "image/jpeg") {//...ha a kép jpg, akkor...
                        //$cikkAz = filter_input(INPUT_GET,'ID');
                        $dir = "includes/uploads/site-img/" . $cikkAz;
                        $time = date('Y-m-d-H-i-s');//A névhez hozzáfűzök egy időpontot is.
                        $fileName = $keresoNev.'_'.$time.'.jpg';
                        if(kepfeltoltes($_FILES['kep']["tmp_name"], $dir, $fileName, $section)){
                            //Ha sikeres a feltöltés, akkor átírjuk a DB-ben is a kép nevét.
                                mysqli_query($connGWP, "UPDATE ".PREFIX."_content SET kiemeltKep='slide_$fileName',dobozKep='thumb_$fileName' WHERE ID='$cikkAz' LIMIT 1");
                            if($secID = 3){mysqli_query($connGWP, "UPDATE ".PREFIX."_content SET aboutKep='about_$fileName' WHERE ID='$cikkAz' LIMIT 1");
                            }
                        }
                    } else {
                        $_SESSION['error'] = 'Hiba a mentés során: Nem megfelelő képformátum: '.$kepData["mime"];
                        $url = filter_input(INPUT_GET,'ID');
                        header("location: index.php?editsingle=1&ID=".$url);die();
                    }
                }
            }
        } else {
            //$fileName = $queryA['kiemeltKep'];
            $fileName = $keresoNev . '.jpg';
        }*/
        //$fileName = $keresoNev . '.jpg';
        //var_dump($fileName); exit();
        //ide jön a DB UPDATE
        $update = date('Y-m-d H:i:s');
        $timeUpdated = date('Y-m-d H:i:s',strtotime('+2 hour',strtotime($update)));
        //összekészítjük és futtatjuk az UPDATE-et.
        if(@mysqli_query($connGWP, "UPDATE ".PREFIX."_content SET cikkCim='$cikkCim',cikkLeiras='$cikkLeiras',cikkTartalom='$cikkTartalom',cikkURL='$keresoNev',kiemeltMainSlider='$kiemelt',kiemeltCikk='$kiemeltCikk',timeUpdated='$timeUpdated',sectionID='$section' WHERE ID='$cikkAz' LIMIT 1") or die(mysqli_error($connGWP))){
            /*kiemeltKep='slide_$fileName',dobozKep='thumb_$fileName',*/
            //Sikeres vagy sikertelen mentés után kiírjuk a hibaüzenetet és kiteszünk egy llinket, amin megnézheti a szerkesztett oldalt.
            if(@mysqli_query($connGWP, "UPDATE ".PREFIX."_seo SET keywords='$keywords',description='$description',robots='$robots' WHERE seoID='1' AND oldalID='$cikkAz' LIMIT 1")){
                if ($_FILES["kep"] != '') {//Ha képfeltöltést kezdeményez, és...
                    $path = "includes/uploads/site-img/".$cikkAz;
                    if (is_uploaded_file($_FILES['kep']["tmp_name"])) {//...ha van kép a memóriában, és...
                        $file_ext1 = explode('.',$_FILES['kep']['name']);
                        $file_ext = strtolower(end($file_ext1));
                        $slug = get_friendly_url($cikkCim, '');
                        //$name = "tmp_".$keresoNev.".".$file_ext;
                        $name = "tmp_".$slug.".".$file_ext;
                        $akep = $_FILES['kep']["tmp_name"];
                        $dir = "./includes/uploads/tmp";
                        if(kepfeltoltes_single($akep, $dir, $name)) {
                            //$_SERVER['REQUEST_METHOD'] = null;
                            //var_dump($_SERVER);exit;
                            //require 'ajax/kepkivag.php';
                            //header("location: ?crop=1&cikkID=".$cikkAz."&cikkURL=".$keresoNev."&kepNev=tmp_".$keresoNev.".".$file_ext."&edit=1");
                            header("location: ?crop=1&cikkID=".$cikkAz."&cikkURL=".$slug."&kepNev=tmp_".$slug.".".$file_ext."&edit=1");
                        }
                    }
                } else {
                    //$fileName = $queryA['kiemeltKep'];
                    $fileName = $keresoNev . '.jpg';
                    $_SESSION['success'] = 'Elmentettük a változásokat.';
                }
            } else {
                $_SESSION['error'] = 'Hiba a mentés során. Hibakód: 1204';
            }
            //sikeres mentés esetén kiírjuk az üzenetet
            $_SESSION['success'] = 'Elmentettük a változásokat.';
        } else {
            $_SESSION['error'] = 'Hiba a mentés során. Hibakód: 1203';
        }
    }
}
//cikk azonosítása ID alapján url-ből
$cikkID = filter_input(INPUT_GET,'ID');
//cikk adatok lekérdezése ID alapján
$query = @mysqli_query($connGWP,"SELECT * FROM ".PREFIX."_content WHERE ID='$cikkID'");
$queryA = @mysqli_fetch_array($query);
//cikk adatok
$cikkCim = trim($queryA['cikkCim']);
$cikkURL = $queryA['cikkURL'];
$cikkLeiras = str_replace("\r\n",'<br/>',$queryA['cikkLeiras']);
$cikkTartalom = str_replace("\r\n",'<br/>',$queryA['cikkTartalom']);
//$kiemeltKep = 'http://localhost/salsamojito.hu/includes/elements/uploads/site-img/'.$queryA['kiemeltKep'];
$kiemeltKep = DIR.'/includes/uploads/site-img/'.$cikkID.'/'.$queryA['kiemeltKep'];
$kiemeltKepNev = $queryA['kiemeltKep'];
$dobozKep = $queryA['dobozKep'];

$sectionID = $queryA['sectionID'];
$kiemeltMainSlider = $queryA['kiemeltMainSlider'];
if($kiemeltMainSlider == 1){
    $kiemelt1 = 'checked';
    $kiemelt2 = '';
} else {
    $kiemelt1 = '';
    $kiemelt2 = 'checked';
}
$kiemeltCikk = $queryA['kiemeltCikk'];
if($kiemeltCikk == 1){
    $kiemeltCikk1 = 'checked';
    $kiemeltCikk2 = '';
} else {
    $kiemeltCikk1 = '';
    $kiemeltCikk2 = 'checked';
}
$cikkSorrend = $queryA['cikkSorrend'];
//SEO adatok lekérése cikkID alapján
$seoQuery = mysqli_query($connGWP,"SELECT keywords,description,robots FROM ".PREFIX."_seo WHERE (oldalID='$cikkID' AND seoID='1') LIMIT 1");
$row = mysqli_fetch_array($seoQuery);
$keys = $row['keywords'];
$desc = $row['description'];
$robs = $row['robots'];
if($robs == 'index, nofollow'){
    $robots1 = 'checked';
    $robots2 = '';
    $robots3 = '';
}
if($robs == 'index, follow') {
    $robots1 = '';
    $robots2 = 'checked';
    $robots3 = '';
}
if($robs == 'noindex, nofollow'){
    $robots1 = '';
    $robots2 = '';
    $robots3 = 'checked';
}
//A form
?>
<div style="background-color: rgb(63,81,181)">
<div class="mdl-grid">
    <div style="text-align: center;width: 100%">
        <p class="mdl-textfield">
            <span class="mdl-layout-title" style="color:#fff">Cikk szerkesztése</span>
            <?php messages(); ?>
        </p>
    </div>
</div>
<form method="post" enctype="multipart/form-data" action="">
    <div class="mdl-grid">
        <div style="width: 100%">
            <h3 style="text-align: center;color:#fff"><?php echo $cikkCim ?></h3>
        </div>
        <div class="mdl-cell--10-col mdl-cell--1-offset" style="text-align: center">
            <button type="button" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-color--green-500" onclick="window.open('<?php echo FRONTEND."/pszichologia-blog/index.php/".$cikkURL;?>')">
                <i class="material-icons">play_arrow</i>
                <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 160.392px; height: 160.392px; transform: translate(-50%, -50%) translate(26px, 35px);"></span></span>
            </button>
        </div>
    </div>
    <div class="mdl-grid">
        <!-- CIKK CÍME -->
        <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-card mdl-shadow--2dp">
            <div class="mdl-card__supporting-text">
                <div class="mdl-card__title">
                    <h3 class="mdl-card__title-text">A cikk címe</h3>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <textarea id="cikkcim" class="mdl-textfield__input" name="cikkcim" rows="2"><?php echo $cikkCim ?></textarea>
                    <label class="mdl-textfield__label" for="cikkcim"><i id="form" class="material-icons">mode_edit</i> A cikk címe</label>
                </div>
                <hr/>
                <div class="mdl-card__title">
                    <h3 class="mdl-card__title-text">Keresőbarát URL</h3>
                </div>
                <p><i class="material-icons">info_outline</i> Nem kötelező megadni, mert automatikusan generálódik a cikk címéből. Akkor add meg, ha ettől eltérőt szeretnél. Ezt csak indokolt esetben tedd. Ha mégis megadod, akkor csupa kisbetűvel, ékezet nélkül és kötőjellel elválasztva írd (pl.: keresobarat-nev-megadas).</p>
                <!-- Keresőbarát név -->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input type="text" id="niceurl" class="mdl-textfield__input" name="niceurl" value="<?php echo $cikkURL ?>"/>
                    <label class="mdl-textfield__label" for="niceurl"><i id="form" class="material-icons">mode_edit</i> Keresőbarát URL</label>
                </div>
                <hr/>
                <!-- SZEKCIÓ -->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <div class="mdl-card__title">
                            <h3 class="mdl-card__title-text">Kategória</h3>
                        </div>
                    <ul class="demo-list-item mdl-list cat-list">
                        <?php
                        $secQuery = mysqli_query($connGWP,"SELECT ID,secCim FROM ".PREFIX."_sections LIMIT 10");
                        while($secQueryA = mysqli_fetch_array($secQuery)){
                            $section = $secQueryA['secCim'];
                            $secID = $secQueryA['ID'];//999 a kategória nélküli, ez nincs a kategóriák között
                            $display = '';
                            if($sectionID == $secID){
                                $checked = 'checked';
                            } else {
                                $checked = '';
                            }
                            //A Kapcsolat szekcióhoz nem rendelhető cikk.
                            $kapcs = 6;
                            if ($secID == $kapcs){
                                //$checked = 'disabled';
                                $display = 'style="display:none"';
                            }
                            if($sectionID == 6){
                                $checkedKapcs = 'checked';
                            } else {
                                $checkedKapcs = '';
                            }
                            //Kategória nlkjüli cikk esetén
                            if($sectionID == 999){
                                $nosec = "checked";
                            } else {
                                $nosec = "";
                            }
                            echo '<li '.$display.' class="mdl-list__item"><span class="mdl-list__item-primary-content" style="order:1">'.$section.'</span>
                                <span class="mdl-list__item-secondary-action">
          <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="section'.$secID.'">
            <input type="radio" id="section'.$secID.'" class="mdl-radio__button" name="section" value="'.$secID.'" '.$checked.' '.$checkedKapcs.'/>
          </label>
        </span>'
                                .'</li>';
                        }
                        ?>
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content" style="order:1">Kategória nélküli</span>
                            <span class="mdl-list__item-secondary-action">
                              <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="katnelkul">
                                <input type="radio" id="katnelkul" class="mdl-radio__button" name="section" value="999" <?php echo $nosec; ?>/>
                              </label>
                            </span>
                        </li>
                    </ul>
                </div>
                <hr/>
                <!-- Fő slider cikk -->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <div class="mdl-card__title">
                        <h3 class="mdl-card__title-text">Fő slider cikk</h3>
                    </div>
                    <p><i class="material-icons">info_outline</i> Ezek a cikkek megjelennek a "Fő slider"-ben. Bármelyik kategóriába tartozó cikket meg lehet jeleníteni a "Fő slider"-ben. Nem javasolt a "Kapcsolat" kategóriába tartozó cikket megjeleníteni, mert annak a működése különbözik a többitől.</p>
                    <ul class="demo-list-item mdl-list cat-list">
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-secondary-action" style="order:1">Igen</span>
                            <span class="mdl-list__item-secondary-action">
                                <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="kiemelt1">
                                    <input type="radio" id="kiemelt1" class="mdl-radio__button" name="kiemelt" value="1" <?php echo $kiemelt1; ?>/>
                                </label>
                            </span>
                        </li>
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-secondary-action" style="order:1">Nem</span>
                            <span class="mdl-list__item-secondary-action">
                                <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="kiemelt0">
                                    <input type="radio" id="kiemelt0" class="mdl-radio__button" name="kiemelt" value="0" <?php echo $kiemelt2; ?>/>
                                </label>
                            </span>
                        </li>
                    </ul>
                </div>
                <!-- Kiemelt cikk -->
                <!--Ezt a funkciót kiváltottuk a sortable js-sel.-->
                <!--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <div class="mdl-card__title">
                        <h3 class="mdl-card__title-text">Kiemelt cikk</h3>
                    </div>
                    <p><i class="material-icons">info_outline</i> A "Kiemelt cikk" az adott kategórián belül az első helyre ugrik és addig marad ott, amíg át nem állítod "Nem"-re. Több cikk is lehet kiemelt, ebben az esetben a cikk létrehozásának dátuma szerint fognak rendeződni a többi cikk előtt.</p>
                    <ul class="demo-list-item mdl-list cat-list">
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-secondary-action" style="order:1">Igen</span>
                            <span class="mdl-list__item-secondary-action">
                                <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="kiemeltcikk1">
                                    <input type="radio" id="kiemeltcikk1" class="mdl-radio__button" name="kiemeltcikk" value="1" <?php /*echo $kiemeltCikk1; */?>/>
                                </label>
                            </span>
                        </li>
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-secondary-action" style="order:1">Nem</span>
                            <span class="mdl-list__item-secondary-action">
                                <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="kiemeltcikk0">
                                    <input type="radio" id="kiemeltcikk0" class="mdl-radio__button" name="kiemeltcikk" value="0" <?php /*echo $kiemeltCikk2; */?>/>
                                </label>
                            </span>
                        </li>
                    </ul>
                </div>-->
            </div>
        </div>
        <!-- RÖVID LEÍRÁS -->
        <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-card mdl-shadow--2dp">
            <div class="mdl-card__supporting-text">
                <div class="mdl-card__title">
                    <h3 class="mdl-card__title-text">Bevezető szöveg</h3>
                </div>
                <p><i class="material-icons">info_outline</i> Nem kötelező megadni, mert automatikusan generálódik a cikk tartalmából. A cikk tartalmának első 14 szavát, kb. 100 karakterét másolja be és "..."-ot tesz a végére. Igyekezz maximum 100 karakter hosszúságú bevezetőt írni. Az ennél hosszabb szöveget a megjelenítéskor ugyanígy "..."-al zárjuk.</p>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <textarea id="szerkeszt1" class="mdl-textfield__input" name="cikkleiras" rows="5"><?php echo $cikkLeiras ?></textarea>
                <label class="mdl-textfield__label" for="cikkleiras" style="display: none"><i id="form" class="material-icons">mode_edit</i> Rövid leírás</label>
            </div>
        </div>
        <!-- TARTALOM -->
        <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-card mdl-shadow--2dp">
            <div id="tartalom" >
                <div class="mdl-card__supporting-text">
                    <div class="mdl-card__title">
                        <h3 class="mdl-card__title-text">Tartalom</h3>
                    </div>
                    <p><i class="material-icons">info_outline</i> A speciális karaketerek használata okozhat hibát a rendszerben. Kerüld a szimpla aposztróf használatát.</p>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <textarea id="szerkeszt2" class="mdl-textfield__input" name="cikktartalom" rows="20"><?php echo $cikkTartalom;?></textarea>
                    <input name="image" type="file" id="upload" class="hidden" onchange="">
                    <label class="mdl-textfield__label" for="cikktartalom"></label>
                </div>
            </div>
        </div>
        <!-- KIEMELT KÉP -->
        <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h3 class="mdl-card__title-text">Kiemelt kép</h3>
            </div>
            <div>
                <figure class="mdl-card__media">
                    <img <?php echo "src=\"".$kiemeltKep.'"'; echo "alt=\"$cikkCim\""; ?> style="width: 100%"/>
                </figure>
                <div class="mdl-card__title">
                    <p class="mdl-card__title-text">Kép neve: <?php echo $kiemeltKepNev; ?></p>
                </div>
                <div class="mdl-card__supporting-text">
                    <p><b>Kép mérete:</b>
                        <?php
                        $meret1 = getimagesize($kiemeltKep);
                        echo '<br/>szélesség: '.$meret1[0].'<br/> magasság: '.$meret1[1].'<br/> típus: '.$meret1['mime'];
                        ?>
                    </p>
                </div>
                <hr/>
                <div class="mdl-card__title">
                    <h3 class="mdl-card__title-text">Új kép feltöltése</h3>
                </div>
                <div class="mdl-card__supporting-text">
                    <input type="file" name="kep" id="kep" onchange="readURL(this);" style="display: none"/>
                    <img id="uploadedImage" src="#" alt="uploaded Image" style="margin-bottom:10px;display:none"/>
                    <script>
                            function readURL(input) {
                                var size = input.files[0].size/1024/1024;
                                if(size > 2){
                                    alert("A feltöltött kép mérete maximum 2 MB lehet. Amit most próbálsz feltölteni, az ennél nagyobb.")
                                } else if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#uploadedImage')
                                        .attr('src', e.target.result)
                                        .width(200);
                                    //.height(200);
                                };

                                reader.readAsDataURL(input.files[0]);
                                $('#uploadedImage').css("display","block");
                            }

                        }
                    </script>
                    <div style="clear: both"></div>
                    <label for="kep" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color--red-500">
                        <i class="material-icons">landscape</i>
                        <!--<script>
                        //Ez a kód írja ki a fájl nevét, de ha egyszerre működik a kép megjelenítő scripttel, akkor összeakadnak, ezért van kikommentelve.
                            document.getElementById("kep").onchange = function () {
                                document.getElementById("kepnev").value = this.files[0].name;
                            };
                        </script>-->
                    </label>
                    <input class="mdl-textfield__input" type="text" id="kepnev" name="kepnev" disabled/>
                    <label class="mdl-textfield__label" for="kepnev"></label>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php echo messages(); ?>
                    <p>Az elvárt tulajdonságok: <br/>fájltípus: png, jpg, jpeg, JPG <br/>fájlméret: maximum 2 MB<?php
                        //$meret1 = getimagesize($kiemeltKep);
                        //echo '<br/>szélesség: '.$meret1[0].'<br/> magasság: '.$meret1[1];
                        ?></p>
                </div>
            </div>
        </div>
        <!-- SEO -->
        <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-card mdl-shadow--2dp">
            <div class="mdl-card__supporting-text">
                <div class="mdl-card__title">
                    <h3 class="mdl-card__title-text">SEO adatok</h3>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input type="text" id="keywords" class="mdl-textfield__input" name="keywords" value="<?php echo $keys ?>"/>
                    <label class="mdl-textfield__label" for="keywords"><i id="form" class="material-icons">mode_edit</i> Kulcsszavak</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <textarea id="description" class="mdl-textfield__input" name="description" rows="1"><?php echo $desc ?></textarea>
                    <label class="mdl-textfield__label" for="description"><i id="form" class="material-icons">mode_edit</i> Rövid leírás</label>
                </div>
                <hr/>
                <div class="mdl-card__title">
                    <h3 class="mdl-card__title-text">Robotok</h3>
                </div>
                <p><i class="material-icons">info_outline</i> Azokon az oldalakon érdmes tiltani a keresőrobotokat, ahol nagy méretű fájlok (oldalon belüli videók vannak feltöltve vagy nagy képek vannak megjelenítve).</p>
                <ul class="demo-list-item mdl-list cat-list">
                    <li class="mdl-list__item">
                        <span class="mdl-list__item-secondary-action" style="order:1">index,nofollow</span>
                        <span class="mdl-list__item-secondary-action">
                                <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="in-nof">
                                    <input type="radio" id="in-nof" class="mdl-radio__button" name="in-f" value="index, nofollow" <?php echo $robots1; ?>/>
                                </label>
                            </span>
                    </li>
                    <li class="mdl-list__item">
                        <span class="mdl-list__item-secondary-action" style="order:1">index,follow</span>
                        <span class="mdl-list__item-secondary-action">
                                <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="in-f">
                                    <input type="radio" id="in-f" class="mdl-radio__button" name="in-f" value="index, follow" <?php echo $robots2; ?>/>
                                </label>
                            </span>
                    </li>
                    <li class="mdl-list__item">
                        <span class="mdl-list__item-secondary-action" style="order:1">noindex,nofollow</span>
                        <span class="mdl-list__item-secondary-action">
                                <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="noin-nof">
                                    <input type="radio" id="noin-nof" class="mdl-radio__button" name="in-f" value="noindex, nofollow" <?php echo $robots3; ?>/>
                                </label>
                            </span>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="add-buttons">
            <li>
                <button id="add" type="button" onclick="location.href='index.php?editsection=1&ID=<?php echo $sectionID;?>#<?php echo $cikkID;?>'" name="submit-single" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-color--red-500" value="back">
                    <i class="material-icons">clear</i>
                    <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 160.392px; height: 160.392px; transform: translate(-50%, -50%) translate(26px, 35px);"></span></span>
                </button>
            </li>
            <li>
                <button id="add" type="submit"  name="submit-single" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-color--green-500" value="submit-single">
                    <i class="material-icons">done</i>
                    <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 160.392px; height: 160.392px; transform: translate(-50%, -50%) translate(26px, 35px);"></span></span>
                </button>
            </li>
        </ul>
</form>
</div>


<?php //var_dump($queryA); ?>