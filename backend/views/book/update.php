<?php

use yii\helpers\Html;
use backend\assets\UiLayAsset;


/* @var $this yii\web\View */
/* @var $model common\models\Ebook */
$this->title = 'Update Ebook: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ebooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

UiLayAsset::register($this);
$this->registerJs($this->render('js/create.js'));

?>
<div class="ebook-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
