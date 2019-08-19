<?php

namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

class WebUpload extends Field
{
    protected $view = 'admin.web-uploader';

    protected static $css = [
        '/testwp/webuploader.css',
        '/testwp/style.css',
    ];

    protected static $js = [
        '/testwp/jquery.js',
        '/testwp/webuploader.js',
        '/testwp/upload.js'
    ];

    public function render()
    {
//        $name = $this->formatName($this->column);

//        $this->script = <<<EOT
//
//var E = window.wangEditor
//var editor = new E('#{$this->id}');
//editor.customConfig.zIndex = 0
//editor.customConfig.uploadImgShowBase64 = true
//editor.customConfig.onchange = function (html) {
//    $('input[name=\'$name\']').val(html);
//}
//editor.create()
//
//EOT;
        return parent::render();
    }
}