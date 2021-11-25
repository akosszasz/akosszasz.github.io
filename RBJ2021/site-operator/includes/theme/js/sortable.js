/**
 * Created by Godla Imre on 2017. 04. 25..
 */
/**
 * A cikkek megjelenési sorrendjét változtatja meg. Drag-and-Drop működési elvű.
 */
//KATEGÓRIÁN BELÜLI CIKKEK SORRENDJE
$(document).ready(function () {
    $('main.mdl-layout__content').css({
        "overflow-x":"visible",
        "overflow-y":"visible"
    });
    //$('.drag-n-drop div').mouseover().css('cursor','move');
    $('.drag-n-drop').sortable({
        axis: 'xy',
        scroll: true,
        opacity: 0.7,
        containment: "parent",
        //items: ".mdl-cell--4-col",
        tolerance: "pointer",
        cursor: "move",
        stop: function (event, ui) {
            var data = $(this).sortable('serialize',{key: 'sort'});
            //$('h1').html(data);
            //$(this).disableSelection();

            //Sorrend rögzítése
            //$('span').text(data);
            //alert("ok");
            /*$.ajax({
                data: data,
                type: "POST",
                url: 'includes/site-elements/ajax/make-new-order.php',
                success: function () {
                    alert("Sikeres volt.");
                },
                error: function () {
                    alert("Nem volt sikeres.")
                }
            });*/
            $.post("includes/site-elements/ajax/make-new-order.php", {newSort: data});
            // $.post("includes/site-elements/ajax/make-new-order.php", {newSort: data}, function(result){
            //     $("h1").prepend('<pre>').html(result);
            // });
        }
    });
});
//SLIDER CIKK SORREND
$(document).ready(function () {
    //$('.sliderorder div').mouseover().css('cursor','move');
    $('.sliderorder').sortable({
        axis: 'xy',
        cursor: "move",
        opacity: 0.7,
        stop: function (event, ui) {
            var data = $(this).sortable('serialize',{key: 'slider'});
            //$('h1').html(data);
            //$(this).disableSelection();

            //Sorrend rögzítése
            //$('span').text(data);
            //alert("ok");
            /*$.ajax({
             data: data,
             type: "POST",
             url: 'includes/site-elements/ajax/make-new-order.php',
             success: function () {
             alert("Sikeres volt.");
             },
             error: function () {
             alert("Nem volt sikeres.")
             }
             });*/
            $.post("includes/site-elements/ajax/make-new-order.php", {newSortSlider: data});
            // $.post("includes/site-elements/ajax/make-new-order.php", {newSort: data}, function(result){
            //     $("h1").prepend('<pre>').html(result);
            // });
        }
    });
});