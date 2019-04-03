<?php

namespace frontend\modules\school\controllers;

use Yii;
use common\models\ExamResults;
use common\models\ExamResultsSearch;
use common\models\Students;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Codeception\Lib\Connector\Yii2;

/**
 * ExamResultController implements the CRUD actions for ExamResults model.
 */
class ExamResultController extends Controller
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
     * Lists all ExamResults models.
     * @return mixed
     */
    public function actionIndex($class_id=null)
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
     * Displays a single ExamResults model.
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
     * Creates a new ExamResults model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($student=null)
    {
        $model = new ExamResults();

        if ($model->load(Yii::$app->request->post())) {
            $marks_scored = $model->marks_scored;
            $subject_id = $model->subject_id;
            
            for($m = 0; $m<count($marks_scored); $m++){
                
                $marks[] =  [$student, 1, $subject_id[$m], $marks_scored[$m],  "A", $model->remarks, Yii::$app->user->identity->id];
            }
            
            $saveResults = Yii::$app->db->createCommand()
            ->batchInsert('exam_results',['student_id', 'session_id', 'subject_id', 'marks_scored', 'grade', 'remarks', 'updated_by'], $marks)
            ->execute();
            
            return $this->redirect(\Yii::$app->request->referrer);
        }
        
        return $this->renderAjax('create', [
            'model' => $model,
            'student'=>$student,
        ]);
    }

    /**
     * Updates an existing ExamResults model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->result_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ExamResults model.
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
     * Finds the ExamResults model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ExamResults the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ExamResults::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
