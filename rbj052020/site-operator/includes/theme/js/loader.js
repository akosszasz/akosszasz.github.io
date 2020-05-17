/**
 * All rights reserved to Imre Godla
 * This file or any element of this file is not allowed to copy or modify.
 */
var width = parseInt($(".loader").css("width"));
$(".loader").show().css("left",($(document).innerWidth()/2) - width +"px");

$(document).ready(run);
function run(){
    var time = 700;
    setTimeout(function(){$(".loader").hide()},time);
};