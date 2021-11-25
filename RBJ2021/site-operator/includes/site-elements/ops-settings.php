<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 04. 13.
 * Time: 18:19
 */
//from feldolgozás
if(filter_input(INPUT_POST, "submit-userpass")){
    //var_dump($_POST);
    $user = trim(filter_input(INPUT_POST, "user", FILTER_SANITIZE_EMAIL));
    //$pass = trim(strip_tags(filter_input(INPUT_POST, "pass")));
    $pass = trim(filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING));
    //a megtisztított értékeket elküldjük a function-nek
    $login = make_login_data($connGWP,$user,$pass);
    $user = $login[0];
    $pass = $login[1];
    $update = date('Y-m-d H:i:s');
    $timeUpdated = date('Y-m-d H:i:s',strtotime('+2 hour',strtotime($update)));
    $sql = "UPDATE ".PREFIX."_ops SET user='$user',pass='$pass',timeUpdated ='$timeUpdated' WHERE ID = 2 LIMIT 1";
    if($query = @mysqli_query($connGWP,$sql)){
        $_SESSION['success'] = "ELmentettük az új belépési adatokat.";
    } else {
        $_SESSION['error'] = "A módosítás nem sikerült. Hibakód: 1206";
    }
}
?>
<form method="post" enctype="multipart/form-data" action="">
    <div class="mdl-grid">
        <div style="width: 100%">
            <h1  class="mdl-typography--title" style="text-align: center;color:#fff">Belépési adatok módosítása</h1>
            <?php messages(); ?>
        </div>
        <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-card mdl-shadow--2dp">
            <div class="mdl-card__supporting-text">
                <div class="mdl-card__title">
                    <h3 class="mdl-card__title"><i class="material-icons" style="font-size:34px">info_outline</i>&nbsp;Fontos tudnivalók</h3>
                </div>
                <p style="color: #000">Az itt megadott adatokat jegyezd meg, mert nem kerül elküldésre az email címedre. Ha mégis elfelejtenéd, akkor keresd fel a fejlesztőt.<br>A piros mezők kitöltése kötelező.<br>
                    Biztonságosabb adatokat adhatsz meg, ha elolvasod a <i class="material-icons">info_outline</i> jel utáni szövegeket.</>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-card mdl-shadow--2dp">
            <!-- USER -->
            <div class="mdl-card__supporting-text">
                <div class="mdl-card__title">
                    <h3 class="mdl-card__title-text">Felhasználónév</h3>
                </div>
                <p><i class="material-icons">info_outline</i> Felhasználónévnek olyan email címet válassz, amit használsz. Ebből adódik, hogy a felhasználónév csak email cím lehet.</p>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input type="email" id="user" class="mdl-textfield__input" name="user" value="" placeholder="Valós email címet kérek!" required/>
                    <label class="mdl-textfield__label" for="user"><i id="form" class="material-icons">mode_edit</i> Felhasználónév</label>
                </div>
            </div>
            <!-- PASS -->
            <div class="mdl-card__supporting-text">
                <div class="mdl-card__title">
                    <h3 class="mdl-card__title-text">Jelszó</h3>
                </div>
                <p><i class="material-icons">info_outline</i> A jelszó minimum 4, maximum 10 karakter lehet, speciális karaktert nem tartalmazhat. A többi rád van bízva.</p>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input type="password" id="pass" class="mdl-textfield__input" name="pass" pattern=".{4,10}" value="" placeholder="Jelszót kérek!" required title="Min 4, max 10 karakter szükséges."/>
                    <label class="mdl-textfield__label" for="pass"><i id="form" class="material-icons">mode_edit</i> Jelszó</label>
                </div>
            </div>
        </div>
    </div>
    <ul class="add-buttons">
        <li>
            <button id="add" type="button" onclick="location.href='index.php'" name="exit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-color--red-500" value="back">
                <i class="material-icons">clear</i>
                <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 160.392px; height: 160.392px; transform: translate(-50%, -50%) translate(26px, 35px);"></span></span>
            </button>
        </li>
        <li>
            <button id="add" type="submit"  name="submit-userpass" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-color--green-500" value="submit-userpass">
                <i class="material-icons">done</i>
                <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 160.392px; height: 160.392px; transform: translate(-50%, -50%) translate(26px, 35px);"></span></span>
            </button>
        </li>
    </ul>
</form>