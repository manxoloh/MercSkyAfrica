<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teacher';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-md-12">
        <span class="pull-right">
            <a class="btn btn-success details" href="<?= Url::to(['/school/teacher/create']) ?>">New Teacher</a>
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
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Start Date</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Start Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i=1; foreach (User::find()->where(['user_type'=>'Teacher'])->all() as $teacher){ ?>
                            <tr>
                                <td><?= $i++  ?></td>
                                <td><?= $teacher['firstname']  ?></td>
                                <td><?= $teacher['lastname'] ?></td>
                                <td><?= $teacher['phone'] ?></td>
                                <td><?= $teacher['email'] ?></td>
                                <td><?= date("d/m/Y", $teacher['created_at']) ?></td>
                                <td class="text-right">
                                    <a href="<?= Url::to(['/school/teacher/view', 'id'=>$teacher['id']])?>" class="btn btn-link btn-info"><i class="fa fa-heart"></i></a>
                                    <a href="<?= Url::to(['/school/teacher/update', 'id'=>$teacher['id']])?>" class="btn btn-link btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?= Url::to(['/school/teacher/delete', 'id'=>$teacher['id']])?>" class="btn btn-link btn-danger"  data-method="post" data-confirm="Are you sure you want to delete this record?"><i class="fa fa-times"></i></a>
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
