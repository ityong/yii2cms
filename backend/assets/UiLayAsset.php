<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class UiLayAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins/layui/css/layui.css',
		'resources/css/main.css',
		'resources/css/iconfont.css',
		'plugins/awesome/css/font-awesome.min.css',
    ];
    public $js = [
		'plugins/layui/layui.js',
    ];
    public $depends = [
    ];

    //定义按需加载JS方法，注意加载顺序在最后
    public static function addScript(View $view, $jsFile) {

        $view->registerJsFile($jsFile, [self::className(), 'depends' => 'backend\assets\UiLayAsset']);
    }  
      
   //定义按需加载css方法，注意加载顺序在最后  
    public static function addCss(View $view, $cssFile) {
        $view->registerCssFile($cssFile, [self::className(), 'depends' => 'backend\assets\UiLayAsset']);
    }  
}
