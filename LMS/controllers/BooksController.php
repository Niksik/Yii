<?php

namespace app\controllers;

use Yii;
use app\models\Books;
use app\models\booksSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * BooksController implements the CRUD actions for Books model.
 */
class BooksController extends Controller
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
     * Lists all Books models.
     * @return mixed
     */
    public function actionIndex()
    {
		checkUser();
		$this->layout = 'adminLayout';
        $searchModel = new booksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Books model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		checkUser();
		$this->layout = 'adminLayout';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Books model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		checkUser();
		$this->layout = 'adminLayout';
        $model = new Books();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bookId]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }
	public function actionNav()
    {
		
        $model = new Books();
       
    }

    /**
     * Updates an existing Books model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		checkUser();
		$this->layout = 'adminLayout';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bookId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Books model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		checkUser();
		$this->layout = 'adminLayout';
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Books model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Books the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
		checkUser();
		$this->layout = 'adminLayout';
        if (($model = Books::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
