<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "duty_rota".
 *
 * @property int $duty_id
 * @property int $teacher
 * @property string $start_date
 * @property string $end_date
 * @property int $session
 *
 * @property AcademicSessions $session0
 */
class DutyRota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'duty_rota';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teacher', 'start_date', 'end_date', 'session'], 'required'],
            [['teacher', 'session'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['session'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicSessions::className(), 'targetAttribute' => ['session' => 'session_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'duty_id' => 'Duty ID',
            'teacher' => 'Teacher',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'session' => 'Session',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession0()
    {
        return $this->hasOne(AcademicSessions::className(), ['session_id' => 'session']);
    }
}
