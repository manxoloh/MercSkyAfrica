<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Parents */

$this->title = $model->parent_id;
$this->params['breadcrumbs'][] = ['label' => 'Parents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="parents-view">

    

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->parent_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->parent_id], [
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
            'parent_id',
            'first_name',
            'last_name',
            'phone',
            'email:email',
            'gender',
            'relationship',
            'timestamp',
        ],
    ]) ?>

</div>
