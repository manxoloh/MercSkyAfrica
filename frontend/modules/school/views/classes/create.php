<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Classes */

$this->title = 'Create Classes';
$this->params['breadcrumbs'][] = ['label' => 'Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
