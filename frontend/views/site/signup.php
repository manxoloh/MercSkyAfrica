<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
<div class="card card-register card-plain text-center">
    <div class="card-header ">
        <div class="row  justify-content-center">
            <div class="col-md-8">
                <div class="header-text">
                    <h2 class="card-title">Merc Sky Africa</h2>
                    <h4 class="card-subtitle">Register for free and experience the dashboard today</h4>
                    <hr />
                </div>
            </div>
        </div>
    </div>
    <div class="card-body ">
        <div class="row">
            <div class="col-md-5 ml-auto">
                <div class="media">
                    <div class="media-left">
                        <div class="icon">
                            <i class="nc-icon nc-circle-09"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h4>Free Account</h4>
                        <p>Here you can write a feature description for your dashboard, let the users know what is the value that you give them.</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <div class="icon">
                            <i class="nc-icon nc-preferences-circle-rotate"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h4>Awesome Performances</h4>
                        <p>Here you can write a feature description for your dashboard, let the users know what is the value that you give them.</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <div class="icon">
                            <i class="nc-icon nc-planet"></i>
                        </div>
                    </div>
                    <div class="media-body">
                        <h4>Global Support</h4>
                        <p>Here you can write a feature description for your dashboard, let the users know what is the value that you give them.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mr-auto">
                    <div class="card card-plain">
                        <div class="content">
                            <div class="form-group">
                                <?= $form->field($model, 'organization')->textInput(['placeholder'=>'Organization Name', 'autofocus' => true])->label(false) ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model, 'phone')->textInput(['placeholder'=>'Phone Number', 'type'=>'number'])->label(false) ?>
                            </div> 
                            <div class="form-group">
                                <?= $form->field($model, 'email')->textInput(['placeholder'=>'Email'])->label(false) ?>
                            </div>                   
                            <div class="form-group">
                                <?= $form->field($model, 'username')->textInput(['placeholder'=>'Username'])->label(false) ?>
                            </div>
                            <div class="form-group">
                            	<?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password'])->label(false) ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model, 'confirm_password')->passwordInput(['placeholder'=>'Confirm Password'])->label(false) ?>
                            </div>
                        </div>
                        <div class="footer text-center">
                        	<?= Html::submitButton('Create Free Account', ['class' => 'btn btn-fill btn-neutral btn-wd', 'name' => 'signup-button']) ?>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>