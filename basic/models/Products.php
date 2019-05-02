<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id Id
 * @property string $name Название
 * @property string $xml_id Артикул
 * @property string $composition Состав
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'xml_id'], 'required'],
            [['composition'], 'string'],
            [['name', 'xml_id'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Id'),
            'name' => Yii::t('app', 'Название'),
            'xml_id' => Yii::t('app', 'Артикул'),
            'composition' => Yii::t('app', 'Состав'),
        ];
    }
}
