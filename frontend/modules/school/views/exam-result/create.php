<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ExamResults */

$this->title = 'Create Exam Results';
$this->params['breadcrumbs'][] = ['label' => 'Exam Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exam-results-create">
    <?= $this->render('_form', [
        'model' => $model,
        'student'=>$student,
    ]) ?>

</div>
