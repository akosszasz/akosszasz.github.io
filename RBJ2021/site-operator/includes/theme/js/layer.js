/**
 * Created by Godla Imre on 2017. 04. 20.
 * All rights reserved to Godla Imre.
 */
$(document).ready(run);

function run(){
    $("#tartalom").css({
        "z-index":1
    });
	$("#tartalom").before('<div id="layer">');
	$("#layer").css({
		"position":"absolute",
		"width":$("#tartalom").css("width"),
		"height":2*$("#szerkeszt2").innerHeight(),
		"z-index":$("#tartalom").css("z-index")+100
	});
	$("#layer").click(layerHide);
	function layerHide(){
		$(this).hide();
	}
	$("body").not("#layer").mousemove(layerShow);
	function layerShow(){
		$("#layer").show();
	}
}