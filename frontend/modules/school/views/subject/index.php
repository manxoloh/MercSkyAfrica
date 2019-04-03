<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SubjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subjects';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <span class="pull-right">
            <a class="btn btn-success details" href="<?= Url::to(['/school/subject/create']) ?>">Add Subject</a>
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
                                <th>No.</th>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i=1; foreach ($subjects as $subject){ ?>
                            <tr>
                                <td><?= $i++  ?></td>
                                <td><?= $subject['subject_code'] ?></td>
                                <td><?= $subject['subject_name'] ?></td>
                                <td class="text-right">
                                    <a href="<?= Url::to(['/school/subject/view', 'id'=>$subject['subject_id']])?>" class="btn btn-link btn-info details"><i class="fa fa-heart"></i></a>
                                    <a href="<?= Url::to(['/school/subject/update', 'id'=>$subject['subject_id']])?>" class="btn btn-link btn-warning details"><i class="fa fa-edit"></i></a>
                                    <a href="<?= Url::to(['/school/subject/delete', 'id'=>$subject['subject_id']])?>" class="btn btn-link btn-danger details" data-method="post" data-confirm="Are you sure you want to delete this record?"><i class="fa fa-times"></i></a>
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