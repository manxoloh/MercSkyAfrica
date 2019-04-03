<?php

namespace frontend\modules\school\controllers;

use Yii;
use common\models\EventsCalendar;
use common\models\EventsCalendarSearch;
use common\models\Students;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Messages;

/**
 * EventCalendarController implements the CRUD actions for EventsCalendar model.
 */
class EventCalendarController extends Controller
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
     * Lists all EventsCalendar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventsCalendarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EventsCalendar model.
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
     * Creates a new EventsCalendar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EventsCalendar();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_by = Yii::$app->user->identity->id;
            if($model->save()){
                foreach (Students::find()->with('parent0')->all() as $parent){
                    $text = "Dear Parent, we would like to inform you that our ". $model->title ." will be on ".$model->start_date." ".$model->start_time." at ".$model->venue.". Welcome";
                    $message = Messages::sendMessage($parent['parent0']['phone'], $text);
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
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EventsCalendar model.
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
     * Deletes an existing EventsCalendar model.
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
     * Finds the EventsCalendar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EventsCalendar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EventsCalendar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
