<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="content">
        <div class="form-group">
            <?= $form->field($model, 'firstname')->textInput(['placeholder'=>true, 'autofocus' => true])->label(false) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'lastname')->textInput(['placeholder'=>true])->label(false) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'phone')->textInput(['placeholder'=>true, 'value'=>"+254"])->label(false) ?>
        </div> 
        <div class="form-group">
            <?= $form->field($model, 'email')->textInput(['placeholder'=>true])->label(false) ?>
        </div>                   
        <div class="form-group">
            <?= $form->field($model, 'username')->textInput(['placeholder'=>true])->label(false) ?>
        </div>
        <div class="form-group">
        	<?= $form->field($model, 'password')->passwordInput(['placeholder'=>true])->label(false) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'confirm_password')->passwordInput(['placeholder'=>true])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
