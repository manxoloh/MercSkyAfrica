<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ExamResults;

/**
 * ExamResultsSearch represents the model behind the search form of `common\models\ExamResults`.
 */
class ExamResultsSearch extends ExamResults
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['result_id', 'student_id', 'session_id', 'subject_id', 'marks_scored', 'updated_by'], 'integer'],
            [['grade', 'remarks', 'last_update'], 'safe'],
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
        $query = ExamResults::find();

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
            'result_id' => $this->result_id,
            'student_id' => $this->student_id,
            'session_id' => $this->session_id,
            'subject_id' => $this->subject_id,
            'marks_scored' => $this->marks_scored,
            'updated_by' => $this->updated_by,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'grade', $this->grade])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
