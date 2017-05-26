<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dogovor;

/**
 * DogovorSearch represents the model behind the search form about `app\models\Dogovor`.
 */
class DogovorSearch extends Dogovor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dogovor_id', 'id_executor', 'doc_template_id', 'id_contractor', 'id_bank_contractor', 'id_bank_executor', 'id_author'], 'integer'],
            [['dogovor_number', 'delivery_date', 'comments', 'created_date', 'closed_date', 'updated_date', 'status', 'folder_path'], 'safe'],
            [['total_summ'], 'number'],
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
        $query = Dogovor::find();

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
            'dogovor_id' => $this->dogovor_id,
            'id_executor' => $this->id_executor,
            'doc_template_id' => $this->doc_template_id,
            'id_contractor' => $this->id_contractor,
            'id_bank_contractor' => $this->id_bank_contractor,
            'id_bank_executor' => $this->id_bank_executor,
            'id_author' => $this->id_author,
            'delivery_date' => $this->delivery_date,
            'total_summ' => $this->total_summ,
            'created_date' => $this->created_date,
            'closed_date' => $this->closed_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'dogovor_number', $this->dogovor_number])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'folder_path', $this->folder_path]);

        return $dataProvider;
    }
}
