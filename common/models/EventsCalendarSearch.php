<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EventsCalendar;

/**
 * EventsCalendarSearch represents the model behind the search form of `common\models\EventsCalendar`.
 */
class EventsCalendarSearch extends EventsCalendar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'fee', 'event_type', 'created_by'], 'integer'],
            [['title', 'description', 'start_date', 'start_time', 'end_date', 'end_time', 'venue', 'created_at'], 'safe'],
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
        $query = EventsCalendar::find();

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
            'event_id' => $this->event_id,
            'start_date' => $this->start_date,
            'start_time' => $this->start_time,
            'end_date' => $this->end_date,
            'end_time' => $this->end_time,
            'fee' => $this->fee,
            'event_type' => $this->event_type,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'venue', $this->venue]);

        return $dataProvider;
    }
}
