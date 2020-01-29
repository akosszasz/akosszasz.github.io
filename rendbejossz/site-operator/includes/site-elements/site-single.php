<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 02. 27.
 * Time: 10:02
 */
//Cikk hozzáadása gomb
?>
        <ul class="add-buttons">
            <li>
                <button id="add" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-color--green-500" onclick="location.href='<?php echo ADDSINGLE; ?>'">
                    <i class="material-icons">add</i>
                    <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 160.392px; height: 160.392px; transform: translate(-50%, -50%) translate(26px, 35px);"></span></span>
                </button>
            </li>
        </ul>
<?php
/*
$cikkek = mysqli_query($connGWP,'SELECT * FROM ".PREFIX."_content ORDER BY cikkSorrend');
//echo '<div class="mdl-layout__header is-casting-shadow" style="text-align: center"><h3>Aktuális</h3></div>';
echo '                <div class="mdl-grid" style="background-color: rgb(63,81,181)">';
while($cikkRow = mysqli_fetch_array($cikkek)){
    $cikkID = $cikkRow['ID'];
    $cikkC = $cikkRow['cikkCim'];
    $cikkA = $cikkRow['cikkLeiras'];
    $cikkU = $cikkRow['cikkURL'];
    $cikkI = 'http://localhost/salsamojito.hu/site-operator/includes/uploads/site-img/'.$cikkID.'/'.$cikkRow['dobozKep'];
    $cikkK = $cikkRow['kiemeltMainSlider'];
    $cikkSecID = $cikkRow['sectionID'];
    $secQ = mysqli_query($connGWP,"SELECT secCim FROM ".PREFIX."_sections WHERE ID='$cikkSecID' LIMIT 1");
    $secA = mysqli_fetch_array($secQ);
    $sec = $secA['secCim'];

    if($cikkK == 1){
        $cikkKiemelt = '<span class="mdl-chip mdl-chip--contact">
                            <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white" style="line-height: 44px">
                                <i class="material-icons">done</i></span>
                            <span class="mdl-chip__text">Kiemelt</span>
                        </span>
                        ';
    } else {
        $cikkKiemelt = '';
    }
    echo "
                    <div id='$cikkID' class=\"mdl-cell mdl-cell--4-col mdl-card mdl-shadow--2dp\">                        
                        <div class=\"mdl-card__title single\" style='background-image: url($cikkI);'>        
                            <h2 class=\"mdl-card__title-text single\" >$cikkC</h2>            
                        </div>
                        <div class=\"mdl-card__supporting-text\">
                            $cikkA
                        </div>                        
                        <p class='mdl-textfield--align-right' style='margin-bottom: 0'>
                            $cikkKiemelt
                            <span class=\"mdl-chip\">
                                <span class=\"mdl-chip__text\">$sec</span>
                            </span>
                            <button class=\"mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect\" onclick=\"location.href='?editsingle=1&ID=$cikkID'\" style=''>
                                <i class=\"material-icons\">edit</i>
                            </button>                        
                        </p>
                    </div>";
}
echo '
                </div>';*/
/*//Aktuális
$cikkek = mysqli_query($connGWP,'SELECT * FROM ".PREFIX."_content WHERE sectionID=1  ORDER BY cikkSorrend');
echo '<div class="mdl-layout__header is-casting-shadow" style="text-align: center"><h3>Aktuális</h3></div>';
echo '                <div class="mdl-grid">';
while($cikkRow = mysqli_fetch_array($cikkek)){
    $cikkC = $cikkRow['cikkCim'];
    $cikkA = $cikkRow['cikkLeiras'];
    $cikkU = $cikkRow['cikkURL'];
    $cikkI = 'http://localhost/salsamojito.hu/includes/elements/uploads/site-img/'.$cikkRow['dobozKep'];
    $cikkK = $cikkRow['kiemeltMainSlider'];
    $cikkID = $cikkRow['ID'];
    $cikkSecID = $cikkRow['sectionID'];
    $secQ = mysqli_query($connGWP,"SELECT secCim FROM ".PREFIX."_sections WHERE ID='$cikkSecID' LIMIT 1");
    $secA = mysqli_fetch_array($secQ);
    $sec = $secA['secCim'];

    if($cikkK == 1){
        $cikkKiemelt = '<span class="mdl-chip mdl-chip--contact">
                            <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white" style="line-height: 44px">
                                <i class="material-icons">done</i></span>
                            <span class="mdl-chip__text">Kiemelt</span>
                        </span>
                        ';
    } else {
        $cikkKiemelt = '';
    }
    echo "
                    <div class=\"mdl-cell mdl-cell--4-col mdl-card mdl-shadow--2dp\">        
                        <div class=\"mdl-card__title single\" style='background-image: url($cikkI);'>        
                            <h2 class=\"mdl-card__title-text single\" >$cikkC</h2>            
                        </div>
                        <div class=\"mdl-card__supporting-text\">
                            $cikkA
                        </div>                        
                        <p class='mdl-textfield--align-right' style='margin-bottom: 0'>
                            $cikkKiemelt
                            <span class=\"mdl-chip\">
                                <span class=\"mdl-chip__text\">$sec</span>
                            </span>
                            <button class=\"mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect\" onclick=\"location.href='?editsingle=$cikkID'\" style=''>
                                <i class=\"material-icons\">edit</i>
                            </button>                        
                        </p>
                    </div>";
}
echo '
                </div>';
//Órarend
echo '<div class="mdl-layout__header is-casting-shadow" style="text-align: center"><h3>Órarend</h3></div>';
echo '                <div class="mdl-grid">';
$cikkek = mysqli_query($connGWP,'SELECT * FROM ".PREFIX."_content WHERE sectionID=2  ORDER BY cikkSorrend');
while($cikkRow = mysqli_fetch_array($cikkek)){
    $cikkC = $cikkRow['cikkCim'];
    $cikkA = $cikkRow['cikkLeiras'];
    $cikkU = $cikkRow['cikkURL'];
    $cikkI = 'http://localhost/salsamojito.hu/includes/elements/uploads/site-img/'.$cikkRow['dobozKep'];
    $cikkK = $cikkRow['kiemeltMainSlider'];
    $cikkID = $cikkRow['ID'];
    $cikkSecID = $cikkRow['sectionID'];
    $secQ = mysqli_query($connGWP,"SELECT secCim FROM ".PREFIX."_sections WHERE ID='$cikkSecID' LIMIT 1");
    $secA = mysqli_fetch_array($secQ);
    $sec = $secA['secCim'];

    if($cikkK == 1){
        $cikkKiemelt = '<span class="mdl-chip mdl-chip--contact">
                            <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white" style="line-height: 44px">
                                <i class="material-icons">done</i></span>
                            <span class="mdl-chip__text">Kiemelt</span>
                        </span>
                        ';
    } else {
        $cikkKiemelt = '';
    }
    echo "
                    <div class=\"mdl-cell mdl-cell--4-col mdl-card mdl-shadow--2dp\">        
                        <div class=\"mdl-card__title single\" style='background-image: url($cikkI);'>        
                            <h2 class=\"mdl-card__title-text single\" >$cikkC</h2>            
                        </div>
                        <div class=\"mdl-card__supporting-text\">
                            $cikkA
                        </div>                        
                        <p class='mdl-textfield--align-right' style='margin-bottom: 0'>
                            $cikkKiemelt
                            <span class=\"mdl-chip\">
                                <span class=\"mdl-chip__text\">$sec</span>
                            </span>
                            <button class=\"mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect\" onclick=\"location.href='?editsingle=$cikkID'\" style=''>
                                <i class=\"material-icons\">edit</i>
                            </button>                        
                        </p>
                    </div>";
}
echo '
                </div>';
//Órarend
echo '<div class="mdl-layout__header is-casting-shadow" style="text-align: center"><h3>Rólunk</h3></div>';
echo '                <div class="mdl-grid">';
$cikkek = mysqli_query($connGWP,'SELECT * FROM ".PREFIX."_content WHERE sectionID=3  ORDER BY cikkSorrend');
while($cikkRow = mysqli_fetch_array($cikkek)){
    $cikkC = $cikkRow['cikkCim'];
    $cikkA = $cikkRow['cikkLeiras'];
    $cikkU = $cikkRow['cikkURL'];
    $cikkI = 'http://localhost/salsamojito.hu/includes/elements/uploads/site-img/'.$cikkRow['dobozKep'];
    $cikkK = $cikkRow['kiemeltMainSlider'];
    $cikkID = $cikkRow['ID'];
    $cikkSecID = $cikkRow['sectionID'];
    $secQ = mysqli_query($connGWP,"SELECT secCim FROM ".PREFIX."_sections WHERE ID='$cikkSecID' LIMIT 1");
    $secA = mysqli_fetch_array($secQ);
    $sec = $secA['secCim'];

    if($cikkK == 1){
        $cikkKiemelt = '<span class="mdl-chip mdl-chip--contact">
                            <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white" style="line-height: 44px">
                                <i class="material-icons">done</i></span>
                            <span class="mdl-chip__text">Kiemelt</span>
                        </span>
                        ';
    } else {
        $cikkKiemelt = '';
    }
    echo "
                    <div class=\"mdl-cell mdl-cell--4-col mdl-card mdl-shadow--2dp\">        
                        <div class=\"mdl-card__title single\" style='background-image: url($cikkI);'>        
                            <h2 class=\"mdl-card__title-text single\" >$cikkC</h2>            
                        </div>
                        <div class=\"mdl-card__supporting-text\">
                            $cikkA
                        </div>                        
                        <p class='mdl-textfield--align-right' style='margin-bottom: 0'>
                            $cikkKiemelt
                            <span class=\"mdl-chip\">
                                <span class=\"mdl-chip__text\">$sec</span>
                            </span>
                            <button class=\"mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect\" onclick=\"location.href='?editsingle=$cikkID'\" style=''>
                                <i class=\"material-icons\">edit</i>
                            </button>                        
                        </p>
                    </div>";
}
echo '
                </div>';*/
?>
    <div class="mdl-grid mdl-color--primary">
        <div class="mdl-textfield" style="text-align: center">
            <h1 class="mdl-typography--title" style="color:#fff">Kategóriák</h1>
        </div>
    </div>
    <div class="mdl-grid" style="background-color: rgb(63,81,181)">
<?php
//Kategóriák kilistázása
$secS = mysqli_query($connGWP,"SELECT * FROM ".PREFIX."_sections ORDER BY ID");
while($row = mysqli_fetch_array($secS)){
    $secID = $row['ID'];
    $secURL = $row['secURL'];
    $secCim =  $row['secCim'];
    $secAlcim =  $row['secAlcim'];
    $secKep =  FRONTEND.'/site-operator/includes/uploads/'.$row['secKep'];
    //Megjelenítem dobozokban
    echo "
                    <div id='$secURL' class=\"mdl-cell mdl-cell--6-col mdl-card mdl-shadow--2dp\">                        
                        <div class=\"mdl-card__title single\" style='background-image: url($secKep);background-position: center; background-color: $adminBoxBgColor;background-size:contain;background-repeat:no-repeat'>
                            <h2 class=\"mdl-card__title-text single\" >$secCim</h2>            
                        </div>
                        <div class=\"mdl-card__supporting-text\">
                            $secAlcim
                        </div>
                        <p class='mdl-textfield--align-right' style='margin-bottom: 0'>
                            <div class=\"mdl-card__actions mdl-textfield--align-right\">
                                <a href='?editsection=1&ID=$secID' class=\"mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect\">
                                    TOVÁBB
                                </a>
                            </div>
                            <!--button class=\"mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect\" onclick=\"location.href='?editsection=1&ID=$secID'\" style=''>
                                <i class=\"material-icons\">edit</i>
                            </button-->                        
                        </p>                        
                    </div>";
}
//Főslider cikkek
/*echo "
                    <div id='sliderorder' class=\"mdl-cell mdl-cell--6-col mdl-card mdl-shadow--2dp\">
                        <div class=\"mdl-card__title single\" style='background-color: #E53935'>        
                            <h2 class=\"mdl-card__title-text single\" >Slider</h2>            
                        </div>
                        <div class=\"mdl-card__supporting-text\">
                            A fő sliderben megjelenő cikkek. Itt tudod beállítani a sliderben megjelenő cikkek sorrendjét.<br/>A slider-ben maximum 10 db cikk jelenhet meg. Lehet több cikk is a listában, de csak az első 10 jelenik meg a weboldalon.
                        </div>
                        <p class='mdl-textfield--align-right' style='margin-bottom: 0'>
                            <div class=\"mdl-card__actions mdl-textfield--align-right\">
                                <a href='?sliderorder=1' class=\"mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect\">
                                    TOVÁBB
                                </a>
                            </div>
                            <!--button class=\"mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect\" onclick=\"location.href='?editsection=1&ID=$secID'\" style=''>
                                <i class=\"material-icons\">edit</i>
                            </button-->                        
                        </p>                        
                    </div>";
*/
//Kategória nélküli cikkek
echo "
                    <div id='nocategory' class=\"mdl-cell mdl-cell--6-col mdl-card mdl-shadow--2dp\">                        
                        <div class=\"mdl-card__title single\" style='background-color: $adminBoxBgColor'>
                            <h2 class=\"mdl-card__title-text single\" >Kategória nélküli cikkek</h2>            
                        </div>
                        <div class=\"mdl-card__supporting-text\">
                            Azok a cikkek jelennek meg itt, amelyek egyik kategóriába sem tartoznak.
                        </div>
                        <p class='mdl-textfield--align-right' style='margin-bottom: 0'>
                            <div class=\"mdl-card__actions mdl-textfield--align-right\">
                                <a href='?nocategory=1' class=\"mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect\">
                                    TOVÁBB
                                </a>
                            </div>
                            <!--button class=\"mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect\" onclick=\"location.href='?editsection=1&ID=$secID'\" style=''>
                                <i class=\"material-icons\">edit</i>
                            </button-->                        
                        </p>                        
                    </div>";
?>
</div>