jQuery(function(){
	new WOW().init({
		mobile: false
	});

	$('.info a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		$($(e.target).attr("href")).nanoScroller(nano_options);
	});

	$(".videok .dropdown-menu").on("click", ">li>a", function(e){
		e.preventDefault();

		$("#selected-video-name").html($(this).html());
		$("#selected-video-embed").attr("src", "https://www.youtube.com/embed/"+$(this).data("youtube_id"));
	});

	$(document).on("click", ".megtobbhir", function(e){
		e.preventDefault();

		var $this = $(this);
		var $loader = $(".loader").clone().removeClass("hidden");
		$this.replaceWith($loader);

		$.ajax({
			url: $this.attr("href"),
			success: function(resp) {
				$(".hirlista-index").find(".loader").remove();
				$(".hirlista-index").append(resp);
			}
		});
	});

	if($(".navbar-toggle").is(":visible")){
		$("#navbar-fomenu").on("click", ".navbar-nav>li>a", function(e){
			$(".navbar-toggle").trigger("click");
		});
	}

	$(".modal").on("loaded.bs.modal", function(e){
		$(".table").each(function(){
			var fixedColumn = $(this).data("fixed-column");

			if(fixedColumn){
				$(this).find("tr>:nth-child("+fixedColumn+")").addClass("fixed-column");
			}
		});

		$(".table-responsive").on("scroll", function(e){
			var $table = $(this).find(".table"),
				fixedColumn = $table.data("fixed-column"),
				elottelevok = 0,
				scrollLeft = $(this).scrollLeft();

			$table.find("tbody>tr:first-child>.fixed-column").prevAll().each(function(){
				elottelevok+= $(this).width() + parseInt($(this).css("padding-left")) + parseInt($(this).css("padding-right")) +
						parseInt($(this).css("border-left-width")) + parseInt($(this).css("border-right-width"));
			});

			$table.find(".fixed-column").css("left", scrollLeft>elottelevok ? (scrollLeft - elottelevok - (fixedColumn>1?2:0)) : 0);
		});
	});

	$(".archivum").on("click", ".video-close", function(){
		var $video = $(this).parents(".archivum-video");
		$video.removeClass("fullwidth");
		$video.find(".youtube-player-embed").remove();
	});

	$(".archivum").on("click", ".archivum-video", function(e){
		if(!$(e.target).parent().hasClass("video-close") && !$(this).hasClass("fullwidth")) {
			$(this).addClass("fullwidth");
		}
	});

	$(".archivum-kereses-form").on("submit", function(e){
		e.preventDefault();
	});

	$(".archivum-kereses-input").focus();

	$(".archivum-kereses-input").on("keyup", function(){
		var $input = $(this),
			term = $input.val();

		if(term.length<3) return;

		var	$loadingSpinner = $("#archivum_kereses_loading"),
			$resultContainer = $("#archivum_search_results");

		$.ajax({
			url: $input.data("url"),
			data: {
				keres: term
			},
			beforeSend: function(){
				$loadingSpinner.show(100);
			},
			success: function(xhr, status){
				if(status=="success"){
					$resultContainer.html(xhr);
					$loadingSpinner.hide(100);
					initPlayers();
				}
			}
		})
	});

	$("#archivum_search_results").on("click", ".archivum-kereses-bezar", function(){
		$("#archivum_search_results").html('');
		$(".archivum-kereses-input").val('');
	});

	$(".archivum-ev-linkek").on("click", "a", function(e){
		e.preventDefault();
		var target = $(this).attr("href");

		window.history.pushState({}, document.title, target);

		$('html, body').animate({
			scrollTop: $(target).offset().top
		}, 300);
	});
});