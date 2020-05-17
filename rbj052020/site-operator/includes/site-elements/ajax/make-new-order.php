<?php
/**
 * User: Godla Imre
 * Date: 2017. 04. 25.
 * Time: 15:52
 */
//újra fel kell építeni a kapcsolatot az ajax hívás miatt.
require('./../../../modules_settings.php');
$connGWP = @mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
@mysqli_select_db($connGWP, DBNAME);
@mysqli_set_charset($connGWP, 'UTF8');

if(array_key_exists("newSort",$_POST)){
    $sortArray = filter_input(INPUT_POST, "newSort");
    $id_ary = explode("&sort=", $sortArray);
    $id_int = filter_var_array($id_ary, FILTER_SANITIZE_NUMBER_INT);
    for ($i = 0; $i < count($id_int); $i++) {
        if (!mysqli_query($connGWP, "UPDATE ".PREFIX."_content SET cikkSorrend='" . $i . "' WHERE ID=" . $id_int[$i])) {
            echo ':( ';
        }
    };
}
if(array_key_exists("newSortSlider",$_POST)) {
    $sortArray = filter_input(INPUT_POST, "newSortSlider");
    $id_ary = explode("&slider=", $sortArray);
    $id_int = filter_var_array($id_ary, FILTER_SANITIZE_NUMBER_INT);
    for ($i = 0; $i < count($id_int); $i++) {
        if (!mysqli_query($connGWP, "UPDATE ".PREFIX."_content SET sliderSorrend='" . $i . "' WHERE ID=" . $id_int[$i])) {
            echo ':( ';
        }
    };
}