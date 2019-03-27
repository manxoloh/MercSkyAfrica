<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Subscriptions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subscriptions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'owner')->dropDownList(ArrayHelper::map(User::find()->where(['user_type'=>'Superadmin'])->orWhere(['user_type'=>'Organization'])->all(), 'id', 'organization'), ['prompt'=>'Select Organization'])->label(false) ?>

    <?= $form->field($model, 'amount')->textInput(['placeholder'=>true])->label(false) ?>

    <?= $form->field($model, 'sms_quantity')->textInput(['placeholder'=>true])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
