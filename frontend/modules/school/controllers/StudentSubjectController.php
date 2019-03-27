<?php

namespace frontend\modules\school\controllers;

use Yii;
use common\models\StudentSubjects;
use common\models\StudentSubjectsSearch;
use common\models\Students;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentSubjectController implements the CRUD actions for StudentSubjects model.
 */
class StudentSubjectController extends Controller
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
     * Lists all StudentSubjects models.
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
     * Displays a single StudentSubjects model.
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
     * Creates a new StudentSubjects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($student=null)
    {
        $model = new StudentSubjects();
        if ($model->load(Yii::$app->request->post())) {
            foreach ($model->subject_id as $subject_id){
                $check = StudentSubjects::find()->where(['student_id'=>$student])->andWhere(['subject_id'=>$subject_id])->all();
                if (!$check){
                    $subject = new StudentSubjects();
                    $subject->student_id = $student;
                    $subject->subject_id = $subject_id;
                    $subject->save();
                }
            }
            
            Yii::$app->getSession()->setFlash('success', 'Subjects added successfully');
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'student'=>$student,
        ]);
    }

    /**
     * Updates an existing StudentSubjects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->student_subject_id]);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StudentSubjects model.
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
     * Finds the StudentSubjects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StudentSubjects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StudentSubjects::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
