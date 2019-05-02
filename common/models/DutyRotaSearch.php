<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DutyRota;

/**
 * DutyRotaSearch represents the model behind the search form of `common\models\DutyRota`.
 */
class DutyRotaSearch extends DutyRota
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['duty_id', 'teacher', 'session'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
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
        $query = DutyRota::find();

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
            'duty_id' => $this->duty_id,
            'teacher' => $this->teacher,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'session' => $this->session,
        ]);

        return $dataProvider;
    }
}
