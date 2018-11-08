<?php
use backend\assets\UiLayAsset;
UiLayAsset::register($this);
?>
<div class="config-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
