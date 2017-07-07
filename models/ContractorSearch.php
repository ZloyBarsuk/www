<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contractor;

/**
 * ContractorSearch represents the model behind the search form about `app\models\Contractor`.
 */
class ContractorSearch extends Contractor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contractor_id', 'created_by'], 'integer'],
            [['name_ua', 'name_en', 'signature', 'created_at', 'contractor_type'], 'safe'],
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
        $query = Contractor::find();

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
            'contractor_id' => $this->contractor_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'name_ua', $this->name_ua])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'signature', $this->signature])
          //  ->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'contractor_type', $this->contractor_type]);

        return $dataProvider;
    }


}
