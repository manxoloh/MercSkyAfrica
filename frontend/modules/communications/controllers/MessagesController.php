<?php

namespace frontend\modules\communications\controllers;

use Yii;
use common\models\Messages;
use common\models\MessagesSearch;
use common\models\Students;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;

/**
 * MessagesController implements the CRUD actions for Messages model.
 */
class MessagesController extends Controller
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
     * Lists all Messages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Messages::find()->all();
        return $this->render('index', [
            'model'=>$model,
        ]);
    }
    public function actionList(){
        $list = Messages::find()->with('sender')->with('recipient')->orderBy('id DESC')->asArray()->all();
        return json_encode($list);
    }
    public function actionUnread(){
        $count = (int)Messages::find()->count();
        return json_encode($count);
    }

    /**
     * Displays a single Messages model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Messages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Messages();
        
        if ($model->load(Yii::$app->request->post())) {
            foreach ($model->recipient as $contact){
                foreach (Students::find()->where(['class'=>$contact])->with('parent0')->all() as $parent){
                    
                    $message = Messages::sendMessage($parent['parent0']['phone'], $model->message);
                    
                    if ($message) {
                        $text = new Messages();
                        $text->sender = Yii::$app->user->identity->id;
                        $text->recipient = $parent['parent0']['phone'];
                        $text->message = $model->message;
                        $text->title = "Group SMS";
                        $text->title = 1;
                        $text->save();
                        Yii::$app->session->setFlash('success', 'Message send successfully');
                    } else {
                        Yii::$app->session->setFlash('error', 'There was an error sending your message.');
                    }
                }
            }
            return $this->redirect(['create']);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }
    public function actionQuick($id=null)
    {
        $model = new Messages();
        if ($id) { 
            $user = User::findOne($id);
            $model->recipient = $user->phone;
            $model->message = "Hello ". $user->organization.", Please renew your SMS subscription to avoid disconnection";
        }else {
            $model->recipient = "+254";
        }
        
        if ($model->load(Yii::$app->request->post())) {
            $message = Messages::sendMessage($model->recipient, $model->message);            
            if ($message) {
                $text = new Messages();
                $text->sender = Yii::$app->user->identity->id;
                $text->recipient = $model->recipient;
                $text->message = $model->message;
                $text->title = "Individual SMS";
                $text->status = 1;
                $text->save();
                Yii::$app->session->setFlash('success', 'Message send successfully');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message. Please check your subscription SMS balance');
            }
            return $this->redirect(['index']);
        }
        
        return $this->renderAjax('quick', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Messages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Messages model.
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
     * Finds the Messages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Messages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Messages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
