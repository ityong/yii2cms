<?php
use backend\assets\UiLayAsset;

UiLayAsset::register($this);
?>
<div class="memorandum-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
