<?php

use common\models\Classes;
use common\models\Streams;
use common\models\StudentSubjects;
use common\models\Subjects;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use common\models\StudentAttendance;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StudentAttendanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Attendances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <span class="pull-right">
        <table>
            <?php $form = ActiveForm::begin(); ?>
            <tr>
                <td>
                	<?= $form->field(new Classes(), 'class_id')->dropDownList(ArrayHelper::map(Classes::find()->all(), 'class_id', 'class_name'), [
                    	    'onchange'=>'
                                            $.post("stream?class='.'"+$(this).val(), function(data){
                                            $("select#streams-stream_id").html(data);
                                        });'
                    	])->label(false) ?>
                	</td><td>
                	<?= $form->field(new Streams(), 'stream_id')->dropDownList(ArrayHelper::map(Streams::find()->all(), 'stream_id', 'stream_name'))->label(false) ?>
                	</td><td>
                	<?= $form->field(new StudentAttendance(), 'date')->textInput(['type'=>'date'])->label(false) ?>
                </td>
            </tr>
            <?php ActiveForm::end(); ?>            
            </table>
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
                                <th>Adm No.</th>
                                <th>Name</th>
                                <th>Class</th>
                                <?php for($i=1; $i<=date("t"); $i++ ){ ?>
                                <th><?= $i ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Adm No.</th>
                                <th>Name</th>
                                <th>Class</th>
                                <?php for($i=1; $i<=date("t"); $i++ ){ ?>
                                <th><?= $i ?></th>
                                <?php } ?>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($students as $student){ 
                                $admission_no = $student['admission_no'];
                                $firstname = $student['first_name'];
                                $lastname = $student['last_name'];
                                $class = isset($student->class0->class_code) ? $student->class0->class_code : null;
                            ?>
                            <tr>
                                <td><?= $admission_no  ?></td>
                                <td><?= $firstname." ". $lastname  ?></td>
                                <td><?= $class ?></td>
                                <?php for($i=1; $i<=date("t"); $i++ ){
                                    $present = StudentAttendance::find()->where(['date'=>date("Y-m-d", strtotime(date("Y-m-".$i)))])->andWhere(['student_id'=>$student['student_id']])->one();
                                ?>
                                    
                                    <td><?= $present ? '<p class="text-success"><b>&check;</b></p>' : '<p class="text-danger"><i>x</i></p>' ?></td>
                                
                                <?php } ?>
                            </tr>
							<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
