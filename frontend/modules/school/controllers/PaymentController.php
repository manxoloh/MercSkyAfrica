<?php

namespace frontend\modules\school\controllers;

use Yii;
use common\models\Payments;
use common\models\PaymentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PaymentCategories;

/**
 * PaymentController implements the CRUD actions for Payments model.
 */
class PaymentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    /**
     * Lists all Payments models.
     * @return mixed
     */
    public function actionIndex($class_id=null)
    {
        if($class_id){
            $payments = Payments::find()->leftJoin('students', 'students.student_id=payments.payee_id')->where(['=', 'students.class', $class_id])->all();
        }else {
            $payments = Payments::find()->all();
        }
        
        return $this->render('index', [
            'payments' => $payments,
        ]);
    }
    
    /**
     * Displays a single Payments model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Creates a new Payments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Payments();
        
        if ($model->load(Yii::$app->request->post())) {
            $amount_paid = Payments::find()->where(['payee_id'=>$model->payee_id])->andWhere(['payment_cat_id'=>$model->payment_cat_id])->orderBy(['payment_id'=>SORT_DESC])->limit(1)->one();
            if($amount_paid){
                $model->balance = ($amount_paid->balance - $model->amount_paid);
            }else {
                $model->balance = (PaymentCategories::findOne($model->payment_cat_id)->amount - $model->amount_paid);
            }
            $model->updated_by = Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(Yii::$app->request->referrer);
        }
        
        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }
    
    /**
     * Updates an existing Payments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        }
        
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    /**
     * Deletes an existing Payments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        return $this->redirect(['index']);
    }
    
    /**
     * Finds the Payments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Payments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Payments::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
