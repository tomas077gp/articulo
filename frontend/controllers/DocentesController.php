<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Docentes;
use frontend\models\DocentesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DocentesController implements the CRUD actions for Docentes model.
 */
class DocentesController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Docentes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocentesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Docentes model.
     * @param integer $id_docente
     * @param integer $id_escuela
     * @return mixed
     */
    public function actionView($id_docente, $id_escuela)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_docente, $id_escuela),
        ]);
    }

    /**
     * Creates a new Docentes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Docentes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_docente' => $model->id_docente, 'id_escuela' => $model->id_escuela]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Docentes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_docente
     * @param integer $id_escuela
     * @return mixed
     */
    public function actionUpdate($id_docente, $id_escuela)
    {
        $model = $this->findModel($id_docente, $id_escuela);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_docente' => $model->id_docente, 'id_escuela' => $model->id_escuela]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Docentes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_docente
     * @param integer $id_escuela
     * @return mixed
     */
    public function actionDelete($id_docente, $id_escuela)
    {
        $this->findModel($id_docente, $id_escuela)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Docentes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_docente
     * @param integer $id_escuela
     * @return Docentes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_docente, $id_escuela)
    {
        if (($model = Docentes::findOne(['id_docente' => $id_docente, 'id_escuela' => $id_escuela])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
