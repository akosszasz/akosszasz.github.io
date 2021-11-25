<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 02. 22.
 * Time: 11:39
 */
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
    <!-- FAVICON -->
    <?php echo $favicon; ?>

    <meta name="msapplication-TileColor" content="#ffffff">
    <!-- STYLE -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <!--link rel="stylesheet" href="includes/theme/materialize/css/materialize.css" type="text/css" media="screen,projection"/-->
    <link rel="stylesheet" href="includes/theme/mdl/material.css" type="text/css" media="screen,projection"/>
    <link rel="stylesheet" href="includes/theme/custom.css" type="text/css"/>
    <style>
        .loader {
            border: 12px solid #34a853;
            border-radius: 50%;
            border-top: 12px solid #4285f4;
            border-right: 12px solid #ea4335;
            border-bottom: 12px solid #fbbc05;
            width: 50px;
            height: 50px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            position: absolute;
            z-index: 1001;
            top: 100px;
            box-shadow: 0 0 100px #fff;
            background-color: rgba(255,255,255,0.3)
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

    <!-- SZERKESZTŐ -->
    <script type="text/javascript" src="includes/site-elements/tinymce/js/tinymce/tinymce.min.js"></script>
    <!--script type="text/javascript" src="includes/site-elements/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script-->
    <!--script src='//cloud.tinymce.com/stable/tinymce.min.js'></script-->
    <!-- TINY MCE SZERKESZTŐ BEÁLLÍTÁSOK -->
    <script>
        document.addEventListener('mdl-componentupgraded', function(e){
            //In case other element are upgraded before the layout
            if (typeof e.target.MaterialLayout !== 'undefined') {
                //Bevezető szöveg szerkesztő
                tinymce.init({
                    selector: '#szerkeszt1',
                    theme: "modern",
                    skin: "lightgray",
                    entity_encoding : "raw",
                    forced_root_block: false,
                    plugins: [
                        'advlist lists charmap preview code wordcount'//list
                    ],
                    toolbar: [
                        'advlist lists charmap preview code wordcount'//list
                    ],
                    menubar: false
                });
                //Tartalom szerkesztő
                tinymce.init({
                    selector: '#szerkeszt2',
                    theme: "modern",
                    skin: "lightgray",
                    forced_root_block: false,
                    //forced_root_block: 'p',
                    //force_p_newlines: true,
                    //force_br_newlines: false,
                    //remove_trailing_brs: true,
                    //remove_linebreaks : true,
                    //valid_elements: '-p',
                    //valid_elements: 'h3,br,img[class|id|src|alt|width|height|size|title]',
                    /*forced_root_block: '',
                     force_br_newlines: true,
                     force_p_newlines: false,*/
                    //invalid_elements: 'br',
                    extended_valid_elements: 'i[class|area-hidden],-p,p[*]',
                    entity_encoding : "raw",
                    plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                        'searchreplace wordcount visualblocks visualchars code',
                        'insertdatetime media nonbreaking save table contextmenu directionality',
                        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc responsivefilemanager'
                    ],
                    //image_prepend_url: "http://localhost/salsamojito.hu/site-operator/uploads/singles-img/",
                    /*toolbar: [
                     'advlist list preview charmap code hr image',
                     'wordcount'
                     ]*/
                    toolbar1: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent link unlink anchor code',
                    toolbar2: 'image media responsivefilemanager',
                    templates: [
                        {title: 'Idézet', description: 'Idézet', content: '<p class="idezet"><span class="sign">&#8216&#8216</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>'},
                    ],
                    //block_formats: 'Span=span',
                    formats: {
                        alignleft: {selector: 'span,em,i,b,strong', inline: 'span', block: 'span', styles: {display: 'block', 'text-align':'left'}},
                        aligncenter: {selector: 'span,em,i,b,strong', inline: 'span', block: 'span', styles: {display: 'block', 'text-align':'center'}},
                        alignright: {selector: 'span,em,i,b,strong', inline: 'span', block: 'span', styles: {display: 'block', 'text-align':'right'}},
                        alignfull: {selector: 'span,em,i,b,strong', inline: 'span', block: 'span', styles: {display: 'block', 'text-align':'full'}},
                        custom_format: {selector : 'a', styles : {fontSize : 'inherit','font-family':'\'Helvetica Neue\', Helvetica, Arial, sans-serif'}}
                    },
                    //képekhez használható css class-ok
                    image_class_list:[
                        {title: "Nincs", value: ''},
                        {title: "Jobbra zárt", value: 'right img-responsive'},
                        {title: "Jobbra zárt margóval", value: 'right-margin img-responsive'},
                        {title: "Balra zárt", value: 'left img-responsive'},
                        {title: "Balra zárt margóval", value: 'left-margin img-responsive'},
                        {title: "Középre zárt széles", value: 'szeles img-responsive'},
                        {title: "Középre zárt", value: 'center img-responsive'}
                    ],
                    //képfeltöltés
                    image_caption: true,
                    image_advtab: true,
                    relative_urls: false,//localhost miatt true
                    filemanager_crossdomain: true,
                    external_filemanager_path:"<?php echo FRONTEND; ?>/site-operator/includes/filemanager/",
                    filemanager_title:"Média kezelő" ,
                    external_plugins: { "filemanager" : "<?php echo FRONTEND; ?>/site-operator/includes/filemanager/plugin.min.js"},
                    //"http://localhost/salsamojito.hu/site-operator/includes/site-elements/tinymce/js/tinymce/plugins/filemanager/plugin.min.js"
                    visualblocks_default_state: false,
                    style_formats_autohide: true,
                    style_formats_merge: false,
                    /*file_picker_callback: function(callback, value, meta) {
                     if (meta.filetype == 'image') {
                     $('#upload').trigger('click');
                     $('#upload').on('change', function () {
                     var file = this.files[0];
                     var reader = new FileReader();
                     reader.onload = function (e) {
                     callback(e.target.result, {
                     alt: ''
                     });
                     };
                     reader.readAsDataURL(file);
                     });
                     }
                     }*/
                });
                //responsinvefilemanager
                /*tinymce.init({
                 selector: "mas",theme: "modern",width: 680,height: 300,
                 plugins: [
                 "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                 "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                 "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                 ],
                 toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                 toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                 image_advtab: true ,

                 external_filemanager_path:"http://localhost/salsamojito.hu/site-operator/includes/filemanager",
                 filemanager_title:"Responsive Filemanager" ,
                 external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
                 });*/
            }
        });
    </script>
</head>
<body class="mdl-color--primary">
<div class="loader"></div>
<!-- LOADER -->
<script src="includes/theme/js/jquery-3.2.1.min.js"></script>
<script src="includes/theme/js/loader.js"></script>
<!-- IMAGE CROPPER -->
<!--<link  href="includes/cropperjs/cropper.css" rel="stylesheet">
<script src="includes/cropperjs/cropper.js"></script>-->
<script src="includes/jcrop/js/jquery.Jcrop.min.js"></script>
<!--<script src="includes/jcrop/js/jquery.color.js"></script>-->
<link  href="includes/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <main class="mdl-layout__content">