<?php
use backend\assets\UiLayAsset;

UiLayAsset::register($this);
$this->registerJs($this->render('js/create.js'));
?>
<div class="user-rank-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
