<?php

require(__DIR__ . '/../../env.php');
require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');


$config = yii\helpers\ArrayHelper::merge(
//环境配置
    require(__DIR__ . '/../../environments/' . YII_ENV . '/api/config/main.php'),
    //环境参数
    require(__DIR__ . '/../../environments/' . YII_ENV . '/api/config/params.php'),
    //当前模块配置
    require(__DIR__ . '/../config/main.php')
);

//print_r($config);die;

(new yii\web\Application($config))->run();

