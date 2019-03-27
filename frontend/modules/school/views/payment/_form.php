<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\PaymentCategories;
use common\models\PaymentMethods;
use common\models\Students;

/* @var $this yii\web\View */
/* @var $model common\models\Payments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'payment_cat_id')->dropDownList(ArrayHelper::map(PaymentCategories::find()->all(), 'payment_cat_id', 'payment_title'), ['prompt'=>'Payment Category'])->label(false) ?>

    <?= $form->field($model, 'payee_id')->dropDownList(ArrayHelper::map(Students::find()->all(), 'student_id', 'admission_no'), ['prompt'=>'Student Admission'])->label(false) ?>

	<?= $form->field($model, 'payment_method')->dropDownList(ArrayHelper::map(PaymentMethods::find()->all(), 'payment_method_id', 'payment_method'), ['prompt'=>'Payment Method'])->label(false) ?>

    <?= $form->field($model, 'reference_number')->textInput(['placeholder' => true])->label(false)  ?>
	
	<?= $form->field($model, 'amount_paid')->textInput(['placeholder' => true])->label(false)  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
