<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subjects */

$this->title = 'Update Subjects: ' . $model->subject_id;
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->subject_id, 'url' => ['view', 'id' => $model->subject_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subjects-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
