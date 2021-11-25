<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 03. 09.
 * Time: 10:18
 */
require "includes/config-cms.inc";
if (logged_in()) {
    header("Location: ".DIRADMIN);
 }
//include 'includes/site-elements/site-head.php';
?>
<!DOCTYPE html>
<html lang="hu-HU">
<head>
    <!-- META SETTINGS -->
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Godla Imre, www.godla.hu"/>
    <meta name="copyright" content="A weboldal bármely rézsletének felhasználása tilos, a tulajdonos írásos engedélyéhez kötött. Godla Imre, minden jog fenntartva.">
    <!-- STYLE -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <!--link rel="stylesheet" href="includes/theme/materialize/css/materialize.css" type="text/css" media="screen,projection"/-->
    <link rel="stylesheet" href="includes/theme/mdl/material.css" type="text/css" media="screen,projection"/>
    <link rel="stylesheet" href="includes/theme/custom.css" type="text/css"/>
    <?php echo $favicon; ?>

    <style>
        body{
            background: #4E342E;
        }
        /*kártya*/
        .demo-card-wide.mdl-card {
            width: auto;
        }
        .demo-card-wide > .mdl-card__title {
            color: #00a0a0;
            height: 200px;
            background: url('../img/logo.svg') center;
            background-size: 35%;
            background-repeat: no-repeat;
            background-color: #fff;
            border-bottom: 3px solid #00a0a0;
        }
        .demo-card-wide > .mdl-card__menu {
            color: #fff;
        }
        .login{
            margin-top: 1em;
        }
        /*.mdl-textfield--floating-label input[type=password]:-webkit-autofill ~ label {
            transform: translate3d(0, -21px, 0);
            visibility: hidden;
        }
        .mdl-textfield--floating-label input[type=password]:-webkit-autofill ~ label:after {
            content: 'Jelszó...';
            visibility: visible;
            left: 0;
            transform: translate3d(0, -21px, 0);
            background: transparent;
            color: inherit;
        }*/
    </style>
</head>
<body>
    <main>
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset-desktop mdl-cell--2-offset-tablet mdl-shadow--2dp login">
                <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
<!--                        <h2 class="mdl-card__title-text">Bejelentkezés</h2>-->
                    </div>
                    <div class="mdl-card__supporting-text">
                        <h2 class="mdl-card__title-text" style="color:#00a0a0">Bejelentkezés</h2>
                        <p>az admin felülethez való továbblépéshez</p>
                    </div>
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop mdl-cell--0-offset-tablet">
<!--                            <span class="mdl-layout-title mdl-typography--text-center" style="padding: 0;line-height: 30px">rendbejossz.hu</span>-->
                            <form method="post" id="form-log" accept-charset="uft-8" role="form">
                                <?php
                                if (filter_input(INPUT_POST, 'submit')) {
                                    if (filter_input(INPUT_POST, 'felh') && filter_input(INPUT_POST, 'pass')) {
                                        /*//
                                        $qr = @mysqli_query($connGWP,"SELECT adat FROM gw_sal_settings WHERE ID = 9 LIMIT 1");
                                        $qrR = @mysqli_fetch_array($qr);
                                        $qe = $qrR['adat'];
                                        $qr = @mysqli_query($connGWP,"SELECT adat FROM gw_sal_settings WHERE ID = 10 LIMIT 1");
                                        $qrR = @mysqli_fetch_array($qr);
                                        $qs = $qrR['adat'];
                                        $qr = @mysqli_query($connGWP,"SELECT adat FROM gw_sal_settings WHERE ID = 11 LIMIT 1");
                                        $qrR = @mysqli_fetch_array($qr);
                                        $qt = $qrR['adat'];
                                        //
                                        $usernameFromForm = trim(filter_input(INPUT_POST, 'felh', FILTER_SANITIZE_EMAIL));
                                        $se = md5($qe);
                                        $username = md5($usernameFromForm.$se);
                                        $passwordFromForm = trim(filter_input(INPUT_POST, 'pass',FILTER_SANITIZE_STRING));
                                        $s = md5($qs);
                                        $t = md5($qt);
                                        $password = md5($s.md5($passwordFromForm).$t);
                                        //
                                        login($connGWP, $username, $password);*/
                                        $usernameFromForm = trim(filter_input(INPUT_POST, 'felh', FILTER_SANITIZE_EMAIL));
                                        $passwordFromForm = trim(filter_input(INPUT_POST, 'pass',FILTER_SANITIZE_STRING));
                                        $login = make_login_data($connGWP,$usernameFromForm,$passwordFromForm);
                                        login($connGWP, $user = $login[0], $pass = $login[1]);
                                    }
                                }
                                //var_dump($_SESSION);exit();
                                ?>
                                <?php echo messages(); ?>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input form" type="email" name="felh" id="felh" required />
                                    <label class="mdl-textfield__label" id="felh" for="felh">Felhasználó név...</label>
                                    <span class="mdl-textfield__error">Email címet kell megadni.</span>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input form" type="password" name="pass" id="pass" required />
                                    <label class="mdl-textfield__label" id="pass" for="pass">Jelszó...</label>
                                    <span class="mdl-textfield__error" id="pass">Jelszót kell megadni.</span>
                                </div>
                            </form>
                            <button type="submit" name="submit" value="submit" form="form-log" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Bejelentkezés
                            </button>
                        </div>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="<?php echo FRONTEND; ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Vissza a főoldalra</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="includes/theme/mdl/material.js"></script>
    <!--<script type="text/javascript" src="includes/theme/materialize/js/init.js"></script>-->
</body>
</html>
