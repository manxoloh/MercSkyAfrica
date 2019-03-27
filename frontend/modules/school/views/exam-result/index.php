<?php

use common\models\Classes;
use common\models\StudentSubjects;
use common\models\Students;
use common\models\Subjects;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\ExamResults;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ExamResultsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exam Results';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <span class="pull-right">
            <?php foreach (Classes::find()->all() as $class) { ?>
            <a class="btn btn-info" href="<?= Url::to(['/school/exam-result', 'class_id'=>$class['class_id']]) ?>">
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
                                <th>#</th>
                                <th>Adm No.</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Stream</th>
                                <?php foreach (Subjects::find()->all() as $subject){ ?>
                                <th><?= $subject['subject_code'] ?></th>
                                <?php } ?>
                                <th>Total</th>
                                <th>Average</th>
                                <th>Grade</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Adm No.</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Stream</th>
                                <?php foreach (Subjects::find()->all() as $subject){ ?>
                                <th><?= $subject['subject_code'] ?></th>
                                <?php } ?>
                                <th>Total</th>
                                <th>Average</th>
                                <th>Grade</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $no=1; foreach ($students as $student){ 
                                $admission_no = $student['admission_no'];
                                $firstname = $student['first_name'];
                                $lastname = $student['last_name'];
                                $stream = isset($student->stream0->stream_name) ? $student->stream0->stream_name : null;
                                $class = isset($student->class0->class_name) ? $student->class0->class_name : null;
                                $class = isset($student->class0->class_name) ? $student->class0->class_name : null;
                            ?>
                            <tr>
                                <td><?= $no++  ?>.</td>
                                <td><?= $admission_no  ?></td>
                                <td><?= $firstname." ". $lastname  ?></td>
                                <td><?= $class ?></td>
                                <td><?= $stream ?></td>
                                <?php foreach (Subjects::find()->all() as $subject){ 
                                    $marks = ExamResults::find()->where(['subject_id'=>$subject['subject_id']])->andWhere(['student_id'=>$student['student_id']])->one();
                                ?>
                                <td class="text-info"><?= $marks ? $marks->marks_scored : '_' ?></td>
                                <?php } ?>
                                <td class="text-danger"><b><?= ExamResults::find()->where(['student_id'=>$student])->sum('marks_scored')?></b></td>
                                <td class="text-success"><?= ExamResults::find()->where(['student_id'=>$student])->average('marks_scored')?></td>
                                <td class="text-warning">B</td>
                                <td class="text-right">
                                    <a href="<?= Url::to(['/school/exam-result/create', 'student'=>$student['student_id']])?>" class="btn btn-link btn-info details"><i class="fa fa-print"></i></a>
                                	<a href="<?= Url::to(['/school/exam-result/create', 'student'=>$student['student_id']])?>" class="btn btn-link btn-success details"><i class="fa fa-clipboard"></i></a>
                                </td>
                            </tr>
							<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>