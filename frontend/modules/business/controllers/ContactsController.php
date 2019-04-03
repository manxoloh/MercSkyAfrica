<?php

namespace frontend\modules\business\controllers;

use Yii;
use common\models\BusinessContacts;
use common\models\Messages;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

/**
 * ContactsController implements the CRUD actions for BusinessContacts model.
 */
class ContactsController extends Controller
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
     * Lists all BusinessContacts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = BusinessContacts::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single BusinessContacts model.
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
     * Creates a new BusinessContacts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BusinessContacts();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->contact_id]);
        }
        
        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }
    public function actionBulkSms()
    {
        $model = new Messages();
        
        if ($model->load(Yii::$app->request->post())) {
            foreach (BusinessContacts::find()->all() as $contact){
                $basic  = new \Nexmo\Client\Credentials\Basic('83adfaa7', 'OwoOmVQJU5Tc6Qtn');
                $client = new \Nexmo\Client($basic);
                $message = $client->message()->send([
                    'to' => $contact['phone'],
                    'from' => 'Merc Sky Africa',
                    'text' => $model->message,
                ]);
                if ($message) {
                    Yii::$app->session->setFlash('success', 'Message send successfully');
                } else {
                    Yii::$app->session->setFlash('error', 'There was an error sending your message.');
                }
            }
            return $this->redirect(['index']);
        }
        
        return $this->renderAjax('business', [
            'model' => $model,
        ]);
    }
    
    public function actionImport()
    {
        $model = new BusinessContacts();
        
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $fileName = 'uploads/' . $model->file->baseName .rand(0, 1000000000). '.' . $model->file->extension;
            if($model->file->saveAs($fileName)){
                $data = \moonland\phpexcel\Excel::import($fileName); // $config is an optional
               
                foreach ($data as $rowData){
                    $contact = new BusinessContacts();
                    $contact->firstname = $rowData['firstname'];
                    $contact->lastname = $rowData['lastname'];
                    $contact->phone = "+254".$rowData['phone'];
                    $contact->email = $rowData['email'];
                    $contact->save();
                    continue;
                }
                Yii::$app->getSession()->setFlash('success', 'Contacts imported successfully');
                return $this->redirect(['index']);
            }
            else {
                Yii::$app->getSession()->setFlash('error', 'Contacts imported failed');
                return $this->redirect(['index']);
            }
        }
        
        return $this->renderAjax('import', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BusinessContacts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->contact_id]);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BusinessContacts model.
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
     * Finds the BusinessContacts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BusinessContacts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BusinessContacts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
