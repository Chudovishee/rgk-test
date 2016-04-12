<?php
namespace app\assets;

use yii\web\AssetBundle;

class BooksAsset extends AssetBundle
{
    public $basePath = "@webroot";
    public $baseUrl = "@web";
    public $css = [
    ];
    public $js = [
        "js/utils.img.js",
        "js/view.js"
    ];
    public $depends = [
        "yii\web\YiiAsset",
        "yii\bootstrap\BootstrapAsset",
    ];
}
