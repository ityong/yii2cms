<?php
use backend\assets\UiLayAsset;
UiLayAsset::register($this);
?>
<div class="auth-item-update">
    <?=$this->render('_form', [
        'model' => $model,
    ]);
    ?>
</div>
