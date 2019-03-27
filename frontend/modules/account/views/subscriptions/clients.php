<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\User;
use common\models\Subscriptions;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subscription';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-md-12">
        <span class="pull-right">
        	<a class="btn btn-info details" href="<?= Url::to(['/account/subscriptions/create'])?>" title="Renew subscription">New Subscription</a>
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
                                <th>Organization</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Amount (KES)</th>
                                <th>SMS Quantity</th>
                                <th>Used SMS</th>
                                <th>Remaining SMS</th>
                                <th>Start Date</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Organization</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Amount (KES)</th>
                                <th>SMS Quantity</th>
                                <th>Used SMS</th>
                                <th>Remaining SMS</th>
                                <th>Start Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i=1; foreach ($clients as $client){ ?>
                            <tr>
                        <td><?= $i++  ?></td>
                                <td><?= $client['organization']  ?></td>
                                <td><?= $client['phone'] ?></td>
                                <td><?= $client['email'] ?></td>
                                <td class="text-info"><?= number_format(Subscriptions::find()->where(['owner'=>$client])->sum('amount'), 2) ?></td>
                                <td class="text-success"><?= number_format(Subscriptions::find()->where(['owner'=>$client])->sum('sms_quantity'), 2) ?></td>
                                <td class="text-danger"><?= number_format(Subscriptions::find()->where(['owner'=>$client])->sum('used_sms'), 2) ?></td>
                                <td class="text-warning"><?= number_format(Subscriptions::find()->where(['owner'=>$client])->sum('remaining_sms'), 2) ?></td>
                                <td><?= date("d/m/Y", $client['created_at']) ?></td>
                                <td class="text-right">
                                    <a href="<?= Url::to(['/communications/messages/quick', 'id'=>$client['id']])?>" class="btn btn-link btn-info details" title="Send a reminder"><i class="fa fa-bell"></i></a>
                                <?php if ($client['status'] == 10) { ?> 
                                    <a href="<?= Url::to(['/account/subscriptions/status', 'id'=>$client['id'], 'status'=>0])?>" class="btn btn-link btn-danger" title="Deactivate Account" data-method="post" data-confirm="Are you sure you want to deactivate this account"><i class="fa fa-times"></i></a>
                                <?php } else { ?>    
                                	<a href="<?= Url::to(['/account/subscriptions/status', 'id'=>$client['id'],'status'=>10])?>" class="btn btn-link btn-success"  title="Activate Account" data-method="post" data-confirm="Are you sure you want to activate this account"><i class="fa fa-check"></i></a>
                            	<?php } ?>
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
