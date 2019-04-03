<?php

use common\models\Classes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <span class="pull-right">
            <a class="btn btn-success details" href="<?= Url::to(['/school/students/create']) ?>">New Student</a>
            <a class="btn btn-warning" href="<?= Url::to(['/school/parents']) ?>">Parents</a>
        	<?php foreach (Classes::find()->all() as $class) { ?>
            <a class="btn btn-info" href="<?= Url::to(['/school/students', 'class_id'=>$class['class_id']]) ?>">
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
                                <th>Guardian</th>
                                <th>Phone</th>
                                <th>Admission Date</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Adm No.</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Stream</th>
                                <th>Guardian</th>
                                <th>Phone</th>
                                <th>Admission Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($students as $student){ 
                                $student_id = $student['student_id'];
                                $admission_no = $student['admission_no'];
                                $firstname = $student['first_name'];
                                $lastname = $student['last_name'];
                                $stream = isset($student->stream0->stream_name) ? $student->stream0->stream_name : null;
                                $class = isset($student->class0->class_name) ? $student->class0->class_name : null;
                                $phone = isset($student->parent0->phone) ? $student->parent0->phone : null;
                                $parent_first_name = isset($student->parent0->first_name) ? $student->parent0->first_name : null;$parent_first_name = isset($student->parent0->first_name) ? $student->parent0->first_name : null;
                                $parent_last_name = isset($student->parent0->last_name) ? $student->parent0->last_name : null;
                                $timestamp = $student['timestamp'];
                                ?>
                            <tr>
                                <td><?= $admission_no  ?></td>
                                <td><?= $firstname." ". $lastname  ?></td>
                                <td><?= $class ?></td>
                                <td><?= $stream ?></td>
                                <td><span class="btn btn-xs btn-info btn-outline"><?= $parent_first_name." ".$parent_last_name ?></span></td>
                                <td><span class="btn btn-xs btn-warning btn-outline"><?= $phone ?></span></td>
                                <td><?= date("d/m/Y", strtotime($timestamp)) ?></td>
                                <td class="text-right">
                                    <a href="<?= Url::to(['/school/student-subject/create', 'student'=>$student_id])?>" class="btn btn-link details"><i class="fa fa-book"></i></a>
                                    <a href="<?= Url::to(['/school/students/view', 'id'=>$student_id])?>" class="btn btn-link btn-info details"><i class="fa fa-heart"></i></a>
                                    <a href="<?= Url::to(['/school/students/update', 'id'=>$student_id])?>" class="btn btn-link btn-warning details"><i class="fa fa-edit"></i></a>
                                    <a href="<?= Url::to(['/school/students/delete', 'id'=>$student_id])?>" class="btn btn-link btn-danger"  data-method="post" data-confirm="Are you sure you want to delete this record?"><i class="fa fa-times"></i></a>
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
