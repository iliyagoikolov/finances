<?php


namespace app\controllers;


use yii\web\Controller;

class MyController extends Controller
{
    public function actionIndex($id = null)
    {
        $hi = "Hello World!";
        $names = ["Goikolov", "Ilya", "Nikolaevich"];
        //return $this->render("index", ["hello" => $hi, "names" => $names]);
        return $this->render("index", compact("hi", "names", "id"));
    }

    public function actionBlogPost(){
        return "blog post";
    }
}