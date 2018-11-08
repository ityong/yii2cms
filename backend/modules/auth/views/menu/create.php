<?php
use backend\assets\UiLayAsset;

UiLayAsset::register($this);
?>
<div class="menu-create">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
