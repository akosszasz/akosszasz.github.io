var updateCoords = function(c) {
	$('#x').val(c.x);
	$('#y').val(c.y);
	$('#x2').val(c.x2);
	$('#y2').val(c.y2);
	$('#w').val(c.w);
	$('#h').val(c.h);
	return true;
};

$(document).ready(function() {
	$(".ckeditor").each(function(){
		if(!$(this).attr("id").length){
			return false;
		}

		CKEDITOR.on( 'instanceCreated', function( event ) {
			var editor = event.editor,
				element = editor.element;
			if (element.data( 'basictoolbar' ) == 'true' ) {
				editor.on( 'configLoaded', function() {
					editor.config.removePlugins = 'colorbutton,find,flash,font,forms,iframe,image,newpage,removeformat,smiley,specialchar,stylescombo,templates';
					editor.config.toolbarGroups = [
						{ name: 'editing',		groups: [ 'basicstyles', 'links' ] },
						{ name: 'undo' },
						{ name: 'clipboard',	groups: [ 'selection', 'clipboard' ] },
						{ name: 'about' }
					];
				});
			}
		});
		CKEDITOR.replace($(this).attr("id"), $(this).data());
	});

	$('.confirm').click(function() {
		return confirm("Biztos benne?");
	});

	$(".datepicker").datepicker({
		dateFormat: 'yy-mm-dd',
		nextText: 'Következő',
		prevText: 'Előző',
		currentText: 'Ma',
		firstDay: 1,
		dayNames: ['Vasárnap', 'Hétfő', 'Kedd', 'Szerda', 'Csütörtök', 'Péntek', 'Szombat'],
		dayNamesShort: ['Vas','Hét', 'Kedd', 'Szer', 'Csüt', 'Pén', 'Szom'],
		dayNamesMin: ['Va', 'Hé', 'Ke', 'Sze', 'Cs', 'Pé', 'Szo' ],
		monthNames: ['Január','Február','Március','Április','Május','Június','Július','Augusztus','Szeptember','Október','November','December'],
	 });

	$('.datetimepicker').datetimepicker({
		dateFormat: 'yy-mm-dd',
		nextText: 'Következő',
		prevText: 'Előző',
		currentText: 'Ma',
		firstDay: 1,
		dayNames: ['Vasárnap', 'Hétfő', 'Kedd', 'Szerda', 'Csütörtök', 'Péntek', 'Szombat'],
		dayNamesShort: ['Vas','Hét', 'Kedd', 'Szer', 'Csüt', 'Pén', 'Szom'],
		dayNamesMin: ['Va', 'Hé', 'Ke', 'Sze', 'Cs', 'Pé', 'Szo' ],
		monthNames: ['Január','Február','Március','Április','Május','Június','Július','Augusztus','Szeptember','Október','November','December'],
		language: 'hu',
		weekStart: 1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 0,
		maxView: 4,
		format: 'yyyy-mm-dd hh:ii'
	});

	$('.kephiba').hide();
	$('.kepfeltoltes').each(function(index) {
		var disz = $(this);
		var felt_div = this;
		var error_div = $(this).attr('data-error');
		var jcrop = parseFloat($(this).attr('data-jcrop'));
		var crop_id = $(this).attr('data-jcrop-id');
		if (crop_id == undefined) {
			crop_id = '';
		}
		$('#'+error_div).html('');
		$('#'+error_div).hide();
	  	var uploader = new qq.FileUploader({
			// pass the dom node (ex. $(selector)[0] for jQuery users)
			element: felt_div,
			// path to server-side upload script
			action: $(this).attr('data-action'),
			debug: true,
			allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
			//multiple : $(this).attr('data-multiple')=='true',
			multiple : false,
			drag: '',
			onComplete: function(id, fileName, responseJSON){
					if(responseJSON.hiba !== undefined && responseJSON.hiba != ''){
						alert ('error');
						$('#'+error_div).html(responseJSON.hiba);
						$('#'+error_div).show();
					}
					else {
						id_upd = $(felt_div).attr("data-input-update");
						$('#'+id_upd).val(responseJSON.filename);
						$('#'+id_upd+'_kep').attr("src",responseJSON.path+responseJSON.filename+"?r="+Math.random()).show();
					}
					if(jcrop >= 0 && responseJSON.hiba == ''){
						//$('#'+id_upd+'_kep').css('width',responseJSON.width+'px').css('height',responseJSON.height+'px');
						$('.kepfeltoltes').css('display','none');
						disz.css('display','block');
						$('#x').val(0);
						$('#y').val(0);
						$('#x2').val(responseJSON.width);
						$('#y2').val(responseJSON.height);
						$('#elozo_kep'+crop_id).removeAttr('disabled');
						id_upd = $(felt_div).attr("data-input-update");
						options = {
							boxWidth: 600,
							trueSize: [responseJSON.width,responseJSON.height],
							onChange: updateCoords,
							onSelect: updateCoords,
							setSelect: [$('#x').val(),
										$('#y').val(),
										$('#x2').val(),
										$('#y2').val()]
						};
						if (jcrop !== 0) {
							options.aspectRatio = jcrop;
						}
						$('#'+id_upd+'_kep').Jcrop(options);
					}
			},
			template: '<div class="qq-uploader">' +
					'<div class="qq-upload-drop-area"><span>Dobd ide a fájlokat a feltöltéshez!</span></div>' +
					'<div class="qq-upload-button">Fájl feltöltése</div>' +
					'<ul class="qq-upload-list"></ul>' +
				 '</div>',

			// template for one item in file list
			fileTemplate: '<li>' +
					'<span class="qq-upload-file"></span>' +
					'<span class="qq-upload-spinner"></span>' +
					'<span class="qq-upload-size"></span>' +
					'<a class="qq-upload-cancel" href="#">mégsem</a>' +
					'<span class="qq-upload-failed-text">sikertelen</span>' +
				'</li>'

		});
	});

	/*--- Több kép feltöltése: */
		$('.tobbkepfeltoltes').each(function(index) {
		var felt_div = this;
		var error_div = $(this).attr('data-error');
		var feltoltesutan = $(this).attr('data-update');
		$('#'+error_div).html('');
	  	var uploader = new qq.FileUploader({
			// pass the dom node (ex. $(selector)[0] for jQuery users)
			element: felt_div,
			// path to server-side upload script
			action: $(this).attr('data-action'),
			debug: true,
			allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
			multiple : true,

			onAllComplete: function(id, fileName, responseJSON){
				window.location = feltoltesutan;
			},

			template: '<div class="qq-uploader">' +
					'<div class="qq-upload-drop-area"><span>Drop files here to upload!</span></div>' +
					'<div class="qq-upload-button">Feltöltés</div>' +
					'<ul class="qq-upload-list"></ul>' +
				 '</div>',

			// template for one item in file list
			fileTemplate: '<li>' +
					'<span class="qq-upload-file"></span>' +
					'<span class="qq-upload-spinner"></span>' +
					'<span class="qq-upload-size"></span>' +
					'<a class="qq-upload-cancel" href="#">cancel</a>' +
					'<span class="qq-upload-failed-text">failed</span>' +
				'</li>'

		});
	});

	/*--- Több file feltöltése: */
		$('.tobbfilefeltoltes').each(function(index) {
		var felt_div = this;
		var error_div = $(this).attr('data-error');
		var feltoltesutan = $(this).attr('data-update');
		$('#'+error_div).html('');
	  	var uploader = new qq.FileUploader({
			// pass the dom node (ex. $(selector)[0] for jQuery users)
			element: felt_div,
			// path to server-side upload script
			action: $(this).attr('data-action'),
			debug: true,
			//allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
			multiple : true,

			onAllComplete: function(id, fileName, responseJSON){
				//window.location = feltoltesutan;
			},

			template: '<div class="qq-uploader">' +
					'<div class="qq-upload-drop-area"><span>Drop files here to upload!</span></div>' +
					'<div class="qq-upload-button">Upload file</div>' +
					'<ul class="qq-upload-list"></ul>' +
				 '</div>',

			// template for one item in file list
			fileTemplate: '<li>' +
					'<span class="qq-upload-file"></span>' +
					'<span class="qq-upload-spinner"></span>' +
					'<span class="qq-upload-size"></span>' +
					'<a class="qq-upload-cancel" href="#">cancel</a>' +
					'<span class="qq-upload-failed-text">failed</span>' +
				'</li>'

		});
	});

	$('.multicrop').load(function() {
		var $kep = $(this);

		var name = $kep.data("name");
		if (!name) { name = "kivagasok"; }

		var $input = $('<input type="hidden" name="'+ name +'['+$kep.data("crop-ar")+']">');
		$kep.parent().append($input);
		$kep.Jcrop({
			trueSize: [$kep.get(0).naturalWidth,$kep.get(0).naturalHeight],
			keySupport: false,
			aspectRatio: $kep.data("crop-ar"),
			onChange: function(c) {
				$input.val(JSON.stringify(c));
			},
			onSelect: function(c) {
				$input.val(JSON.stringify(c));
			},
			setSelect: [$kep.data("selection").x,$kep.data("selection").y,$kep.data("selection").x2,$kep.data("selection").y2],
			boxWidth: $kep.width()
		});
	});

	$('.rejcrop').each(function(index) {
		$(this).Jcrop({
			aspectRatio: $(".kep-feltoltes").data("jcrop"),
			boxWidth: 700,
			onChange: updateCoords[1],
			onSelect: updateCoords[1],
			setSelect: [$('#x').val(),$('#y').val(),$('#x2').val(),$('#y2').val()]
		});
	});

	//$('.rendezheto').disableSelection();
	$('.rendezheto tbody.rendez, ul.rendezheto').sortable({
		items : '> tr, >li',
		placeholder: 'ui-state-highlight egykep',
		update: function(event, ui){
			$.post(
				$(this).attr('data-action'),
				{sorrend: $(this).sortable('serialize')},
				function(data){
					if(data != ''){
						alert(data);
					}
				}
			);
		}
	});

	$('.menuk ul').each(function(index) {
		$(this).sortable({
			items: '>li',
			placeholder: 'ui-state-highlight',
			update: function(event, ui) {
				$.post("/admin/menu/sorrendallitas", {
					data: $(this).sortable('serialize'),
					parent_id: $(this).attr("data-parent")
				});
			}
		});
		$(this).disableSelection();
	});


	var checkmaxlength = function() {
		var len = $(this).val().length;
		var mc = $(this).attr("maxlength");

		if (mc<1) {
		    mc = $(this).attr("data-maxlength");
		};

		if (len > mc) {
		    $(this).val($(this).val().substring(0,mc))
		    len = mc;
		}
		$(this).siblings("label[for="+$(this).attr("id")+"]").find("span").text(len);
	}

	$('.maxlength').on('keypress', checkmaxlength );
	$('.maxlength').on('keyup', checkmaxlength );
	$('.maxlength').on('blur', checkmaxlength );

	$('.tooltipes a').tooltip({
		placement: 'top'
	});
	
	
	$('.tags').tagsinput({
		typeahead: {
			source: function(query) {
				return $.get('/admin/cimkek/tagsinput', {query: query});
			}
		},
		minLength: 2,
		itemValue: "id",
		itemText: "text",
		freeInput: true,
		tagClass: "class",
		freeElementSelector: "#ujcimkek"
	});

	// meglévő cimkék feltöltése az inputból
	if ($("#cimkek").length) {
		var meglevo_cimkek = JSON.parse($("#cimkek").val());
		$.each(meglevo_cimkek, function(index, value) {
				$('#cimkek').tagsinput('add', value);
		});
	}

	if($(".bootstrap-tagsinput").length){
		$("form").on("submit", function(e){
			var $input = $(this).find(".bootstrap-tagsinput input[type=text]");
			var $ujak = $(this).find("input[name=ujcimkek]");
			
			if($input.length && $ujak.length){
				$ujak.val($input.val());
			}
			
			return true;
		});
	}

	var $form_slider = $("form.slider");

	if($form_slider.length){
		$form_slider.on("change", "#program_id,#hir_id", function(e){
			console.log(e);
			
			var reset_id = "hir_id";
			if(e.target.id == "hir_id") var reset_id = "program_id";
			
			$form_slider.find("#"+reset_id).val(0);
		});
	}

	$video_form = $(".video-form");
	if($video_form.length){
		$video_form.find("#archivum_ev_id").on("change", function(){
			$.ajax($(this).data("action"),{
				//dataType: "json",
				data: {
					ev: $(this).val()
				},
				method: "POST",
				success: function(resp){
					console.log(resp)

					$("#archivum_szinpad_id").replaceWith(resp);
				}
			});
		});
	}
});
