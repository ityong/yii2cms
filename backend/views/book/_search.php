<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\UiLayAsset;
use common\models\Ebook;
/* @var $this yii\web\View */
/* @var $model common\models\searchs\EbookSearch */
/* @var $form yii\widgets\ActiveForm */
UiLayAsset::register($this);
?>

<div class="ebook-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline'],
        'fieldConfig' => [
            'template' => '<div class="layui-inline">{label}：<div class="layui-input-inline">{input}</div></div><span class="help-block" style="display: inline-block;">{hint}</span>',
        ],
    ]); ?>

    <?= $form->field($model, 'id')->textInput(['class'=>'layui-input search_input']) ?>

    <?= $form->field($model, 'name')->textInput(['class'=>'layui-input search_input']) ?>

    <?= $form->field($model, 'type')->dropDownList([''=>'--全部--'] + Ebook::BOOK_TYPE) ?>

    <?= $form->field($model, 'status')->dropDownList([''=>'--全部--'] + Ebook::BOOK_STATUS) ?>

    <?= $form->field($model, 'created_at')->textInput(['class'=>'layui-input search_input']) ?>

    <div class="form-group">
        <?= Html::submitButton('查找', ['class' => 'layui-btn layui-btn-normal']) ?>
        <?= Html::button('添加', ['class' => 'layui-btn layui-default-add']) ?>
        <?php //echo  Html::button('批量删除', ['class' => 'layui-btn layui-btn-danger gridview layui-default-delete-all']) ?>
        <?= Html::resetButton('重置', ['class' => 'layui-btn layui-default-reset']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
