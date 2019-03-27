<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Streams */

$this->title = 'Update Streams: ' . $model->stream_id;
$this->params['breadcrumbs'][] = ['label' => 'Streams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stream_id, 'url' => ['view', 'id' => $model->stream_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="streams-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
