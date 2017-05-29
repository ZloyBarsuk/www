<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * ProductsSearch represents the model behind the search form about `app\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['products_id'], 'integer'],
            [['description_en', 'description_ua', 'part_number', 'country_origin_en', 'country_origin_ua', 'tarif_number_en', 'tarif_number_ua', 'weight', 'height', 'width', 'length', 'active', 'created_at'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Products::find();

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
            'products_id' => $this->products_id,
            'price' => $this->price,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'description_en', $this->description_en])
            ->andFilterWhere(['like', 'description_ua', $this->description_ua])
            ->andFilterWhere(['like', 'part_number', $this->part_number])
            ->andFilterWhere(['like', 'country_origin_en', $this->country_origin_en])
            ->andFilterWhere(['like', 'country_origin_ua', $this->country_origin_ua])
            ->andFilterWhere(['like', 'tarif_number_en', $this->tarif_number_en])
            ->andFilterWhere(['like', 'tarif_number_ua', $this->tarif_number_ua])
            ->andFilterWhere(['like', 'weight', $this->weight])
            ->andFilterWhere(['like', 'height', $this->height])
            ->andFilterWhere(['like', 'width', $this->width])
            ->andFilterWhere(['like', 'length', $this->length])
            ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
