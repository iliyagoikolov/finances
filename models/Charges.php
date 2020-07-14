<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "charges".
 *
 * @property string $id
 * @property string $name
 * @property string $category
 * @property string $amount
 * @property string $description
 * @property string $date
 * @property string $user_id
 *
 * @property Users $user
 */
class Charges extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'charges';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category', 'amount', 'user_id'], 'required'],
            [['amount', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['date'],  'trim'],
            [['date'], 'default', 'value' => (new \DateTime())->format('Y/m/d')],
            [['date'],  'datetime', 'format' => 'php:Y/m/d'],
            [['name', 'category'], 'string', 'max' => 40],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'category' => 'Категория',
            'amount' => 'Сумма, руб.',
            'description' => 'Описание',
            'date' => 'Дата (YYYY/MM/DD)',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
