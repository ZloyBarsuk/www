<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Numeration;

/**
 * NumerationSearch represents the model behind the search form about `app\models\Numeration`.
 */
class NumerationSearch extends Numeration
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dog_num_id', 'number', 'executor_id'], 'integer'],
            [['date'], 'safe'],
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
        $query = Numeration::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'dog_num_id' => $this->dog_num_id,
            'number' => $this->number,
            'executor_id' => $this->executor_id,
            'date' => $this->date,
        ]);

        return $dataProvider;
    }
}
