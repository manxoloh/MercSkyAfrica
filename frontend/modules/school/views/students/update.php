<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Students */

$this->title = 'Update Students: ' . $model->student_id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_id, 'url' => ['view', 'id' => $model->student_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="students-update">

    

    <?= $this->render('_form', [
        'model' => $model,
        'parent'=>$parent,
    ]) ?>

</div>
