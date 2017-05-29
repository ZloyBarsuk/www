<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserAccounts;

/**
 * UserAccountsSearch represents the model behind the search form about `app\models\UserAccounts`.
 */
class UserAccountsSearch extends UserAccounts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'administrator', 'creator', 'blocked_at', 'confirmed_at', 'created_at', 'updated_at'], 'integer'],
            [['login', 'password_hash', 'auth_key', 'creator_ip', 'confirm_token', 'recovery_token'], 'safe'],
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
        $query = UserAccounts::find();

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
            'id' => $this->id,
            'administrator' => $this->administrator,
            'creator' => $this->creator,
            'blocked_at' => $this->blocked_at,
            'confirmed_at' => $this->confirmed_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'creator_ip', $this->creator_ip])
            ->andFilterWhere(['like', 'confirm_token', $this->confirm_token])
            ->andFilterWhere(['like', 'recovery_token', $this->recovery_token]);

        return $dataProvider;
    }
}
