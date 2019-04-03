<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\Classes;
use common\models\Students;
use common\models\PaymentMethods;
use common\models\PaymentCategories;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PaymentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <span class="pull-right">
            <a class="btn btn-success details" href="<?= Url::to(['/school/payment/create']) ?>">New Payment</a>
            <a class="btn btn-warning details" href="<?= Url::to(['/school/payment-category/create']) ?>">Payment Category</a>
            <?php foreach (Classes::find()->all() as $class) { ?>
            <a class="btn btn-info" href="<?= Url::to(['/school/payment', 'class_id'=>$class['class_id']]) ?>">
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
                                <th>No.</th>
                                <th>Payment Category</th>
                                <th>Student Name</th>
                                <th>Admission No</th>
                                <th>reference_number</th>
                                <th>Payment Method</th>
                                <th>Amount Paid (KES)</th>
                                <th>Balance (KES)</th>
                                <th>Payment Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Payment Category</th>
                                <th>Student Name</th>
                                <th>Admission No</th>
                                <th>reference_number</th>
                                <th>Payment Method</th>
                                <th>Amount Paid (KES)</th>
                                <th>Balance (KES)</th>
                                <th>Payment Date</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i=1; foreach ($payments as $payment){ 
                                $student = Students::findOne($payment['payee_id']);
                                ?>
                            <tr>
                                <td><?= $i++  ?></td>
                                <td class="text text-info"><?= PaymentCategories::findOne($payment['payment_cat_id'])->payment_title  ?></td>
                                <td><?=  $student->first_name." ".$student->last_name?></td>
                                <td class="text text-warning"><?=  $student->admission_no?></td>
                                <td><?= $payment['reference_number'] ?></td>
                                <td class="text text-primary"><?= PaymentMethods:: findOne($payment['payment_method'])->payment_method ?></td>
                                <td class="text text-success"><?= number_format($payment['amount_paid'], 2) ?></td>
                                <td class="text text-danger"><?= number_format($payment['balance'], 2) ?></td>
                                <td><?= date("d/m/Y", strtotime($payment['payment_date'])) ?></td>
                            </tr>
							<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
