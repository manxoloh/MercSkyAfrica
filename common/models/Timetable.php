<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "timetable".
 *
 * @property int $tid
 * @property int $stream
 * @property int $subject
 * @property int $teacher
 * @property string $start_time
 * @property string $end_time
 * @property string $day
 * @property string $created_at
 *
 * @property Streams $stream0
 * @property Subjects $subject0
 * @property User $teacher0
 */
class Timetable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timetable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stream', 'subject', 'teacher', 'start_time', 'end_time', 'day'], 'required'],
            [['stream', 'subject', 'teacher'], 'integer'],
            [['start_time', 'end_time', 'created_at'], 'safe'],
            [['day'], 'string', 'max' => 255],
            [['stream'], 'exist', 'skipOnError' => true, 'targetClass' => Streams::className(), 'targetAttribute' => ['stream' => 'stream_id']],
            [['subject'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['subject' => 'subject_id']],
            [['teacher'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['teacher' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tid' => 'Tid',
            'stream' => 'Stream',
            'subject' => 'Subject',
            'teacher' => 'Teacher',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'day' => 'Day',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStream0()
    {
        return $this->hasOne(Streams::className(), ['stream_id' => 'stream']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject0()
    {
        return $this->hasOne(Subjects::className(), ['subject_id' => 'subject']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher0()
    {
        return $this->hasOne(User::className(), ['id' => 'teacher']);
    }
}
