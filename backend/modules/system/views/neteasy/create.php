<?php
use backend\assets\UiLayAsset;

UiLayAsset::register($this);
?>
<div class="neteasy-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
