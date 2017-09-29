/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserUploadUrl = '/upload-image';
	//config.extraPlugins = 'uploadfile';
	config.extraPlugins = 'notificationaggregator';
	config.extraPlugins = 'filetools';
	config.extraPlugins = 'button';
	config.extraPlugins = 'toolbar';
	config.extraPlugins = 'notification';
	config.extraPlugins = 'clipboard';
	config.extraPlugins = 'lineutils';
	config.extraPlugins = 'widgetselection';
	config.extraPlugins = 'widget';
	config.extraPlugins = 'uploadwidget';
	config.extraPlugins = 'uploadimage';
	config.uploadUrl = '/uploader/upload.php';
	config.height = '600px';
	config.allowedContent = true;
};
