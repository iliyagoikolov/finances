<?php

namespace app\controllers;

use app\models\RegisterForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

$GLOBALS["config"] = require __DIR__ . '/../config/web.php';

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
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

    /**
     * @inheritdoc
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        /*
         * $.ajax({
        url: 'index.php?r=site/about',
        success: function(e){
        alert(JSON.stringify(e));
        },
        error: function(e){
        alert(JSON.stringify(e));
        }
        });
         */
        //throw new \yii\base\Exception(var_dump(Yii::$app));
        //throw new \yii\base\Exception('FOR DEBUG:' . json_encode($GLOBALS["config"]));


        //throw new \yii\base\Exception('FOR DEBUG:' . "FLAG");
        return $this->render('about');
    }

    public function actionRegister()
    {
        $model = new RegisterForm();
        if (isset($_POST['RegisterForm']))
        {
            if ($model->load(Yii::$app->request->post()))
            {
                if ($model->validate())
                {
                    $user = $model->signUp();
                    Yii::$app->session->setFlash("success", "Данные приняты");
                    //$this->refresh();
                    if (isset($user))
                    {
                        Yii::$app->user->login($user);
                        $this->goHome();
                    }
                }
                else
                {
                    Yii::$app->session->setFlash("error", "Ошибка");
                }
            }
        }


        return $this->render('register', compact("model"));
    }
}
