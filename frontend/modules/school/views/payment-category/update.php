<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PaymentCategories */

$this->title = 'Update Payment Categories: ' . $model->payment_cat_id;
$this->params['breadcrumbs'][] = ['label' => 'Payment Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->payment_cat_id, 'url' => ['view', 'id' => $model->payment_cat_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payment-categories-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
