/**
 * Created by Godla Imre on 2017. 04. 14.
 * All rights reserved to Godla Imre.
 */
//Kattintási lehetőség kikapcsolása, ha admin aloldalon vagyunk.
var index = window.location.href.indexOf("?")+1;
//1. megoldás: nem betöltődni kattintás után.
//elegáns megoldás, de material.js console hibát generál
if(index != 0){
    $("a.mdl-layout__tab").not($("a.mdl-layout__tab.is-active")).attr("href",null);
    //de így is lehet
    /*
    $("section.hide").html('');
    $("section.mdl-layout__tab-panel").attr("id","fixed-tab-1").attr("class","mdl-layout__tab-panel.is-active");
    */
}
//2. megoldás
//Nem elegáns megoldás, de nem generál hibát.
/*if(index != 0) {
 var height = $(window).innerHeight() - 2 * parseInt($("footer").innerHeight());
 console.log(height);
 $("section.hide div.page-content").hide();
 $("section.hide").css("height",height).html('<div class="page-content"><div class="mdl-grid"><h1 class="mdl-typography--title" style="color:#fff">A beállítások ebben a nézetben nem elérhetők.</h1></div></div>');
 }*/