/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    // Define changes to default configuration here.
    // For complete reference see:
    // http://docs.ckeditor.com/#!/api/CKEDITOR.config

    config.filebrowserBrowseUrl = '../libs/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = '../libs/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = '../libs/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = '../libs/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = '../libs/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = '../libs/kcfinder/upload.php?opener=ckeditor&type=flash';

    // The toolbar groups arrangement, optimized for two toolbar rows.
    config.toolbarGroups = [
        { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
        { name: 'editing',     groups: [ 'find', 'selection' ] },
        { name: 'links' },
        { name: 'insert' },
        { name: 'tools' },
        { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
        '/',
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
        { name: 'styles',      groups: ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },
        { name: 'colors' }
    ];

    // Remove some buttons provided by the standard plugins, which are
    // not needed in the Standard(s) toolbar.
    config.removeButtons = 'Underline,Subscript,Superscript';

    // Set the most common block elements.
    config.format_tags = 'p;h1;h2;h3;pre';
    config.skins = 'office2013';
    config.fullPage         = false;
    // Simplify the dialog windows.
    config.removeDialogTabs = 'image:advanced;link:advanced';
    config.codeSnippet_theme = 'pojoaque';
    config.filebrowserWindowHeight = 580;
    config.filebrowserWindowHeight = '50%';
    config.format_h1 = { element: 'h1', attributes: { 'class': 'h1' } };
    config.format_h2 = { element: 'h2', attributes: { 'class': 'h2' } };
    config.format_h3 = { element: 'h3', attributes: { 'class': 'h3' } };
    config.format_h4 = { element: 'h4', attributes: { 'class': 'h4' } };
    config.format_h5 = { element: 'h5', attributes: { 'class': 'h5' } };
    config.format_h6 = { element: 'h6', attributes: { 'class': 'h6' } };
    config.height = 500;        // 500 pixels.
    config.height = '25em';     // CSS length.
    config.height = '300px';    // CSS length.
    config.htmlEncodeOutput = true;
    config.toolbarGroupCycling = false;
    config.toolbarCanCollapse = true;
    config.toolbarStartupExpanded = true;

    config.extraPlugins = 'wordcount';

    config.wordcount = {

        // Whether or not you want to show the Word Count
        showWordCount: true,

        // Whether or not you want to show the Char Count
        showCharCount: true,

        // Whether or not to include Html chars in the Char Count
        countHTML: false
    };

    config.extraPlugins = 'autogrow';
    config.autoGrow_minHeight = 200;
    config.autoGrow_maxHeight = 480;
    config.autoGrow_bottomSpace = 50;

    //config.useComputedState = false;


};

