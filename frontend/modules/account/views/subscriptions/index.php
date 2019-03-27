<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SubscriptionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subscriptions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscriptions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Subscriptions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sub_id',
            'owner',
            'amount',
            'sms_quantity',
            'used_sms',
            //'remaining_sms',
            //'bought_on',
            //'lastly_updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
