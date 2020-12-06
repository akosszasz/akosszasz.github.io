$(function(){
	$('a.level').each(function (i, o) {
		var c = $(o).html().replace('kukac', String.fromCharCode(64));
		c = c.replace(RegExp(/pont/g), String.fromCharCode(46));
		$(o).attr('href', 'mai' + 'lt' + 'o:' + c).html(c);
	});

	$(".header-nav-toggle").on("click", function (e) {
		e.preventDefault();
		if (!$(e.target).is(":visible")) return;
		$(".header-nav, .header-nav-toggle").toggleClass("open");
	});

	var header_bg_fade = function(){
		var $active = $('.header-bg-img.active');
		var $next = $active.next();
		if(!$next.length){
			$next = $('.header-bg-img').eq(0);
		}

		$active.removeClass('active');
		$next.addClass('active');
		window.setTimeout(header_bg_fade, 4000);
	};

	window.setTimeout(header_bg_fade, 4000);

	if($(window).width()>991) {
		$('.fooldal-nemzene').parallaxie({
			'speed': 0.4,
			'size': 'auto',
			'offset': -150
		});

		$('.fooldal-gasztro').parallaxie({
			'speed': 0.4,
			'size': 'auto',
			'offset': -100
		});

		if(!$('body.fooklub').length) {
			$('.footer').parallaxie({
				'speed': 0.4,
				'size': 'auto',
				'offset': 100
			});
		}

		$('.header').parallaxie({
			'speed': 0.4,
			'size': 'auto',
			'offset': -250
		});
	}

	/*
	if($(window).width()<=991) {
		console.log('E')
		$(".programtabla").tableHeadFixer({"head" : false, "left" : 1});
	}
	*/

	new WOW().init();

	if($(window).width()>=1260 && $(".lista-grid").length) {
		function resizeGridItem(item) {
			//grid = document.getElementsByClassName("lista-grid")[0];
			grid = $(".lista-grid")[0];
			rowHeight = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-auto-rows'));
			rowGap = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-row-gap'));
			rowSpan = Math.ceil((item.querySelector('.listaelem-content').getBoundingClientRect().height + rowGap) / (rowHeight + rowGap));
			item.style.gridRowEnd = "span " + rowSpan;
		}

		function resizeAllGridItems() {
			$(".listaelem").each(function(){
				resizeGridItem(this);
			});
		}

		function resizeInstance(instance) {
			item = instance.elements[0];
			resizeGridItem(item);
		}

		if (window.innerWidth > 991) {
			$(".lista-grid").imagesLoaded().done(function( instance ) {
				resizeAllGridItems();
				$(".lista-grid").addClass('loaded');
				window.addEventListener("resize", resizeAllGridItems);
			});
		}

		allItems = document.getElementsByClassName("item");
		for (x = 0; x < allItems.length; x++) {
			imagesLoaded(allItems[x], resizeInstance);
		}
	}


	// archivum //

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

	if($('.stage').length){
    	$('.stage').find('tr').find('td').on('click', function(e){

	    	var cellindex = e.target.cellIndex - 1;
	    	var cell = $(this).parent().next('.programtabla-youtube').find('td:eq('+cellindex+')');

	    	if($.trim(cell.html()).length == 11){

	    		yt = $(this).parent().next('.programtabla-youtube').find('td:eq('+cellindex+')').html();
	    		text = $(this).parent().next().next('.programtabla-leiras').find('td:eq('+cellindex+')').html();

	    		$('.fellepo-popup').find('.iframe').html('<iframe width="560" height="315" src="https://www.youtube.com/embed/'+yt+'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
	    		$('.fellepo-popup').css({opacity:1,height:"100%",width:"100%"});
	    		$('.fellepo-popup').find('p').html(text);
	    	}
	    });

	    $('.stg').find('tr').find('td:nth-child(2)').on('click', function(e){

	    	var cellindex = e.target.cellIndex - 1;
	    	var cell = $(this).parent().next('.programtabla-leiras').find('td:nth-child(2)');

	    	if($.trim(cell.html()).length == 11){

	    		yt = $(this).parent().next('.programtabla-leiras').find('td:nth-child(2)').html();
	    		text = $(this).parent().next().next('.programtabla-youtube').find('td:nth-child(2)').html();

	    		$('.fellepo-popup').find('.iframe').html('<iframe width="560" height="315" src="https://www.youtube.com/embed/'+yt+'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
	    		$('.fellepo-popup').css({opacity:1,height:"100%",width:"100%"});
	    		$('.fellepo-popup').find('p').html(text);
	    	}
	    });

	    $('.close-popup').on('click', function(e){
	    	e.preventDefault();
	    	$('.fellepo-popup').css({opacity:0,height:0,width:0});
	    	$('.fellepo-popup').find('.iframe').html('');
	    });



	    $(document).keyup(function(e) {
			if (e.key === "Escape" || e.keyCode === 27){
				$('.fellepo-popup').css({opacity:0,height:0,width:0});
	    		$('.fellepo-popup').find('.iframe').html('');
			}
		});
    }

    $('.header-menu').find('li:nth-child(5)').css({opacity: 0.4});
    $('.jegyek').find('.nav-tabs').find('li:nth-child(2)').css({opacity: 0.4});
    $('.info').find('.nav-tabs').find('li:nth-child(4)').css({opacity: 0.4});

	$('.header-menu').find('li:nth-child(5)').on('click', function(e){
		e.preventDefault();
	});

	$('.jegyek').find('.nav-tabs').find('li:nth-child(2)').on('click', function(e){
		e.preventDefault();
	});

	$('.info').find('.nav-tabs').find('li:nth-child(4)').on('click', function(e){
		e.preventDefault();
	});
	
	$('.off-programok').find('.nav-tabs li').each(function(){
        if(!$(this).hasClass('active')){
            $(this).find('a').removeAttr('href');
            $(this).css({'opacity':0.4}); 
        } 
    });
});

var options = {      
  	history: false,
  	focus: false,
  	escKey: false,
  	closeOnScroll: false,
  	pinchToClose: false,
  	closeOnVerticalDrag: false,
  	fullscreenEl: false,
  	shareEl: false,
  	clickToCloseNonZoomable: false,
  	tapToClose: false,
    showAnimationDuration: 0,
    hideAnimationDuration: 0,
    closeElClasses: [], 
    
};

var openPhotoSwipe1 = function() {
    var pswpElement = document.querySelectorAll('.pswp')[0];

    var items = [
    	{
            src: '/userfiles/foo2020_kep1.jpg',
            w: 3840,
            h: 2160
        }
    ];
    
    var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
    gallery.init();
};

var openPhotoSwipe2 = function() {
    var pswpElement = document.querySelectorAll('.pswp')[0];

    var items = [
    	{
            src: '/userfiles/foo2020_kep2.jpg',
            w: 3840,
            h: 2160
        }
    ];

    var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
    gallery.init();
};

var openPhotoSwipe3 = function() {
    var pswpElement = document.querySelectorAll('.pswp')[0];

    var items = [
    	{
            src: '/userfiles/foo2020_kep3.jpg',
            w: 3840,
            h: 2160
        }
    ];
    
    var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
    gallery.init();
};