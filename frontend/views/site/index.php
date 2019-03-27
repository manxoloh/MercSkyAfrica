<?php

/* @var $this yii\web\View */

use common\models\Messages;
use common\models\Subscriptions;
use common\models\Students;
use common\models\Parents;
use yii\helpers\Url;

$this->title = 'Merc Sky Africa';
?>
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-email-85 text-warning"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category">SMS Used</p>
                            <h4 class="card-title"><?= Messages::find()->where(['sender'=>Yii::$app->user->identity->id])->count() ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-refresh"></i> Updated Now
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-email-83 text-success"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category">SMS Balance</p>
                            <h4 class="card-title"><?= Subscriptions::find()->where(['owner'=>Yii::$app->user->identity->id])->one() ? Subscriptions::find()->where(['owner'=>Yii::$app->user->identity->id])->one()->remaining_sms : 0 ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-calendar-o"></i> Updated Now
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-single-02 text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category">Total Students</p>
                            <h4 class="card-title"><?= Students::find()->count() ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-clock-o"></i> In the last hour
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-badge text-primary"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category">Contacts</p>
                            <h4 class="card-title"><?= Parents::find()->count() ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-refresh"></i> Update now
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header "> 
            <div class="float-bottom-right">
                <ul id="clock">
                    <li id="sec" style="transform: rotate(318deg);"></li>
                    <li id="hour" style="transform: rotate(361.5deg);"></li>
                    <li id="min" style="transform: rotate(18deg);"></li>
                </ul>
            </div>
                <h4 class="card-title"> 
                <span class="pull-right">
                    <a class="btn btn-success details" href="<?= Url::to(['/school/event-calendar/create']) ?>">New Event</a>
                    <a class="btn btn-warning details" href="<?= Url::to(['/school/event-type/create']) ?>">Event Type</a>
                </span>
                </h4>
            </div>
            <div class="card-body ">
                <?= yii2fullcalendar\yii2fullcalendar::widget(array('events' => $events,'header' => ['left' => 'prev,next,today','center' => 'title','right' => 'month,agendaWeek,agendaDay'])); ?>
            </div>
        </div>
    </div>
</div>
