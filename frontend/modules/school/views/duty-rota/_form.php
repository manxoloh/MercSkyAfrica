<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\AcademicSessions;

/* @var $this yii\web\View */
/* @var $model common\models\DutyRota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="duty-rota-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teacher')->dropDownList(ArrayHelper::map(User::find()->where(['user_type'=>'Teacher'])->all(), 'id', 'firstname'), ['prompt'=>'Select Teacher']) ?>

    <?= $form->field($model, 'start_date')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'end_date')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'session')->dropDownList(ArrayHelper::map(AcademicSessions::find()->all(), 'session_id', 'session_title')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
