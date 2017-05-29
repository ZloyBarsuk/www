<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Banks;

/**
 * BanksSearch represents the model behind the search form about `app\models\Banks`.
 */
class BanksSearch extends Banks
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank_id', 'created_by'], 'integer'],
            [['name_ua', 'name_en', 'adress_official_ua', 'adress_official_en', 'adress_post_ua', 'adress_post_en', 'created_at'], 'safe'],
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
        $query = Banks::find();

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
            'bank_id' => $this->bank_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'name_ua', $this->name_ua])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'adress_official_ua', $this->adress_official_ua])
            ->andFilterWhere(['like', 'adress_official_en', $this->adress_official_en])
            ->andFilterWhere(['like', 'adress_post_ua', $this->adress_post_ua])
            ->andFilterWhere(['like', 'adress_post_en', $this->adress_post_en]);

        return $dataProvider;
    }
}
