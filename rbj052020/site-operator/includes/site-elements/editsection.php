<ul class="add-buttons">
    <li>
        <button id="" type="button" onclick="location.href='index.php'" name="submit-single" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-color--red-500" value="back">
            <i class="material-icons">clear</i>
            <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 160.392px; height: 160.392px; transform: translate(-50%, -50%) translate(26px, 35px);"></span></span>
        </button>
    </li>
<?php
/**
 * Created by
 * User: Godla Imre
 * Date: 2017. 03. 30.
 * Time: 10:42
 */
//Adott kategóriában szereplő cikkek megjelenítése megjelenítési sorrend alapján.
$secID = filter_input(INPUT_GET, 'ID');
$secCim1 = mysqli_query($connGWP,"SELECT secCim FROM ".PREFIX."_sections WHERE ID='$secID' LIMIT 1");
$secCim2 = mysqli_fetch_array($secCim1);
$secCim = $secCim2['secCim'];
//Ha kapcsolat kategória alatt vagyunk, akkor nem mutatja a cikk hozzáadása gombot, mert ebbe a kategóriába csak egyetlen cikk tartozhat.
if ($secID != 6){
    $csak = '';
    echo '<li><button id="" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-color--green-500" onclick="location.href=\''.ADDSINGLE.'\'">
    <i class="material-icons">add</i>
    <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 160.392px; height: 160.392px; transform: translate(-50%, -50%) translate(26px, 35px);"></span></span>
</button></li>';
} else {
    $csak = '<p style="text-align: center;color:#fff"><i class="material-icons">error_outline</i><br/>Ebbe a kategóriába csak egyelen cikk tartozhat.</p>';
}
?></ul>
    <div class="mdl-grid" style="background-color: rgb(63,81,181)">
        <div class="mdl-textfield" style="text-align: center">
            <h1 class="mdl-typography--title" style="color:#fff"><?php echo $secCim; ?> cikkek beállításai</h1>
            <?php echo $csak; ?>
        </div>
    </div>
<?php
//$cikkek = mysqli_query($connGWP,"SELECT * FROM gw_sal_content WHERE sectionID='$secID' ORDER BY kiemeltCikk DESC, timeCreated DESC");
$cikkek = mysqli_query($connGWP,"SELECT * FROM ".PREFIX."_content WHERE sectionID='$secID' ORDER BY cikkSorrend, timeCreated DESC");
//echo '<div class="mdl-layout__header is-casting-shadow" style="text-align: center"><h3>Aktuális</h3></div>';
echo '                <div class="mdl-grid drag-n-drop" style="background-color: rgb(63,81,181)">';
while($cikkRow = mysqli_fetch_array($cikkek)){
    $cikkID = $cikkRow['ID'];
    $cikkC = $cikkRow['cikkCim'];
    $cikkA = $cikkRow['cikkLeiras'];
    $cikkT = $cikkRow['timeCreated'];
    $cikkU = $cikkRow['cikkURL'];
    $cikkI = DIR.'/includes/uploads/site-img/'.$cikkID.'/'.$cikkRow['dobozKep'];
    $cikkS = $cikkRow['kiemeltMainSlider'];
    $cikkK = $cikkRow['kiemeltCikk'];
    $cikkSecID = $cikkRow['sectionID'];
    $secQ = mysqli_query($connGWP,"SELECT secCim FROM ".PREFIX."_sections WHERE ID='$cikkSecID' LIMIT 1");
    $secA = mysqli_fetch_array($secQ);
    $sec = $secA['secCim'];
    //Slider cikk esetén
    if($cikkS == 1){
        $cikkSlider = '<span class="mdl-chip mdl-chip--contact">
                            <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white" style="line-height: 44px">
                                <i class="material-icons">done</i></span>
                            <span class="mdl-chip__text">Slider</span>
                        </span>
                        ';
    } else {
        $cikkSlider = '';
    }
    //Kiemelt cikk esetén
    if($cikkK == 1){
        $cikkKiemelt = '<span class="mdl-chip mdl-chip--contact">
                            <span class="mdl-chip__contact mdl-color--red-500 mdl-color-text--white" style="line-height: 44px">
                                <i class="material-icons">done</i></span>
                            <span class="mdl-chip__text">Kiemelt</span>
                        </span>
                        ';
    } else {
        $cikkKiemelt = '';
    }
    echo "
                    <div id='id-$cikkID' class=\"mdl-cell mdl-cell--4-col mdl-card mdl-shadow--2dp\">                        
                        <div class=\"mdl-card__title single\" style='background-image: url($cikkI);'>        
                            <h2 class=\"mdl-card__title-text single\" >$cikkC</h2>            
                        </div>                       
                        <div class=\"mdl-card__supporting-text\">
                            <p class='admin-p'>$cikkA<br/>$cikkT</p>                            
                        </div>
                        <div class='boxbottom' style='position: absolute;bottom:0;width:100%'>
                            <hr class='admin-hr'/>
                            <p class='mdl-textfield--align-right' style='margin-bottom: 0'>                        
                                $cikkKiemelt
                                $cikkSlider
                                <!--span class=\"mdl-chip\">
                                    <span class=\"mdl-chip__text\">$sec</span>
                                </span-->
                                <button class=\"mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-color--orange mdl-js-ripple-effect\" onclick=\"location.href='?editsingle=1&ID=$cikkID'\" style='color:#fff'>
                                    <i class=\"material-icons\">edit</i>
                                </button>                        
                            </p>
                        </div>
                    </div>";
}
echo '
                </div>';
?>
<script type="text/javascript" src="includes/theme/js/boxbottom.js"></script>
