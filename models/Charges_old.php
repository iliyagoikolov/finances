<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "charges".
 *
 * @property string $id
 * @property string $name
 * @property string $category
 * @property string $amount
 * @property string $description
 * @property string $date
 */
class ChargesOld extends \yii\db\ActiveRecord
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
            [['name', 'category', 'amount'], 'required'],
            [['amount'], 'integer'],
            [['description'], 'string'],
            [['date'],  'datetime', 'format' => 'php:Y/m/d'],
            [['name', 'category'], 'string', 'max' => 40],
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
            'date' => 'Дата',
        ];
    }
}
