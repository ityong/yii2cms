<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\UiLayAsset;
use yii\grid\GridView;
use common\models\Ebook;
UiLayAsset::register($this);
$this->registerJs($this->render('js/index.js'));
UiLayAsset::addCss($this,'plugins/viewjs/viewer.min.css');
UiLayAsset::addScript($this,'plugins/viewjs/viewer.min.js');
$this->registerJs($this->render('js/view.js'));

/* @var $this yii\web\View */
/* @var $searchModel common\models\searchs\EbookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ebooks';
$this->params['breadcrumbs'][] = $this->title;
?>

<blockquote class="layui-elem-quote" style="font-size: 14px;">
    <?= $this->render('_search', ['model' => $searchModel]); ?>
</blockquote>

<div class="ebook-index layui-form news_list" id="img-view">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'grid-view','style'=>'overflow:auto', 'id' => 'grid'],
        'tableOptions'=> ['class'=>'layui-table'],
        'pager' => [
            'options'=>['class'=>'layuipage pull-right'],
            'prevPageLabel' => '上一页',
            'nextPageLabel' => '下一页',
            'firstPageLabel'=>'首页',
            'lastPageLabel'=>'尾页',
            'maxButtonCount'=>5,
        ],
        'columns' => [
            [
                'class' => 'backend\widgets\CheckboxColumn',
                'checkboxOptions' => ['lay-skin'=>'primary','lay-filter'=>'choose'],
                'headerOptions' => ['width'=>'50','style'=> 'text-align: center;'],
                'contentOptions' => ['style'=> 'text-align: center;']
            ],
            'id',
            [
                'attribute' => 'cover',
                'contentOptions' => ['style'=> 'text-align: center;'],
                'headerOptions' => ['width'=>'110','style'=> 'text-align: center;'],
                'value' => function ($model){
                    return \Yii::$app->params['WEB_SITE_RESOURCES_URL'] . $model->cover;
                },
                "format"=>[
                    "image", ["width"=>"50px"],
                ],
            ],
            [
                'attribute' => 'type',
                'value' => function ($model){
                    return Ebook::BOOK_TYPE[$model->type] ?? '未定义';
                },
            ],
            'name',
            'author',
            'mark',
            [
                'attribute' => 'status',
                'value' => function ($model){
                    return Ebook::BOOK_STATUS[$model->status] ?? '未定义';
                },
            ],

            [
                'attribute' => 'definition',
                'value' => function ($model){
                    return Ebook::BOOK_DEFINITION[$model->definition] ?? '';
                },
            ],
            'created_at',
            'updated_at',
            [
                'header' => '操作',
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['class'=>'text-center'],
                'headerOptions' => [
                    'width' => '10%',
                    'style'=> 'text-align: center;'
                ],
                'template' =>'{view} {update} {setres}{delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key){
                        return Html::a('查看', Url::to(['view','id'=>$model->id]), ['class' => "layui-btn layui-btn-xs layui-default-view"]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('修改', Url::to(['update','id'=>$model->id]), ['class' => "layui-btn layui-btn-normal layui-btn-xs layui-default-update"]);
                    },
                    'setres' => function ($url, $model, $key) {
                        return Html::a('资源', Url::to(['set-res','id'=>$model->id]), ['class' => "layui-btn layui-btn-warm layui-btn-xs set-res-info"]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('删除', Url::to(['delete','id'=>$model->id]), ['class' => "layui-btn layui-btn-danger layui-btn-xs layui-default-delete"]);
                    }
                ]
            ]
        ],
    ]); ?>
</div>
<script>


</script>