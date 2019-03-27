<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EventsCalendar */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="events-calendar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->event_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->event_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'event_id',
            'title',
            'description:ntext',
            'start_date',
            'start_time',
            'end_date',
            'end_time',
            'venue',
            'fee',
            'event_type',
            'created_by',
            'created_at',
        ],
    ]) ?>

</div>
