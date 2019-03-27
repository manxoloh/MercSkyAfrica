<?php

use common\models\Classes;
use common\models\Parents;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Streams;

/* @var $this yii\web\View */
/* @var $model common\models\Messages */
/* @var $form yii\widgets\ActiveForm */

?>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'message')->textarea(["style"=>"height: 250px !important"]) ?>
<?= Html::submitButton('Send', ['class' => 'btn btn-info']) ?>
<?php ActiveForm::end(); ?>
