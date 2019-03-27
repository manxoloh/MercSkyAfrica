<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BusinessContacts */

$this->title = 'Create Business Contacts';
$this->params['breadcrumbs'][] = ['label' => 'Business Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-contacts-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
