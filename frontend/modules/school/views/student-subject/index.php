<?php

use common\models\Classes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\StudentSubjects;
use common\models\Students;
use common\models\Subjects;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StudentSubjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Subjects';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <span class="pull-right">
            <?php foreach (Classes::find()->all() as $class) { ?>
            <a class="btn btn-info" href="<?= Url::to(['/school/student-subject', 'class_id'=>$class['class_id']]) ?>">
            <?= $class['class_name'] ?>
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
                                <th>Adm No.</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Stream</th>
                                <?php foreach (Subjects::find()->all() as $subject){ ?>
                                <th><?= $subject['subject_code'] ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Adm No.</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Stream</th>
                                <?php foreach (Subjects::find()->all() as $subject){ ?>
                                <th><?= $subject['subject_code'] ?></th>
                                <?php } ?>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($students as $student){ 
                                $admission_no = $student['admission_no'];
                                $firstname = $student['first_name'];
                                $lastname = $student['last_name'];
                                $stream = isset($student->stream0->stream_name) ? $student->stream0->stream_name : null;
                                $class = isset($student->class0->class_name) ? $student->class0->class_name : null;
                                $class = isset($student->class0->class_name) ? $student->class0->class_name : null;
                            ?>
                            <tr>
                                <td><?= $admission_no  ?></td>
                                <td><?= $firstname." ". $lastname  ?></td>
                                <td><?= $class ?></td>
                                <td><?= $stream ?></td>
                                <?php foreach (Subjects::find()->all() as $subject){ 
                                    $student_subject = StudentSubjects::find()->where(['subject_id'=>$subject['subject_id']])->andWhere(['student_id'=>$student['student_id']])->one();
                                ?>
                                <td><?= $student_subject ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' ?></td>
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
