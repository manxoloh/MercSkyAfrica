<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SubscriptionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subscriptions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sub_id') ?>

    <?= $form->field($model, 'owner') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'sms_quantity') ?>

    <?= $form->field($model, 'used_sms') ?>

    <?php // echo $form->field($model, 'remaining_sms') ?>

    <?php // echo $form->field($model, 'bought_on') ?>

    <?php // echo $form->field($model, 'lastly_updated') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
