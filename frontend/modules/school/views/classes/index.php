<?php

use common\models\Streams;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ClassesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Classes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <span class=" pull-right">
        	<a href="<?= Url::to(['/school/classes/create'])?>" class="btn btn-info"><i class="fa fa-plus"></i> Class</a>
         	<a href="<?= Url::to(['/school/streams/create'])?>" class="btn btn-info"><i class="fa fa-plus"></i> Stream</a>
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
                                <th>S/N</th>
                                <th>Class Name</th>
                                <th>Streams</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>Class Name</th>
                                <th>Streams</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($list as $class){ ?>
                            <tr>
                            <td><?= $class['class_code']?></td>
                            <td><?= $class['class_name']?></td>
                            <td>
                            	<ol>
                            	<?php foreach (Streams::find()->where(['class_id'=>$class['class_id']])->all() as $stream) { ?>
                            		<li><?= $stream['stream_name']?> </li>
                            	<?php } ?>
                            	</ol>
                        	</td>
                                <td class="text-right">
                                    <a href="<?= Url::to(['/school/classes/view', 'id'=>$class['class_id']])?>" class="btn btn-link btn-info"><i class="fa fa-heart"></i></a>
                                    <a href="<?= Url::to(['/school/classes/update', 'id'=>$class['class_id']])?>" class="btn btn-link btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?= Url::to(['/school/classes/delete', 'id'=>$class['class_id']])?>" class="btn btn-link btn-danger"  data-method="post" data-confirm="Are you sure you want to delete this record?"><i class="fa fa-times"></i></a>
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
