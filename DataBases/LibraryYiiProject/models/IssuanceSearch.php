<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Issuance;

/**
 * IssuanceSearch represents the model behind the search form of `app\models\Issuance`.
 */
class IssuanceSearch extends Issuance
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_book', 'id_user'], 'integer'],
            [['start_date', 'must_date', 'finish_date'], 'safe'],
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
        $query = Issuance::find();

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
            'id_book' => $this->id_book,
            'id_user' => $this->id_user,
            'start_date' => $this->start_date,
            'must_date' => $this->must_date,
            'finish_date' => $this->finish_date,
        ]);

        return $dataProvider;
    }

    public function searchForUser($params)
    {
        $query = Issuance::find()->where(['id_user' => $params['id']]);

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
            'id_book' => $this->id_book,
            'id_user' => $this->id_user,
            'start_date' => $this->start_date,
            'must_date' => $this->must_date,
            'finish_date' => $this->finish_date,
        ]);

        return $dataProvider;
    }
}
