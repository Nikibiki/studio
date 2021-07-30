<?php

namespace app\controllers;

use Yii;
use app\models\tables\StudentGroupe;
use app\models\filters\StudentGroupeSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentGroupeController implements the CRUD actions for StudentGroupe model.
 */
class StudentGroupeController extends Controller
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
     * Lists all StudentGroupe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentGroupeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        echo '<pre>';
//        var_dump($dataProvider);
//        die();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StudentGroupe model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = StudentGroupe::find()
            ->where(['groupe_id' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $model,
        ]);

        return $this->render('view', [
            'model' => StudentGroupe::findOne(['groupe_id' => $id]),
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new StudentGroupe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->request->isPost){
            $model = new StudentGroupe();
            $model->load(Yii::$app->request->post());
            $model->validate();
            if(!$model->hasErrors()){
                $data = $model->toArray();
                $students_id = $data['student_id'];
                $group_id = $data['groupe_id'];
                foreach( $students_id as $student_id ){
                    $model = new StudentGroupe([
                        'student_id' => $student_id,
                        'groupe_id' => $group_id
                    ]);
                    $model->save(false);
                }
                return $this->redirect('index');
            }
        }

        $model = new StudentGroupe();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing StudentGroupe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        if(Yii::$app->request->isPost){
            $model = new StudentGroupe();
            $model->load(Yii::$app->request->post());
            $model->validate();
            if(!$model->hasErrors()){
                $data = $model->toArray();
                $students_id = $data['student_id'];
                $group_id = $data['groupe_id'];
                foreach( $students_id as $student_id ){
                    $student = StudentGroupe::findOne([
                        'student_id' => $student_id,
                        'groupe_id' => $group_id
                    ]);
                    if($student) continue;
                    $model = new StudentGroupe([
                        'student_id' => $student_id,
                        'groupe_id' => $group_id
                    ]);
                    $model->save(false);
                }
                return $this->redirect(['view', 'id' => $model->groupe_id]);
            }
        }

        $model = StudentGroupe::find()
            ->where(['groupe_id' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $model,
        ]);

        return $this->render('update', [
            'model' => StudentGroupe::findOne(['groupe_id' => $id]) ,
            'dataProvider' => $dataProvider

        ]);
    }

    /**
     * Deletes an existing StudentGroupe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $models = $this->findModels($id);
        foreach ($models as $model ){
            $model->delete();
        }

        return $this->redirect(['index']);
    }

    public function actionDeleteStudent($id){
        $this->findModel($id)->delete();
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the StudentGroupe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StudentGroupe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StudentGroupe::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModels($id)
    {
        if (($models = StudentGroupe::findAll(['groupe_id' => $id])) !== null) {
            return $models;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
