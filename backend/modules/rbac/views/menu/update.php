<?php
use backend\assets\UiLayAsset;
UiLayAsset::register($this);
?>
<div class="menu-update">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
