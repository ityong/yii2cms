<?php
use backend\assets\UiLayAsset;

UiLayAsset::register($this);
?>
<div class="auth-item-create">
    <?=$this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>
