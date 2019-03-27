<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subjects */

$this->title = 'Create Subjects';
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subjects-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
