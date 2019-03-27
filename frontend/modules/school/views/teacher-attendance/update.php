<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TeacherAttendance */

$this->title = 'Update Teacher Attendance: ' . $model->student_attendance_id;
$this->params['breadcrumbs'][] = ['label' => 'Teacher Attendances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_attendance_id, 'url' => ['view', 'id' => $model->student_attendance_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="teacher-attendance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
