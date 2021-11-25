<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 03. 22.
 * Time: 15:59
*/
include_once '../config-cms.inc';
if(filter_input(INPUT_POST, 'submit-single') == 'submit-single'){
    //var_dump($_POST); echo '<hr/>';// exit();
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
        if(!empty(filter_input(INPUT_POST,'cikktartalom'))) {
            //Tartalom
            $cikkTartalom = strip_tags(trim(filter_input(INPUT_POST, 'cikktartalom', FILTER_SANITIZE_STRING)));
            //var_dump($cikkTartalom);
        } else {
            $cikkTartalom = $cikkCim;
        }
        //Bevezető szöveg
        if(!empty(filter_input(INPUT_POST,'cikkleiras'))) {
            $cikkLeiras = strip_tags(trim(filter_input(INPUT_POST, 'cikkleiras', FILTER_SANITIZE_STRING)));
            //var_dump($cikkLeiras);
        } else {
            //Ha üres, akkor leveszük az első 14 szót a tartatlomból.
            $cikkLeiras = limit_text($cikkTartalom, 14);
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
        if ($_FILES["kep"] != '') {//Ha képfeltöltést kezdeményez, és...
            if (is_uploaded_file($_FILES['kep']["tmp_name"])) {//...ha van kép a memóriában, és...
                if ($kepData = getimagesize($_FILES["kep"]["tmp_name"])) {//...ha van a képnek valós adattartalma, és...
                    if ($kepData["mime"] == "image/jpeg") {//...ha a kép jpg, akkor...
                        //$cikkAz = filter_input(INPUT_GET,'ID');
                        $dir = "includes/uploads/" . $cikkAz;
                        $fileName = $keresoNev . '.jpg';
                        kepfeltoltes($_FILES['kep']["tmp_name"], $dir, $fileName);
                    }
                }
            }
        } else {
            //$fileName = $queryA['kiemeltKep'];
            $fileName = $keresoNev . '.jpg';
        }
        $fileName = $keresoNev . '.jpg';
        //var_dump($fileName); exit();
        //ide jön a DB UPDATE
        //összekészítjük és futtatjuk az UPDATE-et.
        if(mysqli_query($connGWP, "UPDATE ".PREFIX."_content SET cikkCim='$cikkCim',cikkLeiras='$cikkLeiras',cikkTartalom='$cikkTartalom',cikkURL='$keresoNev',kiemeltKep='slide_$fileName',dobozKep='thumb_$fileName',kiemeltMainSlider='$kiemelt' WHERE ID='$cikkAz' LIMIT 1")){
            //Sikeres vagy sikertelen mentés után kiírjuk a hibaüzenetet és kiteszünk egy llinket, amin megnézheti a szerkesztett oldalt.
            if(mysqli_query($connGWP, "UPDATE ".PREFIX."_seo SET keywords='$keywords',description='$description',robots='$robots' WHERE seoID='1' AND oldalID='$cikkAz' LIMIT 1")){
                $_SESSION['success'] = 'Elmentettük a változásokat.';
            }
        } else {
            $_SESSION['error'] = 'Hiba a mentés során.';
        }
    }
}