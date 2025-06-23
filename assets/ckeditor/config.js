/**
 * @license Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */




CKEDITOR.editorConfig = function( config ) {

    config.height = 100;
    config.toolbarCanCollapse = true;
    config.language = 'en';
    config.menu_groups = 'clipboard,table,anchor,link,image';
    config.uiColor = '#f2f2f2';
    config.allowedContent = true;

    config.toolbarGroups = [
        { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
        { name: 'forms', groups: [ 'forms' ] },

        { name: 'styles', groups: [ 'styles' ] },
        { name: 'colors', groups: [ 'colors' ] },

        { name: 'tools', groups: [ 'tools' ] },
        { name: 'others', groups: [ 'others' ] },
        { name: 'about', groups: [ 'about' ] },

        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph', groups: [ 'list',  'paragraph' ] },
        { name: 'links', groups: [ 'links' ] },
        { name: 'insert', groups: [ 'insert' ] },


    ];

    config.removeButtons = 'Maximize,Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,CreateDiv,Language,BidiRtl,BidiLtr,Anchor,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,About,ShowBlocks,Unlink';


    CKEDITOR.dtd.$removeEmpty.span = 0;

	config.protectedSource.push(/<i[^>]*><\/i>/g);

};

//CKEDITOR.dtd.$removeEmpty['i'] = false;
