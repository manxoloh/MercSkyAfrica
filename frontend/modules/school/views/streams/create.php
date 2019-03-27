<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Streams */

$this->title = 'Create Streams';
$this->params['breadcrumbs'][] = ['label' => 'Streams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="streams-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
