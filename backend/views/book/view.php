<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\assets\UiLayAsset;
use common\models\Ebook;
/* @var $this yii\web\View */
/* @var $model common\models\Ebook */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ebooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
UiLayAsset::register($this);
UiLayAsset::addCss($this,'plugins/viewjs/viewer.min.css');
UiLayAsset::addScript($this,'plugins/viewjs/viewer.min.js');
$this->registerJs($this->render('js/view.js'));
?>
<div class="ebook-view" id="img-view">
    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'layui-table'],
        'template' => '<tr><th width="100px">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            'id',
            [
                'attribute' => 'type',
                'value' => function ($model){
                    return Ebook::BOOK_TYPE[$model->type] ?? '未定义';
                },
            ],
            'name',
            'author',
            [
                "attribute"=>"cover",
                'value' => function ($model){
                    return \Yii::$app->params['WEB_SITE_RESOURCES_URL'] . $model->cover;
                },
                "format"=>[
                    "image",
                    [
                        "width"=>"250px",
                    ],
                ],
            ],
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
            'find_info',
        ],
        'template' => '<tr><th width="90px;">{label}</th><td>{value}</td></tr>',
    ]) ?>

</div>
