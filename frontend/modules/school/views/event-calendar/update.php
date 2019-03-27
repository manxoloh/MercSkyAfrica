<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EventsCalendar */

$this->title = 'Update Events Calendar: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->event_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="events-calendar-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
