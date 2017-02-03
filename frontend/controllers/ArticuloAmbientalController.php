<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Articulo;
use frontend\models\Escuelas;
use frontend\models\ArticuloSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * ArticuloController implements the CRUD actions for Articulo model.
 */
class ArticuloAmbientalController extends Controller
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
     * Lists all Articulo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticuloSearch();
        $dataProvider = $searchModel->searchambiental(Yii::$app->request->queryParams);
        $model = new Articulo();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }
    /**
     * Lists all Articulo models.
     * @return mixed
     */
    public function actionAnio($anio)
    {

     $escuelas = Escuelas::find()->all();

     foreach ($escuelas as $key => $escuelas) {
         echo '<tr>';
         $totalEscuela =  Articulo::find()->where([ 'id_escuela' => $escuelas->id_escuela])
                                          ->AndFilterWhere(['like','fecha_publicacion', $anio])
                                          ->sum('puntaje_articulo');
         $cantidadArticulo =  Articulo::find()->where(['id_escuela' => $escuelas->id_escuela])
                                              ->AndFilterWhere(['like','fecha_publicacion' , $anio])
                                              ->count('*');
         echo '<td>'.$escuelas->nombre_escuela.'</td>';
         echo '<td>'.$totalEscuela.'</td>';
         echo '<td>'.$cantidadArticulo.'</td>';
         echo '</tr>';

     }


    }

    /**
     * Displays a single Articulo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Articulo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Articulo();

        if ($model->load(Yii::$app->request->post()) ) {

            $nombre_articulo = $model->nombre_articulo;


            /*Consigue la direccion del archivo*/
            $nombre_articulo = $model->nombre_articulo;
            $model->file = UploadedFile::getInstance($model, 'file');

            if(!is_null($model->file)){



              $model->file->saveAs('upload/'.$nombre_articulo);
              $model->archivo = 'upload/'.$nombre_articulo;
              $model->save();

              return $this->redirect(['view', 'id' => $model->id_articulo]);


            }else{

              $model->save();
              return $this->redirect(['view', 'id' => $model->id_articulo]);
            }


        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Articulo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_articulo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Articulo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Articulo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articulo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articulo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
