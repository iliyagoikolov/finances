<?php


namespace app\controllers;

use app\models\Category;
use Yii;
use yii\web\Controller;
use app\models\TestForm;

class PostController extends Controller
{
    public $layout = "MyTemplate";

    public function actionTest(){
        $this->view->title = "Тест";
        return $this->render("test");
    }

    public function actionShow(){
        $this->view->title = "Статья";

        //$cats = Category::find()->all(); // $cats->стоимость
        //$cats = Category::find()->asArray()->all(); // тогда как массив $cats['стоимость']
        //$cats = Category::find()->where("стоимость = 30")->all();
        $price = 50;
        $query = "SELECT * FROM `товары` WHERE `стоимость` = :price ";
        $cats = Category::findBySql($query, [":price" => $price]);
        


        return $this->render("show", compact("cats"));
    }

    public function actionIndex(){
        $this->view->title = "Статьи";

        $model = new TestForm();
        if ($model->load(Yii::$app->request->post()))
        {
            if ($model->validate())
            {
                Yii::$app->session->setFlash("success", "Данные приняты");
                return $this->refresh();
            }
            else
            {
                Yii::$app->session->setFlash("error", "Ошибка");
            }
        }
        return $this->render("index", ["model"=>$model]);
        //return $this->render("index", compact("model"));
    }
}