<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StudentAttendance */

$this->title = 'Create Student Attendance';
$this->params['breadcrumbs'][] = ['label' => 'Student Attendances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-attendance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
