<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BusinessContacts */

$this->title = 'Update Business Contacts: ' . $model->contact_id;
$this->params['breadcrumbs'][] = ['label' => 'Business Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->contact_id, 'url' => ['view', 'id' => $model->contact_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="business-contacts-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
