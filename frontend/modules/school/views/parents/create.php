<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Parents */

$this->title = 'Create Parents';
$this->params['breadcrumbs'][] = ['label' => 'Parents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parents-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
