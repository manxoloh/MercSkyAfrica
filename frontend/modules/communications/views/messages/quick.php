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

<?php $form = ActiveForm::begin(['id'=>'quick']); ?>

				<?= $form->field($model, 'recipient')->textInput(["placeholder"=>true, 'type'=>'number'])->label(false) ?>                   
            
                <?= $form->field($model, 'message')->textarea(["placeholder"=>true, "style"=>"height: 250px !important"])->label(false) ?>
            
        		<?= Html::submitButton('Send', ['class' => 'btn btn-info']) ?>
<?php ActiveForm::end(); ?>
