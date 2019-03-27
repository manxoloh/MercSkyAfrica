<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StudentSubjects;

/**
 * StudentSubjectsSearch represents the model behind the search form of `common\models\StudentSubjects`.
 */
class StudentSubjectsSearch extends StudentSubjects
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_subject_id', 'subject_id', 'student_id'], 'integer'],
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
        $query = StudentSubjects::find();

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
            'student_subject_id' => $this->student_subject_id,
            'subject_id' => $this->subject_id,
            'student_id' => $this->student_id,
        ]);

        return $dataProvider;
    }
}
