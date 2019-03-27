<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EventsCalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events Calendars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-calendar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Events Calendar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'event_id',
            'title',
            'description:ntext',
            'start_date',
            'start_time',
            //'end_date',
            //'end_time',
            //'venue',
            //'fee',
            //'event_type',
            //'created_by',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
