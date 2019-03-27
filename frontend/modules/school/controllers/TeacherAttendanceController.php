<?php

namespace frontend\modules\school\controllers;

use Yii;
use common\models\TeacherAttendance;
use common\models\TeacherAttendanceSearch;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use common\models\Students;

/**
 * TeacherAttendanceController implements the CRUD actions for TeacherAttendance model.
 */
class TeacherAttendanceController extends Controller
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
     * Lists all TeacherAttendance models.
     * @return mixed
     */
    public function actionIndex()
    {
        $teachers = User::find()->where(['user_type'=>'Teacher'])->all();
        
        return $this->render('index', [
            'teachers' => $teachers,
        ]);
    }

    public function actionTemplate(){        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $i = 1;
        foreach (User::find()->all() as $teacher){
            $c = $i++;
            $sheet->setCellValue('A'.$c, $teacher['id']);
            $sheet->setCellValue('B'.$c, $teacher['firstname']." ".$teacher['lastname']);
            $sheet->setCellValue('C'.$c, "Select");
            
            $spreadsheet->getActiveSheet()->getStyle('A'.$c)
            ->getProtection()
            ->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
            $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
            
            $validation = $spreadsheet->getActiveSheet()->getCell('C'.$c)->getDataValidation();
            $validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
            $validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
            $validation->setAllowBlank(false);
            $validation->setShowDropDown(true);
            $validation->setPromptTitle('Pick from list');
            $validation->setPrompt('Please pick a value from the drop-down list.');
            $validation->setFormula1('"Present, Absent"'); // Make sure to put the list items between " and " if your list is simply a comma-separated list of values !!!
            
        }
        
        $writer = new Xlsx($spreadsheet);
        $writer->save('attendanceSheet.xlsx');
    }
    /**
     * Displays a single TeacherAttendance model.
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
     * Creates a new TeacherAttendance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TeacherAttendance();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->student_attendance_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TeacherAttendance model.
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
     * Deletes an existing TeacherAttendance model.
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
     * Finds the TeacherAttendance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TeacherAttendance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TeacherAttendance::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
