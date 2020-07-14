<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "users".
 *
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 */
class Users extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'username', 'password'], 'required'],
            [['first_name', 'last_name'], 'string', 'max' => 45],
            [['username'], 'string', 'max' => 15],
            [['password', 'auth_key', 'access_token'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }
}
