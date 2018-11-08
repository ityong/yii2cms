<?php
use yii\helpers\Html;
use backend\assets\UiLayAsset;
UiLayAsset::register($this);
?>
<div class="user-rank-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
