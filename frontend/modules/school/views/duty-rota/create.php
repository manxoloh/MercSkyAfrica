<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DutyRota */

$this->title = 'Create Duty Rota';
$this->params['breadcrumbs'][] = ['label' => 'Duty Rotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="duty-rota-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
