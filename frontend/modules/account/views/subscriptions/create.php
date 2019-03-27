<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subscriptions */

$this->title = 'Create Subscriptions';
$this->params['breadcrumbs'][] = ['label' => 'Subscriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscriptions-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
