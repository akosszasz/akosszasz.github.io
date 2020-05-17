<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 03. 01.
 * Time: 14:57
 */
//form feldolgozása
if(filter_input(INPUT_POST, 'submit-single') == 'submit-single'/*filter_input(INPUT_POST, 'submit-single') == 'submit-single'*/) {
    //Azért dumump, mert az editorba beszúrt képet szeretném látni.
    //var_dump($_POST); echo '<hr/>'; var_dump($_FILES);exit();
    //cikk címe
    if (!empty(filter_input(INPUT_POST, 'cikkcim'))) {
        //exit();
        $cikkCim = strip_tags(trim(filter_input(INPUT_POST, 'cikkcim', FILTER_SANITIZE_STRING)));
        //var_dump($cikkCim);
        //var_dump($cikkAz);
        //előkészítem a címet a friendlyURL-hez, de csak akkor használom, ha nincs kitöltve a keresőbarát input
        $string = $cikkCim;
        //Keresőbarát URL
        if (!empty(filter_input(INPUT_POST, 'niceurl'))) {
            $keresoNev = strip_tags(trim(filter_input(INPUT_POST, 'niceurl', FILTER_SANITIZE_STRING)));
            //var_dump($keresoNev);
        } else {
            $keresoNev = get_friendly_url($string, '');
            //var_dump($keresoNev);
        }
        //Szekcióhoz hozzárendelni
        if (!empty(filter_input(INPUT_POST, 'section'))) {
            $section = strip_tags(trim((int)filter_input(INPUT_POST, 'section', FILTER_SANITIZE_NUMBER_INT)));
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
        if (!empty(filter_input(INPUT_POST, 'kiemelt'))) {
            $kiemelt = strip_tags(trim((int)filter_input(INPUT_POST, 'kiemelt', FILTER_SANITIZE_NUMBER_INT)));
            //var_dump($kiemelt);
        } else {
            //Ha nem kerül be az érték, akkor alapértelmzetetten 0, azaz nem fog megjelenni a sliderben.
            $kiemelt = 0;
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
        if (!empty(filter_input(INPUT_POST, 'cikkleiras'))) {
            //$cikkLeiras = strip_tags(trim(filter_input(INPUT_POST, 'cikkleiras', FILTER_SANITIZE_STRING)));
            $cikkLeiras1 = trim(filter_input(INPUT_POST, 'cikkleiras'));
            $cikkLeiras2 = str_replace("'","\'",$cikkLeiras1);
            $cikkLeiras = preg_replace( "/\r|\n/", "", $cikkLeiras2);
            //var_dump($cikkLeiras);
        } else {
            //Ha üres, akkor leveszük az első 14 szót a tartatlomból.
            $cikkTart = strip_tags($cikkTartalom);
            $cikkLeiras = limit_text($cikkTart, 14);
            //var_dump($cikkLeiras);
        }
        //SEO
        //kulcsszavak
        if (!empty(filter_input(INPUT_POST, 'keywords'))) {
            $keywords = strip_tags(trim(filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_STRING)));
            //var_dump($cikkLeiras);
        } else {
            //Ha üres, akkor leveszük az első 14 szót a tartatlomból.
            $keywords = limit_text($cikkCim, 2);
            //var_dump($keywords);
        }
        //leírás
        if (!empty(filter_input(INPUT_POST, 'description'))) {
            $description = strip_tags(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));
            //var_dump($cikkLeiras);
        } else {
            //Ha üres, akkor leveszük az első 14 szót a tartatlomból.
            $description = $cikkLeiras;
            //var_dump(description);
        }
        //robotok
        if (!empty(filter_input(INPUT_POST, 'in-f'))) {
            $robots = strip_tags(trim(filter_input(INPUT_POST, 'in-f', FILTER_SANITIZE_STRING)));
            //var_dump($cikkLeiras);
        } else {
            //Ha üres, akkor leveszük az első 14 szót a tartatlomból.
            $robots = 'index, nofollow';
            //var_dump(description);
        }
        //$fileName = $keresoNev . '.jpg';
        //var_dump($fileName); exit();
        //ide jön a DB UPDATE
        $timeCreated = date('Y-m-d H:i:s');
        $timeUpdated = $timeCreated;
        $kiemeltCikk = 0;
        $secID = 1; 
        /*//Adni kell alapértelmezett nevet a kiemelt képnek és a doboz képnek
        $kiemeltKep = "slide_$keresoNev.jpg";
        $dobozKep = "thumb_$keresoNev.jpg";*/
        //alapértelmezett cikkSorrend:
        $cikkSorrend = 0;
        //összekészítjük és futtatjuk az INSERT-et.
        $result = mysqli_query($connGWP, "INSERT INTO ".PREFIX."_content(cikkCim, cikkLeiras, cikkTartalom, cikkURL, sectionID, kiemeltMainSlider, kiemeltCikk, cikkSorrend, timeCreated, timeUpdated) VALUES ('$cikkCim','$cikkLeiras','$cikkTartalom','$keresoNev','$section','$kiemelt','$kiemeltCikk','$cikkSorrend','$timeCreated','$timeUpdated')") or die(mysqli_error($connGWP));
        if ($result) {
            /*kiemeltKep='slide_$fileName',dobozKep='thumb_$fileName',*/
            //Sikeres vagy sikertelen mentés után kiírjuk a hibaüzenetet és kiteszünk egy llinket, amin megnézheti a szerkesztett oldalt.
            //Le kell kérni a cikkID-t.
            sleep(1);
            $cikkAzQ = mysqli_query($connGWP, "SELECT ID FROM ".PREFIX."_content WHERE timeCreated='$timeCreated'");
            $cikkAzR = mysqli_fetch_array($cikkAzQ);
            $cikkAz = $cikkAzR['ID'];
            if ($cikkAz != NULL) {
                //Ha megvan az ID, akkor feltöltöm a SEO táblát és a képet is
                if (mysqli_query($connGWP, "INSERT INTO ".PREFIX."_seo (keywords,description,robots,seoID,oldalID) VALUES ('$keywords','$description','$robots','$secID','$cikkAz')")) {
                    $_SESSION['success'] = 'Elmentettük az új cikket.';
                } else {
                    $_SESSION['error'] = 'Hiba a mentés során. Hibakód: 1103';
                }
                //kép
                /*if ($_FILES["kep"] != '') {//Ha képfeltöltést kezdeményez, és...
                    if (is_uploaded_file($_FILES['kep']["tmp_name"])) {//...ha van kép a memóriában, és...
                        if ($kepData = getimagesize($_FILES["kep"]["tmp_name"])) {//...ha van a képnek valós adattartalma, és...
                            if ($kepData["mime"] == "image/jpeg") {//...ha a kép jpg, akkor...
                                //$cikkAz = filter_input(INPUT_GET,'ID');
                                $dir = "includes/uploads/site-img/" . $cikkAz;
                                $time = date('Y-m-d-H-i-s');//A névhez hozzáfűzök egy időpontot is.
                                $fileName = $keresoNev . '_' . $time . '.jpg';
                                if (kepfeltoltes($_FILES['kep']["tmp_name"], $dir, $fileName, $secID)) {
                                    //Ha sikeres a feltöltés, akkor átírjuk a DB-ben is a kép nevét.
                                    mysqli_query($connGWP, "UPDATE gw_sal_content SET kiemeltKep='slide_$fileName',dobozKep='thumb_$fileName',cikkSorrend='$cikkAz' WHERE ID='$cikkAz' LIMIT 1");
                                    if($secID = 3){mysqli_query($connGWP, "UPDATE gw_sal_content SET aboutKep='about_$fileName' WHERE ID='$cikkAz' LIMIT 1");
                                    }
                                }
                            } else {
                                $_SESSION['error'] = 'Hiba a mentés során: Nem megfelelő képformátum: ' . $kepData["mime"];
                                $url = $cikkAz;
                                header("location: index.php?editsingle=1&ID=" . $url);
                                die();
                            }
                        }
                    }*/
                if ($_FILES["kep"] != '') {//Ha képfeltöltést kezdeményez, és...
                    $path = "includes/uploads/site-img/".$cikkAz;
                    mkdir($path, 0755, false);
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
                            //header("location: ?crop=1&cikkID=".$cikkAz."&cikkURL=".$keresoNev."&kepNev=tmp_".$keresoNev.".".$file_ext);
                            header("location: ?crop=1&cikkID=".$cikkAz."&cikkURL=".$slug."&kepNev=tmp_".$keresoNev.".".$file_ext);
                        }
                    }
                }/* else {
                    //$fileName = $queryA['kiemeltKep'];
                    $fileName = $keresoNev . '.jpg';
                }*/
            } else {
                $_SESSION['error'] = 'Hiba a mentés során. Hibakód: 1102';
            }
            //header("location: ".EDITSINGLE."&ID=".$cikkAz);
        } else {
            $_SESSION['error'] = 'Hiba a mentés során. Hibakód: 1101';
        }
    }
}
//A form
?>
    <div style="background-color: rgb(63,81,181)">
        <div class="mdl-grid">
            <div style="text-align: center;width: 100%">
                <p class="mdl-textfield">
                    <?php messages(); ?>
                </p>
            </div>
        </div>
        <form method="post" enctype="multipart/form-data" action="">
            <div class="mdl-grid">
                <div style="width: 100%">
                    <h3 style="text-align: center;color:#fff">Új cikk hozzáadása</h3>
                </div>
            </div>
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__supporting-text">
                        <h3 class="mdl-card__title"><i class="material-icons" style="font-size:34px">info_outline</i>&nbsp;Fontos tudnivalók</h3>
                        <p style="color: #000">
                            A piros mezők kitöltése és a kiemelt kép feltöltése kötelező.
                            <br/>
                            Általában minden mezőt ki kell tölteni annak érdekében, hogy megfelelően jelenjen meg a cikk a látogató, az opertátor és a keresőmotorok számára.
                            <br>
                            Gyorsabban tudsz haladni, ha ekokvasod a <i class="material-icons">info_outline</i> jel utáni szövegeket.
                        </p>
                    </div>
                </div>
                <!-- CIKK CÍME -->
                <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-card__title">
                            <h3 class="mdl-card__title-text">A cikk címe</h3>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <textarea id="cikkcim" class="mdl-textfield__input" name="cikkcim" rows="2" required></textarea>
                            <label class="mdl-textfield__label" for="cikkcim"><i id="form" class="material-icons">mode_edit</i> A cikk címe</label>
                        </div>
                        <hr/>
                        <div class="mdl-card__title">
                            <h3 class="mdl-card__title-text">Keresőbarát URL</h3>
                        </div>
                        <p><i class="material-icons">info_outline</i> Nem kötelező megadni, mert automatikusan generálódik a cikk címéből. Akkor add meg, ha ettől eltérőt szeretnél. Ezt csak indokolt esetben tedd. Ha mégis megadod, akkor csupa kisbetűvel, ékezet nélkül és kötőjellel elválasztva írd (pl.: keresobarat-nev-megadas).<br>"Galéria" esetében itt add meg a facebook galéria linkjét.</p>
                        <!-- Keresőbarát név -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input type="text" id="niceurl" class="mdl-textfield__input" name="niceurl"/>
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
                                    $secID = $secQueryA['ID'];
                                    //A Kapcsolat szekcióhoz nem rendelhető cikk.
                                    $kapcs = 6;
                                    //A kapcsolat kategóriát nem mutatjuk.
                                    if ($secID == $kapcs){
                                        $display = 'none';
                                    } else {
                                        $display = 'block';
                                    }
                                    //Alapértelmezett az Aktuális kategória
                                    $akt = 1;
                                    if ($secID == $akt){
                                        $checked = 'checked';
                                    } else {
                                        $checked = '';
                                    }
                                    echo '<li class="mdl-list__item"><span class="mdl-list__item-primary-content" style="order:1;display:'.$display.'">'.$section.'</span>
                                <span style="display:'.$display.'" class="mdl-list__item-secondary-action">
          <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="section'.$secID.'">
            <input type="radio" id="section'.$secID.'" class="mdl-radio__button" name="section" value="'.$secID.'" '.$checked.'/>
          </label>
        </span>'
                                        .'</li>';
                                }
                                ?>
                            </ul>
                        </div>
                        <hr/>
                        <!-- KIEMELT -->
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
                                    <input type="radio" id="kiemelt1" class="mdl-radio__button" name="kiemelt" value="1"/>
                                </label>
                            </span>
                                </li>
                                <li class="mdl-list__item">
                                    <span class="mdl-list__item-secondary-action" style="order:1">Nem</span>
                                    <span class="mdl-list__item-secondary-action">
                                <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="kiemelt0">
                                    <input type="radio" id="kiemelt0" class="mdl-radio__button" name="kiemelt" value="0" checked/>
                                </label>
                            </span>
                                </li>
                            </ul>
                        </div>
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
                        <textarea id="szerkeszt1" class="mdl-textfield__input" name="cikkleiras" rows="5"></textarea>
                        <label class="mdl-textfield__label" for="cikkleiras" style="display: none"><i id="form" class="material-icons">mode_edit</i> Rövid leírás</label>
                    </div>
                </div>
                <!-- TARTALOM -->
                <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h3 class="mdl-card__title-text">Tartalom</h3>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <textarea id="szerkeszt2" class="mdl-textfield__input" name="cikktartalom" rows="20"></textarea>
                        <label class="mdl-textfield__label" for="cikktartalom"></label>
                    </div>
                </div>
                <!-- KIEMELT KÉP -->
                <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h3 class="mdl-card__title-text">Kiemelt kép feltöltése - kötelező</h3>
                    </div>
                    <div>
                        <div class="mdl-card__supporting-text">
                            <input type="file" name="kep" id="kep" style="display: none" onchange="readURL(this);" required/>
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
                            </label>
                            <input class="mdl-textfield__input" type="text" id="kepnev" name="kepnev"  disabled/>
                            <label class="mdl-textfield__label" for="kepnev"></label>

                        </div>
                        <div class="mdl-card__supporting-text">
                            <?php echo messages(); ?>
                            <p>Az elvárt tulajdonságok:<br/> fájltípus: png, jpg, jpeg, JPG <br/>fájlméret: maximum 2 MB<?php
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
                            <input type="text" id="keywords" class="mdl-textfield__input" name="keywords" required/>
                            <label class="mdl-textfield__label" for="keywords"><i id="form" class="material-icons">mode_edit</i> Kulcsszavak</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <textarea id="description" class="mdl-textfield__input" name="description" rows="1" required></textarea>
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
                                    <input type="radio" id="in-nof" class="mdl-radio__button" name="in-f" value="index, nofollow" checked/>
                                </label>
                            </span>
                            </li>
                            <li class="mdl-list__item">
                                <span class="mdl-list__item-secondary-action" style="order:1">index,follow</span>
                                <span class="mdl-list__item-secondary-action">
                                <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="in-f">
                                    <input type="radio" id="in-f" class="mdl-radio__button" name="in-f" value="index, follow"/>
                                </label>
                            </span>
                            </li>
                            <li class="mdl-list__item">
                                <span class="mdl-list__item-secondary-action" style="order:1">noindex,nofollow</span>
                                <span class="mdl-list__item-secondary-action">
                                <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="noin-nof">
                                    <input type="radio" id="noin-nof" class="mdl-radio__button" name="in-f" value="noindex, nofollow"/>
                                </label>
                            </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="add-buttons">
                    <li>
                        <button id="" type="button" onclick="location.href='index.php'" name="submit-single" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-color--red-500" value="back">
                            <i class="material-icons">clear</i>
                            <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 160.392px; height: 160.392px; transform: translate(-50%, -50%) translate(26px, 35px);"></span></span>
                        </button>
                            </li>
                            <li>
                        <button id="" type="submit"  name="submit-single" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-color--green-500" value="submit-single">
                            <i class="material-icons">done</i>
                            <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 160.392px; height: 160.392px; transform: translate(-50%, -50%) translate(26px, 35px);"></span></span>
                        </button>
                    </li>
                </ul>
        </form>
    </div>