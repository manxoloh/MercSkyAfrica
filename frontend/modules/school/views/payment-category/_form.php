<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PaymentCategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'payment_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment_decription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
