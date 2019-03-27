<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EventTypes */

$this->title = 'Create Event Types';
$this->params['breadcrumbs'][] = ['label' => 'Event Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-types-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
