<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 02. 27.
 * Time: 9:58
 */
/**
 * Szekcio seo
 * form feldolgozás
 */
if(filter_input(INPUT_POST,'section')){
    $mysqli = $connGWP;
    $sectionID = mysqli_real_escape_string($mysqli,trim(filter_input(INPUT_POST,'secID')));
    $secID = $sectionID;
    //$keywords = mysqli_real_escape_string($mysqli,strip_tags(trim(filter_input(INPUT_POST,'seckeys'))));
    $keywords = strip_tags(trim(filter_input(INPUT_POST,'seckeys', FILTER_SANITIZE_STRING)));
    $description = strip_tags(trim(filter_input(INPUT_POST,'secdesc',FILTER_SANITIZE_STRING)));
    $seo = [$sectionID,$keywords,$description];
    //var_dump($seo);
    $queryKeys = "UPDATE ".PREFIX."_seo SET keywords='$keywords' WHERE seoID='2' AND oldalID='$sectionID'";
    $queryDesc = "UPDATE ".PREFIX."_seo SET description='$description' WHERE seoID='2' AND oldalID='$sectionID'";
    if($mysqli->query($queryKeys) && $mysqli->query($queryDesc)){
        $_SESSION['success'] = 'Elmentettük a változásokat.';
        //var_dump($_POST);
    } else {
        $_SESSION['error'] = 'Hiba a mentés során. Hibakód: 1207';
    }

}
/**
 * Általános beállítások
 * weboldalCim, footerJobb;404!,googleKod
 * form feldolgozás
 */
if(filter_input(INPUT_POST,'submit')){
    $post = filter_input(INPUT_POST,'subselect');
} else {
    $post = '';
}
$error1 = '';
$error2 = '';
$error3 = '';
$error4 = '';

//Weboldal címe:
$webCq = mysqli_query($connGWP,"SELECT * FROM ".PREFIX."_settings WHERE megnevezes='weboldalCim' LIMIT 1");
$webCa = mysqli_fetch_array($webCq);
$webC = $webCa['adat'];
if($post == 'cim-submit'){
    $filCim = filter_input(INPUT_POST,'webcim',FILTER_SANITIZE_STRING);
    $cim = strip_tags(trim(($filCim)));
    $cimUpdate = mysqli_query($connGWP,"UPDATE ".PREFIX."_settings SET adat='$cim' WHERE megnevezes='weboldalCim'");
    if (!$cimUpdate){
        $error1 = '<span class="mdl-chip mdl-chip--contact" style="position: absolute;right:5px">
                            <span class="mdl-chip__contact mdl-color--red-500 mdl-color-text--white" style="line-height: 44px">
                                <i class="material-icons">priority_high</i></span>
                            <span class="mdl-chip__text">Sikertelen mentés. Hibakód: 1208</span>
                        </span>';
        //return $error;
    } else {
        $error1 = '<span class="mdl-chip mdl-chip--contact" style="position: absolute;right:5px">
                            <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white" style="line-height: 44px">
                                <i class="material-icons">done</i></span>
                            <span class="mdl-chip__text">Sikeres mentés</span>
                        </span>';
        //return $error;
        //header('location: #form');
    }
}
//Footer szöveg:
$fooCq = mysqli_query($connGWP,"SELECT * FROM ".PREFIX."_settings WHERE megnevezes='footerJobb' LIMIT 1");
$fooCa = mysqli_fetch_array($fooCq);
$fooC = $fooCa['adat'];
if($post == 'lablec-submit'){
    $filLab = filter_input(INPUT_POST,'lablec', FILTER_SANITIZE_STRING);
    $lab = strip_tags(trim($filLab));
    $labUpdate = mysqli_query($connGWP,"UPDATE ".PREFIX."_settings SET adat='$lab' WHERE megnevezes='footerJobb'");
    if (!$labUpdate){
        $error2 = '<span class="mdl-chip mdl-chip--contact" style="position: absolute;right:5px">
                            <span class="mdl-chip__contact mdl-color--red-500 mdl-color-text--white" style="line-height: 44px">
                                <i class="material-icons">priority_high</i></span>
                            <span class="mdl-chip__text">Sikertelen mentés. Hibakód: 1209</span>
                        </span>';
        //return $error;
    } else {
        $error2 = '<span class="mdl-chip mdl-chip--contact" style="position: absolute;right:5px">
                            <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white" style="line-height: 44px">
                                <i class="material-icons">done</i></span>
                            <span class="mdl-chip__text">Sikeres mentés</span>
                        </span>';
        //return $error;
    }
}
//Google követőkód:
$gooCq = mysqli_query($connGWP,"SELECT * FROM ".PREFIX."_settings WHERE megnevezes='googleKod' LIMIT 1");
$gooCa = mysqli_fetch_array($gooCq);
$gooC = $gooCa['adat'];
if($post == 'kod-submit'){
    $kodCim = filter_input(INPUT_POST,'ujhiba',FILTER_SANITIZE_STRING);
    $kod = strip_tags(trim($kodCim));
    $kodUpdate = mysqli_query($connGWP,"UPDATE ".PREFIX."_settings SET adat='$kod' WHERE megnevezes='googleKod'");
    if (!$kodUpdate){
        $error3 = '<span class="mdl-chip mdl-chip--contact" style="position: absolute;right:5px">
                            <span class="mdl-chip__contact mdl-color--red-500 mdl-color-text--white" style="line-height: 44px">
                                <i class="material-icons">priority_high</i></span>
                            <span class="mdl-chip__text">Sikertelen mentés. Hibakód: 1210</span>
                        </span>';
        //return $error;
    } else {
        $error3 = '<span class="mdl-chip mdl-chip--contact" style="position: absolute;right:5px">
                            <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white" style="line-height: 44px">
                                <i class="material-icons">done</i></span>
                            <span class="mdl-chip__text">Sikeres mentés</span>
                        </span>';
        //return $error;
    }
}
//404! oldal szövege:
/**
 * FONTOS: a frontend <p> tagbe töti a szöveget, nincs szükség rá, mert az editor <p> -vel menti el.
 */
$hibaq = mysqli_query($connGWP,"SELECT * FROM ".PREFIX."_settings WHERE megnevezes='404!' LIMIT 1");
$hibaa = mysqli_fetch_array($hibaq);
$hiba = str_replace("\r\n","<br/>",$hibaa['adat']);
if($post == '404-submit'){
    $ujHibaCim = filter_input(INPUT_POST,'ujhiba');
    $ujHiba = mysqli_real_escape_string($connGWP,$ujHibaCim);
    $ujHibaUpdate = mysqli_query($connGWP,"UPDATE ".PREFIX."_settings SET adat='$ujHiba' WHERE megnevezes='404!'");
    if (!$ujHibaUpdate){
        $error4 = '<span class="mdl-chip mdl-chip--contact" style="position: absolute;right:5px">
                            <span class="mdl-chip__contact mdl-color--red-500 mdl-color-text--white" style="line-height: 44px">
                                <i class="material-icons">priority_high</i></span>
                            <span class="mdl-chip__text">Sikertelen mentés. Hibakód: 1211</span>
                        </span>';
        //return $error;
    } else {
        $error4 = '<span class="mdl-chip mdl-chip--contact" style="position: absolute;right:5px">
                            <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white" style="line-height: 44px">
                                <i class="material-icons">done</i></span>
                            <span class="mdl-chip__text">Sikeres mentés</span>
                        </span>';
        //return $error;
    }
}
?>
<!-- SZEKCIÓ SEO -->
<div class="mdl-grid" style="background-color: rgb(63,81,181)">
    <div class="mdl-textfield" style="text-align: center">
        <h1 class="mdl-typography--title" style="color:#fff">Kategóriák SEO beállításai</h1>
        <?php messages(); ?>
    </div>
</div>
<div class="mdl-grid" style="background-color: rgb(63,81,181)">
<?php
//wile ciklussal készítem el a formokat az egyes szekciókhoz.
$sec = @mysqli_query($connGWP,"SELECT * FROM ".PREFIX."_sections LIMIT 10");
if(!$sec){
    $_SESSION['error'] = 'Hiba lekérdezéskor. Hibakód: 1301';
}
while ($row = @mysqli_fetch_array($sec)){
    $secID = (int)$row['ID'];
    $secCim = $row['secCim'];
    $seo = @mysqli_query($connGWP,"SELECT * FROM ".PREFIX."_seo WHERE seoID=2 AND oldalID='$secID' LIMIT 1");
    $seoR = @mysqli_fetch_array($seo);
    $keywords = $seoR['keywords'];
    //$keywords = str_replace('"','\"',$seoR['keywords']);
    $description = $seoR['description'];
    //echo $seoR['oldalID'].' '.$row['secCim'].'<br/>';
    echo "<div class=\"mdl-cell mdl-cell--6-col mdl-card mdl-shadow--2dp settings\">        
        <form method=\"post\" id=\"form\">
            <div class=\"mdl-card__supporting-text\">
                <div class=\"mdl-card__title\">
                    <h3>$secCim kategória</h3>
                </div>
                <!-- kulcsszavak -->
                <input type='number' style='display: none' id='secID' name='secID' value='$secID' />
                <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
                    <input class=\"mdl-textfield__input form\" type=\"text\" name=\"seckeys\" id=\"seckeys\" value=\"$keywords\" />
                    <label class=\"mdl-textfield__label\" for=\"seckeys\"><i id=\"form\" class=\"material-icons\">mode_edit</i> Kulcsszavak</label>
                </div>
                <div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label\">
                <!-- rövid leírás -->                    
                    <input class=\"mdl-textfield__input form\" type=\"text\" name=\"secdesc\" id=\"secdesc\" value=\"$description\" />
                    <label class=\"mdl-textfield__label\" for=\"secdesc\"><i id=\"form\" class=\"material-icons\">mode_edit</i> Rövid leírás</label>
                </div>            
                <div class=\"mdl-textfield mdl-js-textfield\">
                    <input type=\"submit\" name=\"section\" value=\"Mentés\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-color--green-500\"/>
                </div>
            </div>
        </form>
    </div>";
}
?>
</div>
<!-- WEBOLDAL BEÁLLÍTÁSOK -->
<div class="mdl-grid" style="background-color: rgb(63,81,181)">
    <div class="mdl-textfield" style="text-align: center">
        <h1 class="mdl-typography--title" style="color: #fff">Weboldal beállításai</h1>

    </div>
</div>
<div class="mdl-grid" style="background-color: rgb(63,81,181)">
    <!-- WEBOLDAL CÍME -->
    <div class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--2dp settings">
        <?php echo $error1 ?>
        <form method="post" id="form">
            <div class="mdl-textfield mdl-js-textfield">
              <h3>A weboldal címe</h3>
                <input class="mdl-textfield__input form" type="text" name="webcim" id="sample1" value="<?php echo $webC?>" />
                <input type="text" name="subselect" value="cim-submit" style="display: none">
                <label class="mdl-textfield__label" for="sample1">A weboldal címe</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <input type="submit" name="submit" value="Mentés" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-color--green-500"/>
            </div>
        </form>
    </div>
    <!-- LÁBLÉC SZÖVEG -->
    <div class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--2dp settings">
        <?php echo $error2 ?>
        <form method="post">
            <div class="mdl-textfield mdl-js-textfield">
                <h3>Lábléc szöveg</h3>
                <input class="mdl-textfield__input form" type="text" name="lablec" id="sample2" value="<?php echo $fooC?>" />
                <input type="text" name="subselect" value="lablec-submit" style="display: none">
                <label class="mdl-textfield__label" for="sample2">Lábléc szöveg</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <input type="submit" value="Mentés" name="submit" id="lablec-submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-color--green-500"/>
            </div>
        </form>
    </div>
    <!-- GOOGLE KÖVETŐKÓD -->
    <div class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--2dp settings">
        <?php echo $error3 ?>
        <form method="post">
            <div class="mdl-textfield mdl-js-textfield">
                <h3>Google követőkód</h3>
                <input class="mdl-textfield__input form" type="text" name="kod" id="sample3" value="<?php echo $gooC?>" disabled/>
                <input type="text" name="subselect" value="kod-submit" style="display: none" disabled>
                <label class="mdl-textfield__label" for="sample3">Google követőkód</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <input type="submit" value="Mentés" name="submit" id="google-submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-color--green-500" disabled/>
            </div>
        </form>
    </div>
    <!-- 404! OLDAL SZÖVEGE -->
    <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp settings">
        <?php echo $error4 ?>
        <form method="post">
            <div class="mdl-textfield mdl-js-textfield">
                <h3>404! oldal szövege</h3>
                <textarea class="mdl-textfield__input form" name="ujhiba" rows="5" type="text" id="szerkeszt2"><?php echo $hiba;?></textarea>
                <input type="text" name="subselect" value="404-submit" style="display: none">
                <label class="mdl-textfield__label" for="sample4">404! oldal szövege</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <input type="submit" value="Mentés" name="submit" id="404-submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-color--green-500"/>
            </div>
        </form>
    </div>
</div>