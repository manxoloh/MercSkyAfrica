<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EventTypes */

$this->title = 'Update Event Types: ' . $model->event_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Event Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->event_type_id, 'url' => ['view', 'id' => $model->event_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="event-types-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
