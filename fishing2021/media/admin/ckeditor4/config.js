/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	config.toolbar =
	[
	    ['Source','Cut','Copy','Paste','PasteText','PasteFromWord'],
	    ['Find','Replace','-','SelectAll','RemoveFormat'],
	    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
	    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
	    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	    ['BidiLtr', 'BidiRtl' ],
	    ['Image','Flash','Table','HorizontalRule','SpecialChar','PageBreak','Iframe'],
	    ['Link','Unlink','Anchor'],
	    ['Styles','Format','Font','FontSize'],
	    ['TextColor','ShowBlocks']
	];

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = '';

	config.ckroot = document.getElementsByTagName("body")[0].dataset.ckroot;

	config.contentsCss =  [
		config.ckroot+'/media/css/bootstrap.css?'+String(parseInt(Math.random()*1000000)),
		config.ckroot+'/media/css/style.css?'+String(parseInt(Math.random()*1000000)),
		config.ckroot+'/media/admin/css/ck.css?'+String(parseInt(Math.random()*1000000))
	];
	config.docType = '<!DOCTYPE html>';
	config.emailProtection = 'encode';
	config.entities_latin = false;
	config.entities_greek = false;
	config.extraPlugins = 'justify'; //,widget,widgetselection,image2,clipboard,filetools,lineutils,notification,notificationaggregator,uploadwidget,uploadimage';
	config.forcePasteAsPlainText = true;
	config.pasteFromWordPromptCleanup = true;

	config.filebrowserBrowseUrl = config.ckroot+'/media/admin/filemanager/index.html';
	config.filebrowserUploadUrl = config.ckroot+'/media/admin/filemanager/connectors/php/filemanager.php';
	config.filebrowserImageBrowseUrl = config.ckroot+'/media/admin/filemanager/index.html';
	config.filebrowserImageUploadUrl = config.ckroot+'/media/admin/filemanager/connectors/php/filemanager.php';
	config.filebrowserWindowWidth  = 800;
	config.filebrowserWindowHeight = 500;

	config.removeDialogTabs = 'link:upload;image:Upload';
};

CKEDITOR.on('instanceReady', function(ev){

	// Output self closing tags the HTML4 and HTML5 way

	ev.editor.dataProcessor.writer.selfClosingEnd = '>';
});
