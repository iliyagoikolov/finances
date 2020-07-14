<?php


namespace app\models;
use yii\base\Model;

class TestForm extends Model
{
    public $name;
    public $email;
    public $text;

    public function attributeLabels()
    {
        return [
            "name"=>"Имя",
            "email"=>"Электронная почта",
            "text"=>"Текст",
        ];
    }

    public function rules()
    {
        return [
            [["name", "email"], "required"],
            ["email", "email"],
            ["name", "string", "min"=>2, "tooShort" => "Имя слишком короткое"],
            ["name", "string", "max"=>20,"tooLong" => "Имя слишком длинное"],
            //["name", "string", "length" =>[2,5]],
            ["name", "myRule"],
            ["text", "trim"],
            ["text", "safe"],
        ];
    }

    public function myRule($attr)
    {
        if (!in_array($this->$attr, ["hello", "bye"]))
        {
            $this->addError($attr, "Wrong");
        }
    }
}
