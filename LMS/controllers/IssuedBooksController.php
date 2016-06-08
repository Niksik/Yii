<?php

namespace app\controllers;

use Yii;
use app\models\IssuedBooks;
use app\models\IssuedBooksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
/**
 * IssuedBooksController implements the CRUD actions for IssuedBooks model.
 */
class IssuedBooksController extends Controller
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
     * Lists all IssuedBooks models.
     * @return mixed
     */
    public function actionIndex()
    {
		checkUser();
		$this->layout = 'adminLayout';
        $searchModel = new IssuedBooksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

	public function actionUpdateStatus($id)
	{
		checkUser();
		$query = Yii::$app->db
		->createCommand("UPDATE issuedBooks SET status='I' WHERE issueId=:id")
		->bindValue(':id', $id)
		->execute();
		
		return $this->redirect(Url::to(['index']));
		           
	}
    /**
     * Displays a single IssuedBooks model.
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
     * Creates a new IssuedBooks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		checkUser();
	    $model = new IssuedBooks();
        $model->username = Yii::$app->session['username'];
		$model->status = 'O';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->issueId]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IssuedBooks model.
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
            return $this->redirect(['view', 'id' => $model->issueId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IssuedBooks model.
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
     * Finds the IssuedBooks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IssuedBooks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
		checkUser();
		$this->layout = 'adminLayout';
        if (($model = IssuedBooks::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
