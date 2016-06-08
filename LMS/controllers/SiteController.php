<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Url;

class SiteController extends Controller
{
	
     
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
 public function updateEmailStatus($studentId)
	{
		Yii::$app->db->createCommand()->update('issuedbooks', [
					'sendEmail'=>'D',
				], 'idNumber =:id', [':id'=>$studentId])->execute();
	}
    public function actionIndex()
    {
			$link[1] = 'e';
		checkUser();
		$this->layout = "adminLayout";	
	   $results = Yii::$app->db
				 ->createCommand('select * from issuedBooks INNER JOIN students 
				                  On students.idNumber = issuedbooks.idNumber
				                  where dateToReturn < Now() and sendEmail != "D"')
				 ->queryAll();
				 
		/*foreach($results as $result){
			Yii::$app->mailer->compose()
			->setFrom('yanikblake@gmail.com')
			->setTo($result['email'])
			->setSubject('Over dued Book')
			->setTextBody('The book you have is overdued')
			->send();
			$this->updateEmailStatus($result['idNumber']);
		}
		*/
	
				
        return $this->render('index');
    }
   
    public function actionLogin($option = 0)
    {
		$model = new LoginForm();
		if($option!=1 || $model->load(Yii::$app->request->post())){
			if(Yii::$app->session['username'])
			{
				return $this->goBack();
			}
			
			if ($model->load(Yii::$app->request->post()) && $model->login()) {
				Yii::$app->session['username'] = $model->username;
			   
				return Yii::$app->getResponse()->redirect('index.php?site/index&id=1');
			}
			return $this->render('login', [
				'model' => $model, 
			]);
		}
		else
		{
			 $model->logout();
		}
        return $this->render('login', [
            'model' => $model, 
        ]);
    }

    public function actionLogout()
    {
		
		unset(Yii::$app->session['username']);
		Yii::$app->session->clear();
		Yii::$app->session->destroy();
        Yii::$app->user->logout();
        return $this->render['login'];
    }
	
	

}
