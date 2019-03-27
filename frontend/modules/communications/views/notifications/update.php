<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Notifications */

$this->title = 'Update Notifications: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Notifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notifications-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
