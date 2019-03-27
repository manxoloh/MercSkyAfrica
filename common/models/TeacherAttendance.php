<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teacher_attendance".
 *
 * @property int $student_attendance_id
 * @property int $teacher_id
 * @property string $date
 * @property string $time
 * @property string $last_update
 * @property int $updated_by
 *
 * @property User $teacher
 * @property User $updatedBy
 */
class TeacherAttendance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher_attendance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teacher_id', 'date', 'time', 'updated_by'], 'required'],
            [['teacher_id', 'updated_by'], 'integer'],
            [['date', 'time', 'last_update'], 'safe'],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['teacher_id' => 'id']],
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
            'teacher_id' => 'Teacher ID',
            'date' => 'Date',
            'time' => 'Time',
            'last_update' => 'Last Update',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(User::className(), ['id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
