<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PaymentCategories */

$this->title = 'Create Payment Categories';
$this->params['breadcrumbs'][] = ['label' => 'Payment Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-categories-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
