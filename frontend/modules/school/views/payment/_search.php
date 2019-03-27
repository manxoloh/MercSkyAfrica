<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PaymentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'payment_id') ?>

    <?= $form->field($model, 'payment_cat_id') ?>

    <?= $form->field($model, 'amount_paid') ?>

    <?= $form->field($model, 'balance') ?>

    <?= $form->field($model, 'payee_id') ?>

    <?php // echo $form->field($model, 'payment_date') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'reference_number') ?>

    <?php // echo $form->field($model, 'payment_method') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
