<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PaymentMethods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-methods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'payment_method')->textInput(['placeholder' => true])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
