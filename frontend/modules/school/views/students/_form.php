<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Classes;
use common\models\Streams;

/* @var $this yii\web\View */
/* @var $model common\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'admission_no')->textInput(['placeholder' => true])->label(false) ?>

    <?= $form->field($model, 'first_name')->textInput(['placeholder' => true])->label(false) ?>

    <?= $form->field($model, 'last_name')->textInput(['placeholder' => true])->label(false) ?>

    <?= $form->field($model, 'class')->dropDownList(ArrayHelper::map(Classes::find()->all(), 'class_id', 'class_name'), ['prompt'=>'Select Class'])->label(false) ?>

    <?= $form->field($model, 'stream')->dropDownList(ArrayHelper::map(Streams::find()->all(), 'stream_id', 'stream_name'), ['prompt'=>'Select Class Stream'])->label(false) ?>
    
    <?= $form->field($parent, 'first_name')->textInput(['placeholder' => true])->label(false) ?>

    <?= $form->field($parent, 'last_name')->textInput(['placeholder' => true])->label(false) ?>

    <?= $form->field($parent, 'phone')->textInput(['placeholder' => true, 'value'=>"+254"])->label(false) ?>

    <?= $form->field($parent, 'email')->textInput(['placeholder' => true])->label(false) ?>

    <?= $form->field($parent, 'relationship')->textInput(['placeholder' => true])->label(false) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
