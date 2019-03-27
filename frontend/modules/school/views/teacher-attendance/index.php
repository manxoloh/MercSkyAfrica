<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\TeacherAttendance;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TeacherAttendanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teacher Attendances';
$this->params['breadcrumbs'][] = $this->title;
?>

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
                                <th>Name</th>
                                <?php for($i=1; $i<=date("t"); $i++ ){ ?>
                                <th><?= $i ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <?php for($i=1; $i<=date("t"); $i++ ){ ?>
                                <th><?= $i ?></th>
                                <?php } ?>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $no=1; foreach ($teachers as $teacher){ 
                                $firstname = $teacher['firstname'];
                                $lastname = $teacher['lastname'];
                            ?>
                            <tr>
                                <td><?= $no++  ?>.</td>
                                <td><?= $firstname." ". $lastname  ?></td>
                                <?php for($i=1; $i<=date("t"); $i++ ){
                                    $present = TeacherAttendance::find()->where(['date'=>date("Y-m-d", strtotime(date("Y-m-".$i)))])->andWhere(['teacher_id'=>$teacher['id']])->one();
                                ?>
                                    
                                    <td><?= $present ? '<p class="text-success"><b>&check;</b></p>' : '<p class="text-danger"><i>x</i></p>' ?></td>
                                
                                <?php } ?>
                            </tr>
							<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
