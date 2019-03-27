<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\EventTypes;

/* @var $this yii\web\View */
/* @var $model common\models\EventsCalendar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-calendar-form">

    <?php $form = ActiveForm::begin(['id'=>'events']); ?>

    <?= $form->field($model, 'event_type')->dropDownList(ArrayHelper::map(EventTypes::find()->all(), 'event_type_id', 'event_type_name'), ['prompt'=>'Event Type'])->label(false) ?>
    
    <?= $form->field($model, 'title')->textInput(['placeholder' => true])->label(false) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6, 'placeholder' => true])->label(false) ?>

    <?= $form->field($model, 'start_date')->textInput(['placeholder' => true, 'type'=>'date'])->label(false) ?>

    <?= $form->field($model, 'start_time')->textInput(['placeholder' => true, 'type'=>'time'])->label(false) ?>

    <?= $form->field($model, 'end_date')->textInput(['placeholder' => true, 'type'=>'date'])->label(false) ?>

    <?= $form->field($model, 'end_time')->textInput(['placeholder' => true, 'type'=>'time'])->label(false) ?>

    <?= $form->field($model, 'venue')->textInput(['placeholder' => true])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
