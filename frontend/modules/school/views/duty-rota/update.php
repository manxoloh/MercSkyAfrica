<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DutyRota */

$this->title = 'Update Duty Rota: ' . $model->duty_id;
$this->params['breadcrumbs'][] = ['label' => 'Duty Rotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->duty_id, 'url' => ['view', 'id' => $model->duty_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="duty-rota-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
