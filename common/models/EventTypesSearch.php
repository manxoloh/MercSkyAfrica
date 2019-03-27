<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EventTypes;

/**
 * EventTypesSearch represents the model behind the search form of `common\models\EventTypes`.
 */
class EventTypesSearch extends EventTypes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_type_id'], 'integer'],
            [['event_type_name'], 'safe'],
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
        $query = EventTypes::find();

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
            'event_type_id' => $this->event_type_id,
        ]);

        $query->andFilterWhere(['like', 'event_type_name', $this->event_type_name]);

        return $dataProvider;
    }
}
