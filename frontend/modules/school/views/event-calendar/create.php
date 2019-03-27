<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EventsCalendar */

$this->title = 'Create Events Calendar';
$this->params['breadcrumbs'][] = ['label' => 'Events Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-calendar-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
