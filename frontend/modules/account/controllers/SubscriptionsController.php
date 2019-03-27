<?php

namespace frontend\modules\account\controllers;

use Yii;
use common\models\Subscriptions;
use common\models\SubscriptionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;

/**
 * SubscriptionsController implements the CRUD actions for Subscriptions model.
 */
class SubscriptionsController extends Controller
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
     * Lists all Subscriptions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubscriptionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subscriptions model.
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
     * Creates a new Subscriptions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Subscriptions();
        
        if ($model->load(Yii::$app->request->post())) {
            $model->used_sms = 0;
            $model->remaining_sms = $model->sms_quantity;
            $model->lastly_updated = \Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(\Yii::$app->request->referrer);
        }
        
        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }
    
    public function actionClients()
    {
        $clients = User::find()->where(['user_type'=>'Superadmin'])->orWhere(['user_type'=>'Organization'])->all();
        
        return $this->render('clients', [
            'clients' => $clients,
        ]);
    }
    
    public function actionStatus($id, $status)
    {
        $model = User::findOne($id);
        $model->status = $status;
        $model->save(false);
        
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Updates an existing Subscriptions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sub_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Subscriptions model.
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
     * Finds the Subscriptions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Subscriptions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subscriptions::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
