<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Notifications */

$this->title = 'Create Notifications';
$this->params['breadcrumbs'][] = ['label' => 'Notifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notifications-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
