<?php

use yii\helpers\Html;
use backend\assets\UiLayAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Ebook */

$this->title = 'Create Ebook';
$this->params['breadcrumbs'][] = ['label' => 'Ebooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
UiLayAsset::register($this);
$this->registerJs($this->render('js/create.js'));
?>
<div class="ebook-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
