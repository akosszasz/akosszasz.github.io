<?php
/**
 *
 */
ob_start();
include_once 'includes/config-cms.inc';
login_szukseges();
if(filter_input(INPUT_GET, 'logout')){
    logout();
}
include_once 'includes/site-elements/site-head.php';
include_once 'includes/site-elements/site-menu.php';
include_once 'includes/site-elements/site-footer.php';

