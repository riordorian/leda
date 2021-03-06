<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "furniture".
 *
 * @property int $id Id
 * @property string $xml_id Артикул
 * @property string $name Название
 * @property string $color Цвет
 * @property double $width Ширина
 * @property double $height Высота
 * @property string $unit Единицы измерения
 * @property double $price Цена
 * @property double $discount Скидка %
 * @property int $tax НДС %
 * @property double $total_price Итоговая цена
 * @property int $amount Количество
 *
 * @property Colors $color0
 * @property Units $unit0
 */
class Furniture extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'furniture';
    }


	/**
	 * @return string
	 */
    public static function entityLabel()
    {
        return 'Фурнитура';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'color', 'unit', 'price', 'total_price'], 'required'],
            [['width', 'height', 'price', 'discount', 'total_price'], 'number'],
            [['tax', 'amount'], 'integer'],
            [['xml_id', 'color', 'unit'], 'string', 'max' => 30],
            [['name'], 'string', 'max' => 100],
            [['color'], 'exist', 'skipOnError' => true, 'targetClass' => Colors::className(), 'targetAttribute' => ['color' => 'name']],
            [['unit'], 'exist', 'skipOnError' => true, 'targetClass' => Units::className(), 'targetAttribute' => ['unit' => 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Id'),
            'xml_id' => Yii::t('app', 'Артикул'),
            'name' => Yii::t('app', 'Название'),
            'color' => Yii::t('app', 'Цвет'),
            'width' => Yii::t('app', 'Ширина'),
            'height' => Yii::t('app', 'Высота'),
            'unit' => Yii::t('app', 'Единицы измерения'),
            'price' => Yii::t('app', 'Цена'),
            'discount' => Yii::t('app', 'Скидка %'),
            'tax' => Yii::t('app', 'НДС %'),
            'total_price' => Yii::t('app', 'Итоговая цена'),
            'amount' => Yii::t('app', 'Количество'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColor0()
    {
        return $this->hasOne(Colors::className(), ['name' => 'color']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit0()
    {
        return $this->hasOne(Units::className(), ['name' => 'unit']);
    }

	public function beforeSave($insert)
	{
		$price = (float)$this->price;
		$this->total_price = round(($price * (100 - (float)$this->discount) / 100) + $price * (float)$this->tax, 2, PHP_ROUND_HALF_EVEN);

		return parent::beforeSave($insert); // TODO: Change the autogenerated stub
	}
}
