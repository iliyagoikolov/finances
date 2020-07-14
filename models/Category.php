<?php


namespace app\models;



use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    static public function tableName()
    {
        return "товары";
    }
}