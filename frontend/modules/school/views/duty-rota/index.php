<?php

use common\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DutyRotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Duty Rotas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <span class="pull-right">
        	<?= Html::a('Create Duty Rota', ['create'], ['class' => 'btn btn-success details']) ?>
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
                                <th>Teacher</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Teacher</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach ($model as $duty) { 
                            $teacher = User::findOne($duty['teacher']);
                            ?>
                            <tr>
                                <td><?= $teacher->firstname." ".$teacher->lastname ?></td>
                                <td><?= $duty['start_date'] ?></td>
                                <td><?= $duty['end_date'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>