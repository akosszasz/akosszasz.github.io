<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 02. 20.
 * Time: 17:13
 */
?>
    <!-- Simple header with fixed tabs. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title"><a href="index.php" style="text-decoration: none;color:#fff"><?php echo NAME;?> - admin</a></span>
<!--                <div class="mdl-layout-spacer"></div>-->
<!--                <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable-->
<!--                  mdl-textfield--floating-label mdl-textfield--align-right">-->
<!--                    <label class="mdl-button mdl-js-button mdl-button--icon"-->
<!--                           for="waterfall-exp">-->
<!--                        <i class="material-icons">search</i>-->
<!--                    </label>-->
<!--                    <div class="mdl-textfield__expandable-holder">-->
<!--                        <input class="mdl-textfield__input" type="text" name="sample"-->
<!--                               id="waterfall-exp">-->
<!--                    </div>-->
<!--                </div>-->
            </div>
            <!-- Tabs -->
            <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark mdl-js-ripple-effect--ignore-events" style="z-index:0;position: relative;">
                <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Kategóriák</a>
                <!--a href="#fixed-tab-2" class="mdl-layout__tab">Kategóriák</a-->
                <a href="#fixed-tab-3" class="mdl-layout__tab">Beállítások</a>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <img class="mdl-chip__contact contact-avatar" src="<?php echo $menukep; ?>" alt="<?php echo NAME; ?>"/>
            <span class="mdl-layout-title mdl-typography--text-center" style="padding: 0;line-height: 30px"><?php echo NAME; ?></span>
            <span class="mdl-typography--text-center"><i>Bejelentkezve</i></span>
            <nav class="mdl-navigation" style="text-align:center">
                <a class="mdl-navigation__link" href="?ops-settings=1">Adatok módosítása</a>
                <a href="?logout=1" class="mdl-navigation__link">Kijelentkezés</a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
                <?php messages(); ?>
                <div class="page-content"><?php
                    if(filter_input(INPUT_GET,'editsingle') == 1 ){
                        include_once 'editsingle.php';
                    } else if(filter_input(INPUT_GET,'editsection') == 1 ){
                        include_once 'editsection.php';
                    } else if(filter_input(INPUT_GET,'addsingle') == 1 ){
                        include_once 'addsingle.php';
                    } else if(filter_input(INPUT_GET,'ops-settings') == 1){
                        include_once 'ops-settings.php';
                    } else if(filter_input(INPUT_GET,'crop') == 1 || filter_input(INPUT_GET,'crop') == 2){
                        include_once 'ajax/kepkivag.php';
                    } else if(filter_input(INPUT_GET,'sliderorder') == 1){
                        include_once 'sliderorder.php';
                    } else if(filter_input(INPUT_GET,'nocategory') == 1){
                        include_once 'nocategory.php';
                    } else {
                        include_once 'site-single.php';
                    }
                    /*Az eredeti - csak cikkes - meghjelenítés.
                     *Azért cseréltem le, mert a később várható sok cikk miatt áttekinthetetlen lenne az ömlesztett cikk megjelenítés.
                    if(filter_input(INPUT_GET,'editsingle') == 1 ){
                        include_once 'editsingle.php';
                    } else {
                        include_once 'site-single.php';
                    }*/
                    ?></div>
            </section>
            <section class="mdl-layout__tab-panel hide" id="fixed-tab-3">
                <div class="page-content"><?php include_once 'site-settings.php';?></div>
            </section>
            <footer class="mdl-mini-footer">
                <div class="mdl-mini-footer--left-section">
                    <div class="mdl-logo">CategoryCMS | &copy; Godla Imre | <?php echo date("Y"); ?></div>
                    <!--<ul class="mdl-mini-footer__link-list">
                        <li><a href="#">Segítség</a></li>
                    </ul>-->
                </div>
            </footer>
        </main>
    </div>