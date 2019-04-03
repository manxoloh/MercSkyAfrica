<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'file')->fileInput(['required'=>true])->label(false) ?>

    
    <div class="form-group">
        <?= Html::submitButton('Import Contacts', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end() ?>