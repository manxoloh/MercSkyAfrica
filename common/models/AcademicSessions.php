<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "academic_sessions".
 *
 * @property int $session_id
 * @property string $session_title
 * @property string $starting_from
 * @property string $ending_on
 * @property string $last_update
 *
 * @property ExamResults[] $examResults
 */
class AcademicSessions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'academic_sessions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['session_title', 'starting_from', 'ending_on'], 'required'],
            [['starting_from', 'ending_on', 'last_update'], 'safe'],
            [['session_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'session_id' => 'Session ID',
            'session_title' => 'Session Title',
            'starting_from' => 'Starting From',
            'ending_on' => 'Ending On',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamResults()
    {
        return $this->hasMany(ExamResults::className(), ['session_id' => 'session_id']);
    }
}
