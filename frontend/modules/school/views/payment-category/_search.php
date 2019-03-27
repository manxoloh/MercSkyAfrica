<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PaymentCategoriesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-categories-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'payment_cat_id') ?>

    <?= $form->field($model, 'payment_title') ?>

    <?= $form->field($model, 'payment_decription') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'last_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
