<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "colors".
 *
 * @property string $name Название
 * @property string $code Код
 *
 * @property Furniture[] $furnitures
 */
class Colors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'colors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'code'], 'string', 'max' => 100],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Название'),
            'code' => Yii::t('app', 'Код'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFurnitures()
    {
        return $this->hasMany(Furniture::className(), ['color' => 'name']);
    }
}
