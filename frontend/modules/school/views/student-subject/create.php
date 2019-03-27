<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StudentSubjects */

$this->title = 'Create Student Subjects';
$this->params['breadcrumbs'][] = ['label' => 'Student Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-subjects-create">

    <?= $this->render('_form', [
        'model' => $model,
        'student'=>$student,
    ]) ?>

</div>
