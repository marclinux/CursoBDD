<?php

namespace backend\controllers;

use common\models\Categorias;
use common\models\search\CategoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii;

/**
 * CategoriasController implements the CRUD actions for Categorias model.
 */
class CategoriasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Categorias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoriasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categorias model.
     * @param int $id ID
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
     * Creates a new Categorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categorias();
        $sinCategoria = ArrayHelper::map([['id' => 0, 
        'NombreCategoria' => '--sin categoria padre']], 'id', 'NombreCategoria');
        $categorias_padre = ArrayHelper::merge($sinCategoria,
        ArrayHelper::map(Categorias::findAll(['Activo' => true]),
        'id', 'NombreCategoria'));

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->Activo = 1;
                $model->save();
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'categorias_padre' => $categorias_padre,
        ]);
    }

    /**
     * Updates an existing Categorias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $sinCategoria = ArrayHelper::map([['id' => 0, 
        'NombreCategoria' => '--sin categoria padre']], 'id', 'NombreCategoria');
        $categorias_padre = ArrayHelper::merge($sinCategoria,
        ArrayHelper::map(Categorias::find()
                    ->where(['Activo' => true])
                    ->andWhere(['<>', 'id', $id])
                    ->all(),
        'id', 'NombreCategoria'));

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'categorias_padre' => $categorias_padre,
        ]);
    }

    /**
     * Deletes an existing Categorias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categorias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Categorias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categorias::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
