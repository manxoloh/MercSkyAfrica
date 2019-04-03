<?php

use common\models\Subjects;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\StudentSubjects;

/* @var $this yii\web\View */
/* @var $model common\models\ExamResults */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
    <thead>
        <tr>
            <?php foreach (StudentSubjects::find()->where(['student_id'=>$student])->all() as $subject){ 
                $sub = Subjects::findOne($subject['subject_id']);
                ?>
            <th><?= $sub ? $sub->subject_code : null ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php foreach (StudentSubjects::find()->where(['student_id'=>$student])->all() as $subjects){ ?>
            <?= $form->field($model, 'subject_id[]')->hiddenInput(['value'=>$subjects['subject_id']])->label(false) ?> 
            <td><?= $form->field($model, 'marks_scored[]')->textInput(['placeholder'=>true])->label(false) ?></td>
            <?php } ?>
        </tr>
    </tbody>
</table>
<td><?= $form->field($model, 'remarks')->textarea(['placeholder'=>true])->label(false) ?></td>
            
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end(); ?>
