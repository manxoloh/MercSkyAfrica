<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ExamResultsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exam-results-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'result_id') ?>

    <?= $form->field($model, 'student_id') ?>

    <?= $form->field($model, 'session_id') ?>

    <?= $form->field($model, 'subject_id') ?>

    <?= $form->field($model, 'marks_scored') ?>

    <?php // echo $form->field($model, 'grade') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
