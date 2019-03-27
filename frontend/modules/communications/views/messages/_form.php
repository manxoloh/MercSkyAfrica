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

$model->recipient = Classes::find()->all();
$model->status = Streams::find()->all();
?>

<?php $form = ActiveForm::begin(['id'=>'messages']); ?>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'recipient')->dropDownList(ArrayHelper::map(Classes::find()->all(), "class_id", "class_name"), ['multiple'=>true, "style"=>"height: 250px !important"]) ?>                   
    </div>
    <div class="col-md-8">
    	<?= $form->field($model, 'message')->textarea(["style"=>"height: 250px !important"]) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        		<?= Html::submitButton('Send', ['class' => 'btn btn-info']) ?>
	</div>
</div>
<?php ActiveForm::end(); ?>
