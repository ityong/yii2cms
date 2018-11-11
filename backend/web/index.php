<?php

define('INDEX_ROOT', __DIR__);
define('BASE_ROOT', dirname(dirname(__DIR__)));

require(BASE_ROOT . '/env.php');
require(BASE_ROOT . '/vendor/autoload.php');
require(BASE_ROOT . '/vendor/yiisoft/yii2/Yii.php');
require(BASE_ROOT . '/common/config/bootstrap.php');
require(INDEX_ROOT . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    //环境配置
    require(BASE_ROOT . '/environments/' . YII_ENV . '/backend/config/main.php'),
    //环境参数
    require(BASE_ROOT . '/environments/' . YII_ENV . '/backend/config/params.php'),
    //当前模块配置
    require(INDEX_ROOT . '/../config/main.php')
);

//print_r($config);die;

(new yii\web\Application($config))->run();
