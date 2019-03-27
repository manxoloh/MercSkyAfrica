<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StudentSubjects */

$this->title = 'Update Student Subjects: ' . $model->student_subject_id;
$this->params['breadcrumbs'][] = ['label' => 'Student Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_subject_id, 'url' => ['view', 'id' => $model->student_subject_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-subjects-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
