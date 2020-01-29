<?php
/**
 * Adatbázis elkészítése
 */
echo "<h1>Adatbázis elkészítése</h1><br/>";
require('modules_settings.php');
// ÜGYFÉL ADATBÁZIS KAPCSOLAT ADATOK
/*define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '12345678');
define('DBNAME', 'rendbejossz_db');
define('DBCONNECTION', 'mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME)');*/
$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
@mysqli_select_db($conn, DBNAME);
@mysqli_set_charset($conn, 'UTF8');
/*mysqli_query($conn,"CREATE TABLE IF NOT EXISTS `cat_content` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `cikkCim` varchar(70) NOT NULL COMMENT 'A cikk címe',
  `cikkLeiras` varchar(255) NOT NULL COMMENT 'A cikk rövid leírása',
  `cikkTartalom` text COMMENT 'A cikk szöveges tartalma',
  `cikkURL` varchar(255) NOT NULL COMMENT 'Keresőbarát url',
  `kiemeltKep` varchar(100) DEFAULT NULL COMMENT 'A kiemelt kép neve.',
  `dobozKep` varchar(100) DEFAULT NULL COMMENT 'A kép közepéből kivágásra kerül egy négyzet alakú kép és ez lesz a doboz kép a szekcióban.',
  `aboutKep` varchar(200) DEFAULT NULL COMMENT 'Rólunk slider képe',
  `sectionID` int(11) NOT NULL DEFAULT '1' COMMENT 'A szekció ID-ja, amihez a cikk tartozik. 0, ha egyik sem, 1: alapértelmezett',
  `kiemeltMainSlider` int(11) NOT NULL DEFAULT '0' COMMENT 'egy: megjelenik a fő sliderben, nulla: ha nem',
  `kiemeltCikk` int(11) DEFAULT '0',
  `cikkSorrend` int(11) NOT NULL,
  `sliderSorrend` int(11) DEFAULT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `timeUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81");*/


// ADATBÁZIS TABLE KIALAKÍTÁS
    if ($conn) {
        /*//settings
        $sql_mode = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\"";
        $time_zone = "time_zone = \"+00:00\"";*/
        //tables
        $cat_content = "CREATE TABLE IF NOT EXISTS `".PREFIX."_content` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `cikkCim` varchar(70) NOT NULL COMMENT 'A cikk címe',
  `cikkLeiras` varchar(255) NOT NULL COMMENT 'A cikk rövid leírása',
  `cikkTartalom` text COMMENT 'A cikk szöveges tartalma',
  `cikkURL` varchar(255) NOT NULL COMMENT 'Keresőbarát url',
  `kiemeltKep` varchar(100) DEFAULT NULL COMMENT 'A kiemelt kép neve.',
  `dobozKep` varchar(100) DEFAULT NULL COMMENT 'A kép közepéből kivágásra kerül egy négyzet alakú kép és ez lesz a doboz kép a szekcióban.',
  `aboutKep` varchar(200) DEFAULT NULL COMMENT 'Rólunk slider képe',
  `sectionID` int(11) NOT NULL DEFAULT '1' COMMENT 'A szekció ID-ja, amihez a cikk tartozik. 0, ha egyik sem, 1: alapértelmezett',
  `kiemeltMainSlider` int(11) NOT NULL DEFAULT '0' COMMENT 'egy: megjelenik a fő sliderben, nulla: ha nem',
  `kiemeltCikk` int(11) DEFAULT '0',
  `cikkSorrend` int(11) NOT NULL,
  `sliderSorrend` int(11) DEFAULT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `timeUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81";
        $cat_content_dummy = "INSERT INTO `".PREFIX."_content` (`ID`, `cikkCim`, `cikkLeiras`, `cikkTartalom`, `cikkURL`, `kiemeltKep`, `dobozKep`, `aboutKep`, `sectionID`, `kiemeltMainSlider`, `kiemeltCikk`, `cikkSorrend`, `sliderSorrend`, `timeCreated`, `timeUpdated`) VALUES
(1, 'Minta blog bejegyzés', 'Ez az alcím', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam velit arcu, iaculis ac urna sit amet, eleifend consectetur enim. Morbi vel pharetra tortor, ut rutrum quam. In non leo et leo porttitor rhoncus eu non nibh. Etiam non urna et eros vestibulum hendrerit vitae quis felis. Vivamus consectetur quis erat sit amet convallis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur fermentum vestibulum leo non hendrerit. Duis viverra fermentum tristique. Vivamus hendrerit nunc ut leo dictum, at tincidunt libero posuere. Integer volutpat consequat nisi, eu posuere massa. Vestibulum eleifend libero sit amet tempor vulputate. Donec quam turpis, commodo in aliquam ac, pulvinar eu tortor. Duis volutpat vel urna non faucibus. Duis lorem mi, tempor at tristique vitae, porttitor id sem. Nullam semper luctus justo, nec lacinia sem sodales sed.</p><p>Praesent a orci eu purus venenatis convallis. Praesent eget urna eget metus hendrerit consectetur. Cras id mauris elementum, auctor urna nec, euismod turpis. Sed rhoncus tortor non erat dapibus, a feugiat turpis euismod. Donec blandit feugiat sapien a eleifend. Curabitur fermentum elit libero, at fermentum erat molestie eu. Nunc vel nisl ac enim venenatis elementum. Fusce luctus cursus sodales. Phasellus posuere elementum purus, vel eleifend nibh mattis sed. Etiam non dui quis ipsum porttitor dictum vitae sit amet risus. Duis et erat quis nibh blandit ultrices. Integer sit amet mattis urna. Nam sollicitudin nisl sed tortor congue fermentum. Nullam vehicula, enim non egestas lacinia, arcu augue mollis arcu, ut condimentum quam mi vitae neque. In et purus vel mauris imperdiet bibendum lobortis quis nibh.</p><p>Nullam nec feugiat tellus. Quisque justo felis, auctor aliquet velit et, vestibulum fringilla nisi. Proin libero orci, ultrices in augue nec, porta ullamcorper mi. Vivamus in nunc ligula. Morbi vel est sed quam finibus gravida eget quis augue. Nulla suscipit lorem id porta ultricies. Sed ac pellentesque nulla, at tempor magna. Fusce facilisis mollis urna, eget sagittis nulla eleifend id. Morbi dignissim ipsum urna, a venenatis lectus mattis vel. Aliquam erat volutpat. Praesent vitae cursus felis. Etiam et diam at ex interdum euismod in sed velit. Aliquam id imperdiet odio. Aenean ultricies tempor maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat tincidunt fringilla.</p>', 'minta-blog-bejegyzes', 'slide_minta-blog-bejegyzes-1503662605.8109.jpg', 'thumb_minta-blog-bejegyzes-1503662593.8958.jpg', NULL, 1, 0, 0, 0, 1, '2017-11-21 13:40:00', '2017-11-21 13:40:00')";
        $cat_ops = "CREATE TABLE IF NOT EXISTS `".PREFIX."_ops` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `timeCreated` datetime DEFAULT NULL,
  `timeUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3";
        $cat_ops_dummy = "INSERT INTO `".PREFIX."_ops` (`ID`, `user`, `pass`, `timeCreated`, `timeUpdated`) VALUES
(2, 'a145dd9fde18643714dbe581ba6313e2', '50d6de83b54dc54a778f235557c438db', '2017-01-01 00:00:00', '2017-01-01 00:00:00')";
        $cat_sections = "CREATE TABLE IF NOT EXISTS `".PREFIX."_sections` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `secCim` varchar(100) NOT NULL COMMENT 'A szekció címe',
  `secAlcim` varchar(100) NOT NULL COMMENT 'A szekció rövid leíára',
  `secURL` varchar(30) NOT NULL,
  `secKep` varchar(100) NOT NULL COMMENT 'A szekció háttérképe',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7";
        $cat_sections_dummy = "INSERT INTO `".PREFIX."_sections` (`ID`, `secCim`, `secAlcim`, `secURL`, `secKep`) VALUES
(1, 'Blog', 'Blog leírás', 'blog', 'blog.png')";
        $cat_seo = "CREATE TABLE IF NOT EXISTS `".PREFIX."_seo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `seoID` int(11) NOT NULL COMMENT 'A seo adatokhoz tartozó ID. 0: főoldal, 1: cikkID, 2 secID',
  `oldalID` int(11) DEFAULT NULL COMMENT 'Az adott cikk vagy szekció ID-ja. 0 nem lehet, mert az a főoldal.',
  `keywords` varchar(255) NOT NULL COMMENT 'kuclsszavak',
  `description` varchar(255) NOT NULL COMMENT 'leírás',
  `robots` varchar(20) NOT NULL DEFAULT 'index, nofollow' COMMENT 'videók: noindex,nofollow, szekciók: index,follow, cikkek: index,nofollow',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87";
        $cat_seo_dummy = "INSERT INTO `".PREFIX."_seo` (`ID`, `seoID`, `oldalID`, `keywords`, `description`, `robots`) VALUES
(1, 0, 0, 'főoldal kulcsszó', 'főoldal leírás', 'index, follow'),
(2, 1, 1, 'kulcsszó', 'leírás', 'index, nofollow'),
(3, 2, 1, 'blog kulcsszó', 'blog leírás', 'index, follow')";
        $cat_settings = "CREATE TABLE IF NOT EXISTS `".PREFIX."_settings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `megnevezes` varchar(100) NOT NULL,
  `adat` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15";
        $cat_dummy = "INSERT INTO `".PREFIX."_settings` (`ID`, `megnevezes`, `adat`) VALUES
(1, 'weboldalNev', 'teljes url'),
(2, 'adminURL', 'teljesurl/operator'),
(3, 'webKulcs', 'hkXhzu472Ő'),
(4, 'weboldalCim', 'a weboldal címe'),
(5, 'googleKod', 'google-tracking-code'),
(6, 'footerBal', 'A weboldalt készítette: <a href=\"https://www.godla.hu\">godla.hu</a>'),
(7, 'footerJobb', '&copy; szöveg'),
(8, '404!', 'A keresett aloldal nem található.<br />Lehet, hogy rossz hivatkozásra kattintottál, de az is lehet, hogy töröltük ezt az aloldalt.<br /><br />Látogass el a főoldalra és kezdd onnan:<br /><a href=\"/\">Főoldal</a>'),
(9, 'salt-user', 'salsamojito'),
(10, 'salt-pass1', 's6y4R1'),
(11, 'salt-pass2', '7aN50l'),
(12, 'footerKozep', 'Design: név'),
(13, 'leírás', 'az oldal leírás'),
(14, 'kulcsszavak', 'kulcsszavak')";
        //sql kérések futtatása
                if (mysqli_query($conn, $cat_sections) or die(mysqli_error($conn))) {
                    echo "&checkmark; Sections tábla létrehozva.<br />";
                    if (mysqli_query($conn,$cat_sections_dummy) or die(mysqli_error($conn))) {
                        echo "&checkmark; Sections tábla alapadatok feltöltve.<br />";
                        if (mysqli_query($conn, $cat_ops) or die(mysqli_error($conn))) {
                            echo "&checkmark; Ops tábla létrehozva.<br />";
                            if (mysqli_query($conn, $cat_ops_dummy) or die(mysqli_error($conn))) {
                                echo "&checkmark; Ops tábla feltöltve alap adatokkal.<br />";
                                if (mysqli_query($conn, $cat_content) or die(mysqli_error($conn))) {
                                    echo "&checkmark; Content tábla létrehozva.<br />";
                                    if (mysqli_query($conn, $cat_content_dummy) or die(mysqli_error($conn))) {
                                        echo "&checkmark; Content tábla létrehozva.<br />";
                                        if (mysqli_query($conn, $cat_seo) or die(mysqli_error($conn))) {
                                            echo "&checkmark; SEO tábla létrehozva.<br />";
                                            if (mysqli_query($conn, $cat_seo_dummy) or die(mysqli_error($conn))) {
                                                echo "&checkmark; SEO tábla adatokkal feltöltve.<br />";
                                                if (mysqli_query($conn, $cat_settings) or die(mysqli_error($conn))) {
                                                    echo "&checkmark; Settings tábla létrehozva.<br />";
                                                    if (mysqli_query($conn, $cat_dummy) or die(mysqli_error($conn))) {
                                                        echo "&checkmark; Alap adatok feltöltve a Settings táblába.<br />";
                                                        echo "<h1 style='color: darkgreen'>A CategoryCMS használatra kész :)</h1><br />";
                                                    } else {
                                                        echo "! Hiba a settings tábla adatok feltöltésekor.<br/>";
                                                    }
                                                } else {
                                                    echo "! Hiba a settings tábla létrehozásakor.<br/>";
                                                }
                                            } else {
                                                echo "! Hiba a seo tábla dummy adatok feltöltésekor.<br/>";
                                            }
                                        } else {
                                            echo "! Hiba a seo tábla létrehozásakor.<br/>";
                                        }
                                    } else {
                                        echo "! Hiba a content tábla létrehozásakor.<br/>";
                                    }
                                } else {
                                    echo "! Hiba a content tábla dummy adatok feltöltésekor.<br/>";
                                }
                            } else {
                                echo "! Hiba az ops tábla dummy adatok feltöltésekor.<br/>";
                            }
                        } else {
                            echo "! Hiba az ops tábla létrehozásakor.<br/>";
                        }
                    } else {
                        "! Hiba a sections tábla adatok feltöltésekor.<br />";
                    }
                } else{
                    echo "! Hiba a sections tábla létrehozásakor.<br />";
                }
            } else {
        echo "Catlkozás nem sikerült.";
    }