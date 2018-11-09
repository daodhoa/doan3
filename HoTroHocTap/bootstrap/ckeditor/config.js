/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.height = '900px'; 
	var link_url = $('base').attr('href');
    // config.filebrowserWindowHeight = '600';
    config.filebrowserImageBrowseUrl = link_url+'bootstrap/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl =link_url+'bootstrap/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserBrowseUrl = link_url+'bootstrap/ckfinder/ckfinder.html';
    config.filebrowserUploadUrl = link_url+'bootstrap/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl =link_url+'bootstrap/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl =link_url+'bootstrap/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
