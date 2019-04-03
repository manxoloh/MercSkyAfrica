<?php

namespace frontend\modules\school\controllers;

use Yii;
use common\models\StudentAttendance;
use common\models\StudentAttendanceSearch;
use common\models\Students;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Streams;

/**
 * StudentAttendanceController implements the CRUD actions for StudentAttendance model.
 */
class StudentAttendanceController extends Controller
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
     * Lists all StudentAttendance models.
     * @return mixed
     */
    public function actionIndex($class_id=null, $date=null)
    {
        if ($class_id) {
            $students = Students::find()->where(['class'=>$class_id])->with('parent0')->with('class0')->with('stream0')->all();
        }else {
            $students = Students::find()->with('parent0')->with('class0')->with('stream0')->all();
        }
        return $this->render('index', [
            'students' => $students,
        ]);
    }

    /**
     * Displays a single StudentAttendance model.
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
     * Creates a new StudentAttendance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StudentAttendance();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->student_attendance_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }    
    public function actionStream($class)
    {
        $stream = Streams::find()->where(['class_id'=>$class])->one();
        
        if($stream){
            echo "<option value='".$stream->stream_id."'>".$stream->stream_name."</option>";
        }else{
            echo "<option>There is no stream_name in the selected class</option>";
        }
    }

    /**
     * Updates an existing StudentAttendance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->student_attendance_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StudentAttendance model.
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
     * Finds the StudentAttendance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StudentAttendance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StudentAttendance::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
