<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StudentAttendance;

/**
 * StudentAttendanceSearch represents the model behind the search form of `common\models\StudentAttendance`.
 */
class StudentAttendanceSearch extends StudentAttendance
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_attendance_id', 'student_id', 'updated_by'], 'integer'],
            [['date', 'time', 'last_update'], 'safe'],
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
        $query = StudentAttendance::find();

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
            'student_attendance_id' => $this->student_attendance_id,
            'student_id' => $this->student_id,
            'date' => $this->date,
            'time' => $this->time,
            'last_update' => $this->last_update,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
}
