<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Classes;

/* @var $this yii\web\View */
/* @var $model common\models\Streams */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="streams-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'stream_code')->textInput() ?>
    
    <?= $form->field($model, 'class_id')->dropDownList(ArrayHelper::map(Classes::find()->all(), "class_id", "class_name"), ["prompt"=>"Select Class"]) ?>

    <?= $form->field($model, 'stream_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
