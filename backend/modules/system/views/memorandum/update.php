<?php
use backend\assets\UiLayAsset;
UiLayAsset::register($this);
?>
<div class="memorandum-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
