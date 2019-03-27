<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BusinessContactsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Business Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <span class="pull-right">
    	<a href="<?= Url::to(['/business/contacts/create'])?>" class="btn btn-info details"><i class="fa fa-plus"></i> Add Contact</a>
 	   	<a href="<?= Url::to(['/business/contacts/import'])?>" class="btn btn-warning details"><i class="fa fa-file"></i> Import Contacts</a>
		<a href="<?= Url::to(['/business/contacts/bulk-sms'])?>" class="btn btn-success details"><i class="fa fa-plus"></i> Bulk SMS</a>
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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $id=1; foreach ($model as $contact){ ?>
                            <tr>
                                <td><?= $id++  ?>.</td>
                                <td><?= $contact['firstname']." ". $contact['lastname']  ?></td>
                                <td><span class="btn btn-xs btn-warning btn-outline"><?= $contact['phone'] ?></span></td>
                                <td><span class="btn btn-xs btn-info btn-outline"><?= $contact['email'] ?></span></td>
                                <td class="text-right">
                                    <a href="<?= Url::to(['/business/contacts/view', 'id'=>$contact['contact_id']])?>" class="btn btn-link btn-info details"><i class="fa fa-heart"></i></a>
                                    <a href="<?= Url::to(['/business/contacts/update', 'id'=>$contact['contact_id']])?>" class="btn btn-link btn-warning details"><i class="fa fa-edit"></i></a>
                                    <a href="<?= Url::to(['/business/contacts/delete', 'id'=>$contact['contact_id']])?>" class="btn btn-link btn-danger"  data-method="post" data-confirm="Are you sure you want to delete this record?"><i class="fa fa-times"></i></a>
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