<?php

use common\models\Classes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ParentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <span class=" pull-right">
        <a class="btn btn-success details" href="<?= Url::to(['/school/parents/create']) ?>"> <i class="fa fa-plus"></i> Add Contact</a>
        <?php foreach (Classes::find()->all() as $class) { ?>
            <a class="btn btn-info" href="<?= Url::to(['/school/parents', 'class_id'=>$class['class_id']]) ?>">
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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Relationship</th>
                                <th>Date</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Relationship</th>
                                <th>Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($parents as $parent){ 
                                $parent_id = isset($parent->parent0->parent_id) ? $parent->parent0->parent_id : $parent['parent_id'];
                                $firstname = isset($parent->parent0->first_name) ? $parent->parent0->first_name : $parent['first_name'];
                                $lastname = isset($parent->parent0->last_name) ? $parent->parent0->last_name : $parent['last_name'];
                                $phone = isset($parent->parent0->phone) ? $parent->parent0->phone : $parent['phone'];
                                $email = isset($parent->parent0->email) ? $parent->parent0->email : null;
                                $gender = isset($parent->parent0->gender) ? $parent->parent0->gender : $parent['gender'];
                                $relationship = isset($parent->parent0->relationship) ? $parent->parent0->relationship : $parent['relationship'];
                                $timestamp = isset($parent->parent0->timestamp) ? $parent->parent0->timestamp : $parent['timestamp'];
                                ?>
                            <tr>
                                <td><?= $firstname." ". $lastname  ?></td>
                                <td><span class="btn btn-xs btn-warning btn-outline"><?= $phone ?></span></td>
                                <td><span class="btn btn-xs btn-info btn-outline"><?= $email ?></span></td>
                                <td><?= $gender ?></td>
                                <td><?= $relationship ?></td>
                                <td><?= date("d/m/Y", strtotime($timestamp)) ?></td>
                                <td class="text-right">
                                    <a href="<?= Url::to(['/school/parents/view', 'id'=>$parent_id])?>" class="btn btn-link btn-info"><i class="fa fa-heart"></i></a>
                                    <a href="<?= Url::to(['/school/parents/update', 'id'=>$parent_id])?>" class="btn btn-link btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?= Url::to(['/school/parents/delete', 'id'=>$parent_id])?>" class="btn btn-link btn-danger" data-method="post" data-confirm="Are you sure you want to delete this record?"><i class="fa fa-times"></i></a>
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
