<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Classes;

/**
 * ClassesSearch represents the model behind the search form of `common\models\Classes`.
 */
class ClassesSearch extends Classes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_id'], 'integer'],
            [['class_name', 'created_at'], 'safe'],
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
        $query = Classes::find();

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
            'class_id' => $this->class_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'class_name', $this->class_name]);

        return $dataProvider;
    }
}
