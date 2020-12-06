<ul class="add-buttons">
    <li>
        <button id="" type="button" onclick="location.href='index.php#sliderorder'" name="submit-single" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-color--red-500" value="back">
            <i class="material-icons">clear</i>
            <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 160.392px; height: 160.392px; transform: translate(-50%, -50%) translate(26px, 35px);"></span></span>
        </button>
    </li>
    <li>
        <button id="" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-color--green-500" onclick="location.href='<?php echo ADDSINGLE; ?>'">
            <i class="material-icons">add</i>
            <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 160.392px; height: 160.392px; transform: translate(-50%, -50%) translate(26px, 35px);"></span></span>
        </button>
    </li>
</ul>
<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 05. 19.
 * Time: 16:04
 */
//Sliderben megjelenő cikkek ORDER BY sliderSorrend
$cikkek = mysqli_query($connGWP,"SELECT * FROM ".PREFIX."_content WHERE kiemeltMainSlider=1 ORDER BY sliderSorrend ASC");
$row_cnt = $cikkek->num_rows;
if($row_cnt == 0){
    $_SESSION['error'] = "Nincs megjeleníthető cikk.";
}
?>
    <div class="mdl-grid" style="background-color: rgb(63,81,181)">
        <div class="mdl-textfield" style="text-align: center">
            <h1 class="mdl-typography--title" style="color:#fff">Slider cikk sorrend</h1>
            <?php messages(); ?>
        </div>
    </div>
<?php
echo '                <div class="mdl-grid sliderorder" style="background-color: rgb(63,81,181)">';
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
                    </div>";
}
echo '
                </div>';