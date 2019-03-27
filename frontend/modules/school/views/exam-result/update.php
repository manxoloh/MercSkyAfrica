<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ExamResults */

$this->title = 'Update Exam Results: ' . $model->result_id;
$this->params['breadcrumbs'][] = ['label' => 'Exam Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->result_id, 'url' => ['view', 'id' => $model->result_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="exam-results-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
