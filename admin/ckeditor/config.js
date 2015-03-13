/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
config.language = 'zh-cn';
config.skin='kama';
config.width = 700;
config.height =400;
config.tabSpaces = 4;
config.resize_maxWidth = 719;
config.resize_minWidth = 719;
//config.startupFocus = true;
config.toolbar = [
['Undo','Redo','-','Find','Replace'],
['Bold','Italic','Underline','Strike','Subscript','Superscript'],
['NumberedList','BulletedList'],
['Outdent','Indent','Blockquote','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
['Link','Unlink'],
['SelectAll','RemoveFormat','Templates'],
['Format','Font','FontSize'],
['TextColor','BGColor'],
['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
['Source']
]; 
//工具栏是否可以被收缩 plugins/toolbar/plugin.js.
config.toolbarCanCollapse = false;
};
