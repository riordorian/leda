<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Furniture;

/**
 * FurnitureSearch represents the model behind the search form of `\app\models\Furniture`.
 */
class FurnitureSearch extends Furniture
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tax', 'amount'], 'integer'],
            [['xml_id', 'name', 'color', 'unit'], 'safe'],
            [['width', 'height', 'price', 'discount', 'total_price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Furniture::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'width' => $this->width,
            'height' => $this->height,
            'price' => $this->price,
            'discount' => $this->discount,
            'tax' => $this->tax,
            'total_price' => $this->total_price,
            'amount' => $this->amount,
        ]);

        $query->andFilterWhere(['like', 'xml_id', $this->xml_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'unit', $this->unit]);

        return $dataProvider;
    }
}
