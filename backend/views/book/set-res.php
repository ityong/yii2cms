<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\assets\UiLayAsset;
use common\models\Ebook;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Ebook */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ebooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
UiLayAsset::register($this);


?>
<?= $this->render('view', [
    'model' => $model,
]) ?>

<div class="user-form create_box">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'layui-form']]); ?>

        <div class="layui-form-item">
            <label class="layui-form-label">清晰度</label>
            <div class="layui-input-block">
                <?=Html::dropDownList('definition','',[''=>'--请选择--'] +Ebook::BOOK_DEFINITION,[])?>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">资源</label>
            <div class="layui-input-block">
                <textarea name="find_info" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

    <?=$this->registerJs($this->render('js/set-res.js'));?>

</div>

