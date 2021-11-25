<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 02. 22.
 * Time: 11:14
 */
if(!defined('VALIDCODE')){
    header('location: https://www.google.hu/search?espv=2&q=php+school&oq=php+scoo&gs_l=serp.3.0.0i10i19k1j0i22i10i30i19k1j0i22i30i19k1l2j0i22i10i30i19k1j0i22i30i19k1.63443.67877.0.69209.10.9.1.0.0.0.137.764.7j2.9.0....0...1c.1.64.serp..0.10.764...0j0i131k1j0i67k1j0i10k1j0i13k1j0i13i30k1j0i22i30k1.IF8wfyFtogc');
    exit;
}

//felhasználó beléptetése
function login($conn, $user, $pass)
{
    //a változókat megtisztítjuk az sql számára és kiszedjük a php és a html tageket és utasításokat, ha vannak.
    $user = strip_tags(mysqli_real_escape_string($conn, $user));
    $pass = strip_tags(mysqli_real_escape_string($conn, $pass));
    //$secret_key = '999';
    //$pass = md5($pass.$secret_key);

    //felhasználó jelszó és ID keresése az adatbázisban. Fiontos a zárójelezés, mert anélkül könnyű feltörni az adatbázist.
    $sql = "SELECT * FROM ".PREFIX."_ops WHERE (user='$user' AND pass='$pass') LIMIT 1";
    $result = @mysqli_query($conn, $sql);

    //Megszámoljuk a lekérdezésünket
    if(mysqli_num_rows($result) == 1){
        //megtaláltuk a usert
        //mostmár a session beállítható
        $_SESSION['authorised'] = TRUE;

        //irányítsuk át az adminra
        header("Location: ".DIRADMIN);
        exit();
    } else {
        //Hibaüzenet
        $_SESSION['error'] = "Sajnálom, rossz felhasználónév vagy jelszó.";
    }
}

//Két lépcsős validáció
function logged_in(){
    if(isset($_SESSION['authorised']) == TRUE){
        return TRUE;
    } else {
        return FALSE;
    }
}

function login_szukseges(){
    if(logged_in()){
        return TRUE;
    } else {
        //header("Location: ".DIRADMIN."/operator.php");
        header("Location: ".FRONTEND);
    }
}

//Kijelentkezés
function logout(){
    unset($_SESSION['authorised']);
    header("Location: ".DIRADMIN."/operator.php");
    exit();
}

//Az oldalon megjelenő üzenetek összekészítése
function messages($print = "print"){
    $message = '';
    if(isset($_SESSION['success']) && (!empty($_SESSION['success']))){
        $message = "<div class='mdl-color--green-500' style='padding:5px;text-align: center;color:#fff;'><p><i class=\"material-icons\" style='color:#fff;'>done</i><br/>{$_SESSION['success']}</p></div>";//a {} közé írt php egy konmkatenálási forma. Olyan, mintha konkateálnám: '.php.' de konstansnál nem jó.
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['error']) && (!empty($_SESSION['error']))){
        $message = "<div class='mdl-color--orange-600' style='padding:5px;text-align: center;'><p><i class=\"material-icons\">error_outline</i><br/>{$_SESSION['error']}</p></div>";//a {} közé írt php egy konmkatenálási forma. Olyan, mintha konkateálnám: '.php.'
        unset($_SESSION['error']);
    }
    if($print != "print"){
        return $message;
    } else {
        echo $message;
    }
}

//Ha csak hiba van, akkor arra is egy eljárás
function errors($error){
    $showError = '';
    if(!epmty($error)){
        $i = 0;
        while($i < count($error)) {
            $showError .= "<div class='alert alert-danger'>{$error[$i]}</div>";
            $i++;
        }
        echo $showError;
    }
}

//Fájlkiterjesztés kinyerése eljárás
function get_file_kiterjesztes($file){
    if(!empty($file)){
        $ext = end(explode('.', $file));
        return $ext;
    } else {
        return FALSE;
    }
}

//Szép url
//$string: a szöveg vagy bármi, amit át szeretnék alakítani
//$extension: a kiterjesztés, amit hozzá szeretnék fűzni. pl.: html vagy php
function get_friendly_url($string, $extension){
    $url_old = array("(í|Í)", "(ö|Ö)", "(ü|Ü)", "(ó|Ó)", "(ő|Ő)", "(ú|Ú)", "(é|É)", "(á|Á)", "(ű|Ű)");
    $url_new = array("i", "o", "u", "o", "o", "u", "e", "a", "u");
    $url_regex = "([^a-zA-Z0-9]+)";
    $string = preg_quote($string);//ezzel megtisztítjuk a szöveget a speciális karakterektől. Előkészítettük a reguláris kifejezések hibamentes használatához
    //1. A stringet megvizsgáljuk, hogy van-e benne ékezetes karakter és kicseréljük az új karakterre.
    $string = preg_replace($url_old, $url_new, $string);
    //2. A space-ek kicserélése - jelre és kisbetűsítés
    $string = strtolower(preg_replace($url_regex,'-',$string));
    //3. ha két kötőjel lenne a szövegben, akkor töröljük
    $string = preg_replace('/^[\-]+/',"",$string);
    $string = preg_replace('/[\-]+$/',"",$string);
    //Fűzzük hozzá a kiterjesztést (ha van)
    if(!empty($extension)){
        $string .= '.'.$extension;
    }
    return $string.$extension;
}

//képkészítés //útvonal, fájl, stb
function kepkeszitesSlide( $uploaded,$path,$filename, $width, $height, $crop = false)
{
    //shortif-et teszünk a változóba
    $elotag = $width <= 100 ? "thumb_" : "slide_";
    list($widthOriginal, $heightOriginal) = getimagesize($uploaded);
    $newRatio = $width / $height;
    //Álló kép
    $ratio = $widthOriginal / $heightOriginal;
    //Ha a kép arányai és méretei megegyeznek, akkor csak simán feltöltjük.
    if ($newRatio == $ratio) {//még kell a méret!!!
        $kep = imagecreatefromjpeg($uploaded);
        imagejpeg($kep, $path."/".$elotag.$filename, 100);
    } else {
        if ($ratio < 1) {
            $newWidth = $width;
            $newHeight = round($width / $ratio);
            $yoffset = ($height - $newHeight) / 2;
            $xoffset = 0;
        } else {//fekvő kép esetén
            /*$newHeight=$height;
            $newWidth=round($height*$ratio);
            $yoffset=0;
            $xoffset=($width-$newWidth)/2;*/

            $newHeight = round($height * $ratio);
            $newWidth = $width;
            $yoffset = 0;
            $xoffset = 0;
        }
        //A kép feleöltése a memóriába
        $kep = imagecreatefromjpeg($uploaded);
        //Üres "vászon" létrehozása
        $output = imagecreatetruecolor($width, $height);
        //A képet átméretezve másoljuk át
        imagecopyresized($output, $kep, $xoffset, $yoffset, 0, 0, $newWidth, $newHeight, $widthOriginal, $heightOriginal);
        //A memóriából fájlba írjuk a képet
        imagejpeg($output, $path . "/" . $elotag . $filename, 100);
    }
}
function kepkeszitesAbout( $uploaded,$path,$filename, $width, $height, $crop = false)
{
    //shortif-et teszünk a változóba
    $elotag = $width <= 100 ? "thumb_" : "about_";
    list($widthOriginal, $heightOriginal) = getimagesize($uploaded);
    $newRatio = $width / $height;
    //Álló kép
    $ratio = $widthOriginal / $heightOriginal;
    //Ha a kép arányai és méretei megegyeznek, akkor csak simán feltöltjük.
    if ($newRatio == $ratio) {//még kell a méret!!!
        $kep = imagecreatefromjpeg($uploaded);
        imagejpeg($kep, $path."/".$elotag.$filename, 100);
    } else {
        if ($ratio < 1) {
            $newWidth = $width;
            $newHeight = round($width / $ratio);
            $yoffset = ($height - $newHeight) / 2;
            $xoffset = 0;
        } else {//fekvő kép esetén
            /*$newHeight=$height;
            $newWidth=round($height*$ratio);
            $yoffset=0;
            $xoffset=($width-$newWidth)/2;*/

            $newHeight = round($height * $ratio);
            $newWidth = $width;
            $yoffset = 0;
            $xoffset = 0;
        }
        //A kép feleöltése a memóriába
        $kep = imagecreatefromjpeg($uploaded);
        //Üres "vászon" létrehozása
        $output = imagecreatetruecolor($width, $height);
        //A képet átméretezve másoljuk át
        imagecopyresized($output, $kep, $xoffset, $yoffset, 0, 0, $newWidth, $newHeight, $widthOriginal, $heightOriginal);
        //A memóriából fájlba írjuk a képet
        imagejpeg($output, $path . "/" . $elotag . $filename, 100);
    }
}
function kepkeszitesThumb1( $uploaded,$path,$filename, $width, $height, $crop = false){
    //Nem jó, fejleszteni kell.
    //shortif-et teszünk a változóba
    $elotag = $width <= 100 ? "thumb_" : "slide_";
    list($widthOriginal, $heightOriginal) = getimagesize($uploaded);
    //Álló kép
    $ratio=$widthOriginal/$heightOriginal;
    if($ratio < 1){
        $newWidth=$width;
        $newHeight=round($width / $ratio);
        $yoffset=0;
        $xoffset=0;
    } else {//fekvő kép esetén
        $newHeight=$height;
        $newWidth=round($height*$ratio);
        $yoffset=0;
        $xoffset=($width-$newWidth)/2;
    }
    //A kép feleöltése a memóriába
    $kep = imagecreatefromjpeg($uploaded);
    //Üres "vászon" létrehozása
    $output = imagecreatetruecolor($width, $height);
    //A képet átméretezve másoljuk át
    imagecopyresized($output, $kep, $xoffset,$yoffset,0,0,$newWidth,$newHeight,$widthOriginal,$heightOriginal);
    //A memóriából fájlba írjuk a képet
    imagejpeg($output,$path."/".$elotag.$filename,100);
}

/**
 * @param $uploaded
 * @param $path
 * @param $filename
 * @param $width
 * @param $height
 */
function kepkeszitesThumb($uploaded,$path,$filename, $width, $height){
    $elotag = "thumb_"; //$width <= 250 ? "thumb_" : "slide_";
    //feltöltött kép
    $imgSrc = $uploaded;
//kép dimenzió kinyerés
    list($width1, $height1) = getimagesize($imgSrc);
//memóriába mentés
    $myImage = imagecreatefromjpeg($imgSrc);
// képrészlet kiszámítása thumbnailhez
    if ($width1 > $height1) {
        $y = 0;
        $x = ($width1 - $height1) / 2;
        $smallestSide = $height1;
    } else {
        $x = 0;
        $y = ($height1 - $width1) / 2;
        $smallestSide = $width1;
    }
// képrészletből thumbnail készítése
    //$thumbSize = 250;
    $thumbWidth = $width;
    $thumbHeight = $height;
    $thumb = imagecreatetruecolor($thumbWidth, $thumbWidth);
    imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbWidth, $thumbHeight, $smallestSide, $smallestSide);
//output
    imagejpeg($thumb,$path."/".$elotag.$filename);
}

//kép feltöltés
/**
 * @param $uploaded a formba feltöltött kép
 * @param $path a kép útvonala
 * @param $filename a fájl neve
 * @return bool a sikeres vagy sikertelen feltöltés
 */
function kepfeltoltes($uploaded, $path, $filename, $about){
    //felvesszük az új fájl nevét egy változóba

    //letároljuk egy változóba a maximális feájlméretet MB-ban
    $max_mb = 10;
    //van-e feltöltött fájl. Ha a filesben lévő fájl mérete nagyobb, mint 0, akkor létezik
    if(1){}
    if (is_uploaded_file($uploaded)) {
        if (!is_dir($path)) mkdir($path, 0755, false);
        //megvan a fájl, jöhet a képkészítés funkció
        kepkeszitesThumb($uploaded, $path, $filename, 250, 250);
        //kepkeszites($uploaded,$path, $filename, 240, 180);
        kepkeszitesSlide($uploaded, $path, $filename, 1349, 586);
        if($about == 3) {
            kepkeszitesAbout($uploaded, $path, $filename, 1349, 674);
        }
        //a feltöltött eredeti fájlt törli
        return TRUE;//A feltöltés sikerült
    } else {

        $_SESSION['error'] = "A kép nem került feltöltésre: hibás fájltípus vagy túl nagy fájl.";
        return FALSE;//hibás fájltípus vagy túl nagy fájl
    }
}
//Ez a funkció tölti fel az addsingle.php és az editsingle.php form-ba beszúrt képet az uploads/tmp mappába. Ebben a mappában annyi képnek szabad lennie, ahány kiterjesztés van. nagybetűs JPG-vel nem működik.
/**
 * @param $uploaded a $_FILES kép
 * @param $path az útvonal, ahová menteni szeretném.
 */
function kepfeltoltes_single($uploaded, $path, $fileName){
    //var_dump($_FILES);
    $target_dir = $path;
    $target_file = $uploaded;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["kep"]["tmp_name"]);
    //$name = $_FILES["kep"]["name"];
    //$file_ext = strtolower(end(explode('.',$_FILES['kep']['name'])));
    $name = $fileName;
    if ($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
        if ($uploadOk == 1 && move_uploaded_file($target_file, "$target_dir/$name")) {
            return true;
        } else {
            $_SESSON['error'] = "Sikertelen a kép mentése. Valószínűleg rossz a képformátum.";
            //header("location: ");
        }
    }
}
//Nincs használatban, mert a fájlban lett helyileg megodlva.
/*function KivagottKepMentesThumb($dir, $croppedName){
        $targ_w = $targ_h = 150;
        $jpeg_quality = 90;

        $src = "$dir/thumb_$croppedName";//ezt át kell írni, mert a tmp kép lesz az src.
        $img_r = imagecreatefromjpeg($src);
        $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

        imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
            $targ_w,$targ_h,$_POST['w'],$_POST['h']);

        //header('Content-type: image/jpeg');
        $img = imagejpeg($dst_r,null,$jpeg_quality);
        //A kép feltöltése a cikk mappájába.
        //kepfeltoltes_single($img, $di, )

        //exit;
}*/

/** Szövegrészlet levágása a szöbeg elejétől a meghatározott szó szám alapján.
 * @param $text string, a szöveg, amiből szeretnék levágni
 * @param $limit int, a levágandó szavak száma
 * @return $text string, a levágott szövegrészlet
 */
function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}
function make_login_data($conn,$user,$pass){
    $qr = @mysqli_query($conn,"SELECT adat FROM ".PREFIX."_settings WHERE ID = 9 LIMIT 1");
    $qrR = @mysqli_fetch_array($qr);
    $qe = $qrR['adat'];
    $qr = @mysqli_query($conn,"SELECT adat FROM ".PREFIX."_settings WHERE ID = 10 LIMIT 1");
    $qrR = @mysqli_fetch_array($qr);
    $qs = $qrR['adat'];
    $qr = @mysqli_query($conn,"SELECT adat FROM ".PREFIX."_settings WHERE ID = 11 LIMIT 1");
    $qrR = @mysqli_fetch_array($qr);
    $qt = $qrR['adat'];
    //
    if (mb_strlen($pass) < 4 || mb_strlen($pass) > 10){
        $passLen = mb_strlen($pass);
        $_SESSION['error'] = "A módosítás nem sikerült. Hiba: ".$passLen." karekter.";
        return false;
    }
    $usernameModify = $user;
    $se = md5($qe);
    $username = md5($usernameModify.$se);
    $passwordModify = $pass;
    $s = md5($qs);
    $t = md5($qt);
    $password = md5($s.md5($passwordModify).$t);
    return array($username,$password);
}
function get_image_extension($imageName){
    $file_ext1 = explode('.',$imageName);
    $file_ext = strtolower(end($file_ext1));
    return $file_ext;
}