<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PaymentMethods */

$this->title = 'Update Payment Methods: ' . $model->payment_method_id;
$this->params['breadcrumbs'][] = ['label' => 'Payment Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->payment_method_id, 'url' => ['view', 'id' => $model->payment_method_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payment-methods-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
