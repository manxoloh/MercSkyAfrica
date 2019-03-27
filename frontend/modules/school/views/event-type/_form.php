<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\EventTypes;

/* @var $this yii\web\View */
/* @var $model common\models\EventTypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-types-form">

    <?php $form = ActiveForm::begin(['id'=>'events']); ?>

    <?= $form->field($model, 'event_type_name')->textInput(['placeholder' => true])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

	
    <?php ActiveForm::end(); ?>
</div>
<table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Type</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $id=1; foreach (EventTypes::find()->all() as $type) { ?>
        <tr>
          <td><?= $id++ ?>.</td>
          <td><?= $type['event_type_name'] ?></td>
          <td><a href="<?= Url::to(['/school/event-type/delete', 'id'=>$type['event_type_id']])?>" class="btn btn-link btn-danger"  data-method="post" data-confirm="Are you sure you want to delete this record?"><i class="fa fa-times"></i></a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
