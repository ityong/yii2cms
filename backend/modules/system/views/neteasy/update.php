<?php
use backend\assets\UiLayAsset;
UiLayAsset::register($this);
?>
<div class="neteasy-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
