/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	/*
	config.filebrowserBrowseUrl = 'index.php?route=common/filemanager';
    config.filebrowserImageBrowseUrl = 'index.php?route=common/filemanager';
    config.filebrowserFlashBrowseUrl = 'index.php?route=common/filemanager';
    config.filebrowserUploadUrl = 'index.php?route=common/filemanager';
    config.filebrowserImageUploadUrl = 'index.php?route=common/filemanager';
    config.filebrowserFlashUploadUrl = 'index.php?route=common/filemanager';        
    */
   config.filebrowserBrowseUrl = '/golfapp/cidev/admin-panel/assets/js/ckfinder/ckfinder.html';
   config.filebrowserImageBrowseUrl = '/golfapp/cidev/admin-panel/assets/js/ckfinder/ckfinder.html?type=Images';
   config.filebrowserFlashBrowseUrl = '/golfapp/cidev/admin-panel/assets/js/ckfinder/ckfinder.html?type=Flash';
   config.filebrowserUploadUrl = '/golfapp/cidev/admin-panel/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
   config.filebrowserImageUploadUrl = '/golfapp/cidev/admin-panel/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
   config.filebrowserFlashUploadUrl = '/golfapp/cidev/admin-panel/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
    /*end of file browse*/
    config.filebrowserWindowWidth = '800';
    config.filebrowserWindowHeight = '500';


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
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	config.enterMode = 2;
	
    config.fillEmptyBlocks = false;

};
