<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Ebook;

$this->registerJs($this->render('js/upload.js'));
?>
<style>
    .cover-head-pic {
        position: absolute;
        right: 5%;
        top: 53%;
        z-index: 0;
    }
</style>

<div class="user-form create_box">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'layui-form']]); ?>

    <?= $form->field($model, 'type')->dropDownList(Ebook::BOOK_TYPE) ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'class'=>'layui-input']) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true,'class'=>'layui-input']) ?>

    <?= $form->field($model, 'cover',[
            'template' => '{label} <div class="row"><div class="col-sm-12">{input}<button type="button" class="layui-btn upload_button" id="test3"><i class="layui-icon"></i>上传文件</button>{error}{hint}</div></div>'])
        ->textInput(['maxlength' => true,'class'=>'layui-input upload_input']) ?>
    <?= Html::img($model->cover ? Yii::$app->params['WEB_SITE_RESOURCES_URL'] . $model->cover : '', ['width'=>'80','class'=>'cover-head-pic'])?>

    <?= $form->field($model, 'mark')->textInput(['maxlength' => true,'class'=>'layui-input']) ?>

    <div align='right'>
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'layui-btn' : 'layui-btn layui-btn-normal']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
