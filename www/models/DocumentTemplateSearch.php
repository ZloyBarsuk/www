<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DocumentTemplate;

/**
 * DocumentTemplateSearch represents the model behind the search form about `app\models\DocumentTemplate`.
 */
class DocumentTemplateSearch extends DocumentTemplate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doc_templ_id', 'contractor_id'], 'integer'],
            [['name', 'path_to_template', 'document_type', 'date'], 'safe'],
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
        $query = DocumentTemplate::find();

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
            'doc_templ_id' => $this->doc_templ_id,
            'contractor_id' => $this->contractor_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'path_to_template', $this->path_to_template])
            ->andFilterWhere(['like', 'document_type', $this->document_type]);

        return $dataProvider;
    }
}
