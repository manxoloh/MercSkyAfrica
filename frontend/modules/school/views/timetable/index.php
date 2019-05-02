<?php

use common\models\Classes;
use common\models\Timetable;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\Subjects;
use common\models\User;
use common\models\Streams;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TimetableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Timetables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <span class="pull-right">
            <?php foreach (Streams::find()->all() as $class) { ?>
            <a class="btn btn-info" href="<?= Url::to(['/school/timetable', 'class_id'=>$class['stream_id']]) ?>">
            <?= $class['stream_name'] ?>
            </a>
        	<?php } ?>
        </span>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card data-tables">
            <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                    
                </div>
                <div class="fresh-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                              </tr>
                        </thead>
                        <tfoot>
                        	<tr>
                                <th></th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                              </tr>
                        </tfoot>
                        <tbody>
                        	<?php
                        $week_days = array('Monday','Tuesday','Wednesday','Thurshday','Friday');
                        $classes = array();
                        	$time = Timetable::find()->distinct('start_time')->where(['stream'=>$stream])->all();
                        	foreach ($time as $t){ ?>
                            <tr>
                                <td><?= $t['start_time']." - ".$t['start_time'] ?></td>
                            	<?php foreach ($week_days as $day) { ?>
                                <td><?php echo Subjects::findOne($t['subject'])->subject_code.'<br>'. User::findOne($t['teacher'])->firstname ?></td>
                                <?php }} ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>