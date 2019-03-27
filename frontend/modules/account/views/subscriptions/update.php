<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subscriptions */

$this->title = 'Update Subscriptions: ' . $model->sub_id;
$this->params['breadcrumbs'][] = ['label' => 'Subscriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sub_id, 'url' => ['view', 'id' => $model->sub_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subscriptions-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
