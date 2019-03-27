<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Classes */

$this->title = 'Update Classes: ' . $model->class_id;
$this->params['breadcrumbs'][] = ['label' => 'Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->class_id, 'url' => ['view', 'id' => $model->class_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="classes-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
