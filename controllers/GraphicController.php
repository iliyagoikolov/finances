<?php

namespace app\controllers;
use yii\web\Controller;
use app\models\Charges;

class GraphicController extends Controller
{
    private function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    private function random_color() {
        return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
    }


    public function actionIndex()
    {
        //$model = new Charges();
        if (\Yii::$app->user->isGuest)
        {
            $this->goHome();
        }
        $colors = [];
        $user_id = \Yii::$app->user->id;
        $query = "SELECT `category` FROM `charges` WHERE `user_id` = :user_id GROUP BY `category` ORDER BY `category`";
        $categories = Charges::findBySql($query, [":user_id" => $user_id])->all();

        $query = "SELECT SUM(`amount`) as `amount`, `category` FROM `charges` WHERE `user_id` = :user_id GROUP BY `category` ORDER BY `category`";
        $summ = Charges::findBySql($query, [":user_id" => $user_id])->all();

        $query = "SELECT `category` FROM `charges` WHERE `user_id` = :user_id GROUP BY `category`";
        $count = Charges::findBySql($query, [":user_id" => $user_id])->count();

        for ($i = 0; $i<$count; $i++)
        {
            $colors[$i] = $this->random_color();
        }

        return $this->render('index', compact("categories", "summ", "colors"));
    }

}
