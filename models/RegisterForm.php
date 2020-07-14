<?php


namespace app\models;
use yii\base\Model;
use Yii;

class RegisterForm extends Model
{
    public $first_name;
    public $last_name;
    public $username;
    public $password;
    public $password_again;

    public function attributeLabels()
    {
        return [
            "first_name"=>"Имя",
            "last_name"=>"Фамилия",
            "username"=>"Логин",
            "password"=>"Пароль",
            "password_again"=>"Пароль еще раз",
        ];
    }

    public function rules()
    {
        return [
            [["first_name", "last_name", "username", "password"], "required"],
           // ["name", "string", "min"=>2, "tooShort" => "Имя слишком короткое"],
            //["name", "string", "max"=>20,"tooLong" => "Имя слишком длинное"],
            //["name", "string", "length" =>[2,5]],
           // ["name", "myRule"],
            ['username', 'unique', 'targetClass' => 'app\models\Users'],
            [['first_name', 'last_name'], 'string', 'max' => 45, "min"=>2],
            [['username'], 'string', 'max' => 15],
            [['password', 'password_again'], 'string', 'max' => 32],
            ["password_again", "passCheck"],
            [['first_name', 'last_name'], "containsNumbers"]
        ];
    }

    public function passCheck($attr)
    {
        if ($this->$attr !== $this->password)
        {
            $this->addError($attr, "Пароли не совпадают");
        }


//        if (!in_array($this->$attr, ["hello", "bye"]))
//        {
//            $this->addError($attr, "Wrong");
//        }
    }

    public function containsNumbers($attr){

        if ($attr == "first_name")
        {
            $tmp = 'Имя не должно';
        }
        else
        {
            $tmp = 'Фамилия не должна';
        }

        if (preg_match('/\\d/', $this->$attr))
        {
            $this->addError($attr, $tmp." содержать чисел");
        }
    }

    public function signUp()
    {
        $user = new UserIdentity();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->username = $this->username;
        $user->password = md5($this->password);
        $user->auth_key = Yii::$app->security->generateRandomString();
        if ($user->save())
        {
            return $user;
        }
    }
}