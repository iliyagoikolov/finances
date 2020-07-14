<?php


namespace app\controllers;
use yii\web\Controller;
use app\models\Charges;
use Yii;

class FinancesController extends Controller
{
    public function actionIndex()
    {
        $this->view->title = "Финансы";
        return $this->render("index");
    }

    public function actionAdd()
    {
        $model = new Charges();
        if (\Yii::$app->user->isGuest)
        {
            $this->goHome();
        }
        $model->date = (new \DateTime())->format('Y/m/d');
        if ($model->load(Yii::$app->request->post()))
        {

            $model->user_id = Yii::$app->user->id;
            if ($model->validate())
            {
                $model->save();
                Yii::$app->session->setFlash("success", "Данные приняты2");
                //$this->refresh();
            }
            else
            {
                Yii::$app->session->setFlash("error", "Ошибка2");
            }
        }

        return $this->render("add", compact("model"));
    }

}