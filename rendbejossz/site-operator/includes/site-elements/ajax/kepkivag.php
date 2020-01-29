<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 05. 05.
 * Time: 18:11
 */

//feltöltött kép mentése tmp mappába
$dir = DIRADMIN."/includes/uploads/tmp";
$cikkID = filter_input(INPUT_GET,"cikkID");
$cikkURL = filter_input(INPUT_GET,"cikkURL");
//Ha cikkszerkesztés közben vagyunk, akkor később kiírjuk az üzenetet
if(filter_input(INPUT_GET,"edit")){
    $addOrEdit = true;
    $edit = "&edit=1";
} else {
    $addOrEdit = false;
    $edit = '';
}
$kepNev = filter_input(INPUT_GET,"kepNev");
$ext = get_image_extension($kepNev);

//$time = date('Y-m-d-H-i-s');//A névhez hozzáfűzök egy időpontot is.
//$fileName = "tmp-".$time;
/*$file_ext1 = explode('.',$_FILES['kep']['name']);
$file_ext = strtolower(end($file_ext1));
$name = "tmp.".$file_ext;
$akep = $_FILES['kep']["tmp_name"];*/
//Form feldolgozás:
//var_dump($_GET);
if(filter_input(INPUT_GET,'crop') == 1) {
    if (filter_input(INPUT_POST, "submit_thumb")) {
        //header("location: http://google.com/");
        //echo 'Belépett<br>';
        $targ_w = $targ_h = 250;
        $jpeg_quality = 90;

        $src = "includes/uploads/tmp/".$kepNev;
        if($ext == "jpg" || $ext == "JPG" || $ext == "jpeg"){
            $img_r = imagecreatefromjpeg($src);
            $dst_r = ImageCreateTrueColor($targ_w, $targ_h);

            imagecopyresampled($dst_r, $img_r, 0, 0, $_POST['x'], $_POST['y'],
                $targ_w, $targ_h, $_POST['w'], $_POST['h']);

            //header('Content-type: image/jpeg');
            //imagejpeg($dst_r,$src,$jpeg_quality);
            $time = microtime(true);
            $name = "thumb_".$cikkURL."-".$time.".".$ext;
            $name1 = "includes/uploads/site-img/".$cikkID."/".$name;
            if (imagejpeg($dst_r, $name1, $jpeg_quality)) {
                $query = @mysqli_query($connGWP, "UPDATE ".PREFIX."_content SET dobozKep='$name' WHERE ID='$cikkID' LIMIT 1");
                if($query){
                    header("location: ?crop=2&cikkID=$cikkID&cikkURL=$cikkURL&kepNev=$kepNev".$edit);
                    exit();
                } else {
                    $_SESSION['error'] = "Hibakód: 1201<br>Nem sikerült elmenteni a kép nevét a cikkhez. A cikk és a hozzá tartozó doboz kép már létezik, csak a doboz kép nevét nem sikerült hozzárendelni. Fejezd be a következő kép kivágását és jelezd a hibát a feljlesztőnek a hibakóddal.";
                    //de tovább engedem, hátha a slide még elkészül
                    header("location: ?crop=2&cikkID=$cikkID&cikkURL=$cikkURL&kepNev=$kepNev".$edit);
                    exit();
                }
            } else {
                echo ":(";
                exit();
            }
            //exit();
        } else if($ext == "png"){
            $img_r = imagecreatefrompng($src);
            $dst_r = ImageCreateTrueColor($targ_w, $targ_h);

            imagecopyresampled($dst_r, $img_r, 0, 0, $_POST['x'], $_POST['y'],
                $targ_w, $targ_h, $_POST['w'], $_POST['h']);

            //header('Content-type: image/jpeg');
            //imagejpeg($dst_r,$src,$jpeg_quality);
            $time = microtime(true);
            $name = "thumb_".$cikkURL."-".$time.".".$ext;
            $name1 = "includes/uploads/site-img/".$cikkID."/".$name;
            if (imagepng($dst_r, $name1)) {
                $query = mysqli_query($connGWP, "UPDATE ".PREFIX."_content SET dobozKep='$name' WHERE ID='$cikkID' LIMIT 1") or die(mysqli_error($connGWP));
                if($query){
                    header("location: ?crop=2&cikkID=$cikkID&cikkURL=$cikkURL&kepNev=$kepNev".$edit);
                    exit();
                } else {
                    $_SESSION['error'] = "Hibakód: 1201<br>Nem sikerült elmenteni a kép nevét a cikkhez. A cikk és a hozzá tartozó doboz kép már létezik, csak a doboz kép nevét nem sikerült hozzárendelni. Fejezd be a következő kép kivágását és jelezd a hibát a feljlesztőnek a hibakóddal.";
                    //de tovább engedem, hátha a slide még elkészül
                    header("location: ?crop=2&cikkID=$cikkID&cikkURL=$cikkURL&kepNev=$kepNev".$edit);
                    exit();
                }
            } else {
                echo ":(";
                exit();
            }
            //exit();
        } else {
            //Nem támogatott képformátum.
        }
    }

    if (1 == 1) {
        sleep(1);
        //kiszedem a feltöltött képet, kivágom és elmentem a két képet. Ezután törlöm a tmp mappába feltöltött eredeti képet.
        //$originalImgForEdit = "includes/uploads/tmp/tmp_".$cikkURL.".jpg";
        $originalImgForEdit = "includes/uploads/tmp/$kepNev";
        //$_POST = array();
        //var_dump($_POST);
        //
        ?>
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-card mdl-shadow--2dp">
                <div style="width:100%;text-align: center">
                    <h4 class="mdl-layout__title" style="width: 100%">1. Csempe kép kivágása</h4>
                    <?php messages(); ?>
                </div>
                <div>
                    <img id="cropbox" style="max-width: 100%; height:auto" src="<?php echo $originalImgForEdit; ?>">
                    <script>
                        /*$(document).ready(function(){
                            $('#cropbox').on('load', function() {
                                height = this.naturalHeight;
                                width  = this.naturalWidth;
                            });
                            console.log('menj a picsába');
                        });*/
                    </script>
                    <script type="text/javascript">
                        $(function () {
                            height = ($('#cropbox').prop('naturalHeight'));
                            width = ($('#cropbox').prop('naturalWidth'));
                            $('#cropbox').Jcrop({
                                aspectRatio: "<?php echo "{$aspectRatioThumb}";?>",
                                onSelect: updateCoords,
                                setSelect: [150, 0, 400, 400],
                                bgColor: "#303f9f",
                                bgOpacity: .3,
                                trueSize: [width,height]
                            });
                            $('.jcrop-holder').css("margin", "0 auto");
                        });
                        function updateCoords(c) {
                            $('#x').val(c.x);
                            $('#y').val(c.y);
                            $('#w').val(c.w);
                            $('#h').val(c.h);
                        }
                        ;

                        function checkCoords() {
                            if (parseInt($('#w').val())) return true;
                            alert('Jelöld ki a kivágandó területet!');
                            return false;
                        }
                        ;
                    </script>
                    <script>
                        //képvágás közben nem engedjük kattintani a headert:
                        $(document).ready(takar);
                        function takar(){
                            $('header').prepend("<div class='takar'>");
                            $(".takar").css({
                                'height':$('.mdl-layout__header-row').innerHeight()+'px',
                                'width':$('.mdl-layout__header-row').css('width'),
                                'position':'absolute',
                                'top':'0',
                                'z-index':'1000'
                            });
                            $('header').click(function(){
                                $('.mdl-layout-title').html('Vágd ki a képet!');
                            });
                        }
                    </script>
                    <form class="mdl-grid" action="" method="post" onsubmit="return checkCoords();">
                        <input type="hidden" id="x" name="x"/>
                        <input type="hidden" id="y" name="y"/>
                        <input type="hidden" id="w" name="w"/>
                        <input type="hidden" id="h" name="h"/>
                        <input style="margin: 20px auto;width:30%;color:#fff" type="submit" id="submit_thumb"
                               name="submit_thumb" value="Kivág"
                               class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--green-500"/>
                    </form>
                </div>
            </div>
        </div>
        <?php
    } else {
        $_SESSION['error'] = 'Hiba a mentés során.';
    }
} else if(filter_input(INPUT_GET, "crop") == 2){
    if (filter_input(INPUT_POST, "submit_slide")) {
        //header("location: http://google.com/");
        //echo 'Belépett<br>';
        $targ_w = 1349;
        $targ_h = 586.52;
        $jpeg_quality = 90;
        //$src = "includes/uploads/tmp/tmp_".$cikkURL.".jpg";
        $src = "includes/uploads/tmp/".$kepNev;

        if($ext == "jpg" || $ext == "JPG" || $ext == "jpeg"){
            $img_r = imagecreatefromjpeg($src);
            $dst_r = ImageCreateTrueColor($targ_w, $targ_h);

            imagecopyresampled($dst_r, $img_r, 0, 0, $_POST['x'], $_POST['y'],
                $targ_w, $targ_h, $_POST['w'], $_POST['h']);

            //header('Content-type: image/jpeg');
            //imagejpeg($dst_r,$src,$jpeg_quality);
            $time = microtime(true);
            $name = "slide_".$cikkURL."-".$time.".".$ext;
            $name1 = "includes/uploads/site-img/".$cikkID."/".$name;
            if (imagejpeg($dst_r, $name1, $jpeg_quality)) {
                $query = @mysqli_query($connGWP, "UPDATE ".PREFIX."_content SET kiemeltKep='$name' WHERE ID='$cikkID' LIMIT 1");
                if($query){
                    unlink($src);
                    //Ha cikkszerkesztés közben töltünk fel képet, akkor kiírjük az üzenetet.
                    if(filter_input(INPUT_GET, 'edit')){
                        $_SESSION['success'] = 'Elmentettük a változásokat.';
                    }
                    header("location: ?editsingle=1&ID=".$cikkID);
                    exit();
                } else {
                    $_SESSION['error'] = "Hibakód: 1202<br>Nem sikerült elmenteni a slider kép nevét a cikkhez. A cikk és a hozzá tartozó slider kép már létezik, csak a slider kép nevét nem sikerült hozzárendelni. Fejezd be a következő kép kivágását és jelezd a hibát a feljlesztőnek a hibakóddal.";
                    //de tovább engedem, és kijavítjuk a hibát, ha jelezte.
                    header("location: ?editsingle=1&ID=".$cikkID);
                    exit();
                }
                unlink($src);
                header("location: ?editsingle=1&ID=".$cikkID);
                exit();
            } else {
                echo ":(";
                exit();
            }
            //exit();
        } else if($ext == "png"){
            $img_r = imagecreatefrompng($src);
            $dst_r = ImageCreateTrueColor($targ_w, $targ_h);

            imagecopyresampled($dst_r, $img_r, 0, 0, $_POST['x'], $_POST['y'],
                $targ_w, $targ_h, $_POST['w'], $_POST['h']);

            //header('Content-type: image/jpeg');
            //imagejpeg($dst_r,$src,$jpeg_quality);
            $time = microtime(true);
            $name = "slide_".$cikkURL."-".$time.".".$ext;
            $name1 = "includes/uploads/site-img/".$cikkID."/".$name;
            if (imagepng($dst_r, $name1)) {
                $query = @mysqli_query($connGWP, "UPDATE ".PREFIX."_content SET kiemeltKep='$name' WHERE ID='$cikkID' LIMIT 1");
                if($query){
                    //Ha cikkszerkesztés közben töltünk fel képet, akkor kiírjük az üzenetet.
                    if(filter_input(INPUT_GET, 'edit')){
                        $_SESSION['success'] = 'Elmentettük a változásokat.';
                    }
                    unlink($src);
                    header("location: ?editsingle=1&ID=".$cikkID);
                    exit();
                } else {
                    $_SESSION['error'] = "Hibakód: 1202<br>Nem sikerült elmenteni a slider kép nevét a cikkhez. A cikk és a hozzá tartozó slider kép már létezik, csak a slider kép nevét nem sikerült hozzárendelni. Fejezd be a következő kép kivágását és jelezd a hibát a feljlesztőnek a hibakóddal.";
                    //de tovább engedem, és kijavítjuk a hibát, ha jelezte.
                    header("location: ?editsingle=1&ID=".$cikkID);
                    exit();
                }
                unlink($src);
                header("location: ?editsingle=1&ID=".$cikkID);
                exit();
            } else {
                echo ":(";
                exit();
            }
            //exit();
        } else {
            //Nem támogatott képformátum.
        }
    }
    //$originalImgForEdit = "includes/uploads/tmp/tmp_".$cikkURL.".jpg";
    $originalImgForEdit = "includes/uploads/tmp/$kepNev";
    //$_POST = array();
    //var_dump($_POST);
    //
    ?>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-card mdl-shadow--2dp">
            <div style="width:100%;text-align: center">
                <h4 class="mdl-layout__title" style="width: 100%">2. Főkép kivágása</h4>
                <?php messages(); ?>
            </div>
            <div>
                <img id="cropbox" style="max-width: 100%; height:auto" src="<?php echo $originalImgForEdit; ?>">
                <script type="text/javascript">
                    $(function () {
                        height = ($('#cropbox').prop('naturalHeight'));
                        width = ($('#cropbox').prop('naturalWidth'));
                        $('#cropbox').Jcrop({
                            aspectRatio: "<?php echo "{$aspectRatioFull1}";?>" / "<?php echo "{$aspectRatioFull2}";?>",//2.30000682,
                            onSelect: updateCoords,
                            setSelect:   [ 1000, 0, 0, 0 ],
                            bgColor: "#303f9f",
                            bgOpacity: .3,
                            trueSize: [width,height]
                        });
                        $('.jcrop-holder').css("margin","0 auto");
                    });

                    function updateCoords(c) {
                        $('#x').val(c.x);
                        $('#y').val(c.y);
                        $('#w').val(c.w);
                        $('#h').val(c.h);
                    }
                    ;

                    function checkCoords() {
                        if (parseInt($('#w').val())) return true;
                        alert('Jelöld ki a kivágandó területet!');
                        return false;
                    }
                    ;
                </script>
                <script>
                    //képvágás közben nem engedjük kattintani a headert:
                    $(document).ready(takar);
                    function takar(){
                        $('header').prepend("<div class='takar'>");
                        $(".takar").css({
                            'height':$('.mdl-layout__header-row').innerHeight()+'px',
                            'width':$('.mdl-layout__header-row').css('width'),
                            'position':'absolute',
                            'top':'0',
                            'z-index':'1000'
                        });
                        $('header').click(function(){
                            $('.mdl-layout-title').html('Vágd ki a képet!');
                        });
                    }
                </script>
                <form class="mdl-grid" action="" method="post" onsubmit="return checkCoords();">
                    <input type="hidden" id="x" name="x"/>
                    <input type="hidden" id="y" name="y"/>
                    <input type="hidden" id="w" name="w"/>
                    <input type="hidden" id="h" name="h"/>
                    <input style="margin: 20px auto;width:30%;color:#fff" type="submit" id="submit_slide" name="submit_slide" value="Kivág"
                           class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--green-500"/>
                </form>
            </div>
            <!--<div class="mdl-dialog__actions">
                <button type="button" class="mdl-button">Tovább</button>
                <button type="button" class="mdl-button close">Disagree</button>
            </div>-->
        </div>
    </div>
    <?php
}