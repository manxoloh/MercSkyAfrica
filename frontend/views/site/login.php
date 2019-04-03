<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<div class="col-md-4 col-sm-6 ml-auto mr-auto">
	<div class="card card-login">
        <div class="card-header ">
        	<img src="<?= Yii::$app->request->baseUrl; ?>theme/img/mercskyafrica.jpg" style="display: block; margin-left: auto; margin-right: auto; width: 50%;"/>
        </div>
        <div class="card-body ">
            <div class="card-body">
                <div class="form-group">
                    <label>Username</label>
                    <?= $form->field($model, 'username')->textInput(['placeholder'=>true])->label(false) ?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <?= $form->field($model, 'password')->passwordInput(['placeholder'=>true])->label(false) ?>
                </div>
                <div class="form-group">                    
                    <span> <?= Html::a('Reset your password', ['site/request-password-reset']) ?></span>
                </div>
            </div>
        </div>
        <div class="card-footer ml-auto mr-auto">
            <?= Html::submitButton('Login', ['class' => 'btn btn-warning btn-wd', 'name' => 'signup-button']) ?>
        <a href="<?= Url::to(['/site/signup'])?>" class="btn btn-info btn-wd">Register</a>
        </div>
    </div>
<?php ActiveForm::end(); ?>
</div>
