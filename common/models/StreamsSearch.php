<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Streams;

/**
 * StreamsSearch represents the model behind the search form of `common\models\Streams`.
 */
class StreamsSearch extends Streams
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stream_id', 'class_id'], 'integer'],
            [['stream_name', 'created_at'], 'safe'],
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
        $query = Streams::find();

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
            'stream_id' => $this->stream_id,
            'class_id' => $this->class_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'stream_name', $this->stream_name]);

        return $dataProvider;
    }
}
