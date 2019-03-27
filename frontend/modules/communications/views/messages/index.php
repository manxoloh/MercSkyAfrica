<?php

use common\models\Classes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\Parents;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MessagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messages';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <span class="  pull-right">
        	<a href="<?= Url::to(['/communications/messages/create'])?>" class="btn btn-success details"><i class="fa fa-comments"></i> Bulk SMS</a>
			<a href="<?= Url::to(['/communications/messages/quick'])?>" class="btn btn-info details"><i class="fa fa-comment"></i> Quick SMS</a>
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
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Timestamp</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $id=1; foreach ($model as $message){ ?>
                            <tr>
                                <td><?= $id++  ?>.</td>
                                <td><span class="btn btn-xs btn-warning btn-outline"><?= $message['recipient'] ?></span></td>
                                <td><?= $message['message'] ?></td>
                                <td><?= $message['timestamp']  ?></td>
                            </tr>
							<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
