<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student_attendance".
 *
 * @property int $student_attendance_id
 * @property int $student_id
 * @property string $date
 * @property string $time
 * @property string $last_update
 * @property int $updated_by
 *
 * @property Students $student
 * @property User $updatedBy
 */
class StudentAttendance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_attendance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_attendance_id', 'student_id', 'date', 'time', 'updated_by'], 'required'],
            [['student_attendance_id', 'student_id', 'updated_by'], 'integer'],
            [['date', 'time', 'last_update'], 'safe'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['student_id' => 'student_id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_attendance_id' => 'Student Attendance ID',
            'student_id' => 'Student ID',
            'date' => 'Date',
            'time' => 'Time',
            'last_update' => 'Last Update',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Students::className(), ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
