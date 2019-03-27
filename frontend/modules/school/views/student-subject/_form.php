<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Subjects;
use yii\helpers\ArrayHelper;
use common\models\StudentSubjects;

/* @var $this yii\web\View */
/* @var $model common\models\StudentSubjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-subjects-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject_id')->checkboxList(ArrayHelper::map(Subjects::find()->all(), 'subject_id', 'subject_name'))->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Code</th>
          <th scope="col">Subject</th>
        </tr>
      </thead>
      <tbody>
        <?php $id=1; foreach (StudentSubjects::find()->where(['student_id'=>$student])->all() as $subject) { 
            $sub = Subjects::findOne($subject['student_subject_id']);
            ?>
        <tr>
          <td><?= $id++ ?>.</td>
          <td><?= $sub->subject_code ?></td>
          <td><?= $sub->subject_name ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

</div>
