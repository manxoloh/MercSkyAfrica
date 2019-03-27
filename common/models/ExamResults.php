<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exam_results".
 *
 * @property int $result_id
 * @property int $student_id
 * @property int $session_id
 * @property int $subject_id
 * @property int $marks_scored
 * @property string $grade
 * @property string $remarks
 * @property int $updated_by
 * @property string $last_update
 *
 * @property AcademicSessions $session
 * @property Students $student
 * @property Subjects $subject
 * @property User $updatedBy
 */
class ExamResults extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exam_results';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'session_id', 'subject_id', 'marks_scored', 'grade', 'remarks', 'updated_by'], 'required'],
            [['student_id', 'session_id', 'subject_id', 'marks_scored', 'updated_by'], 'integer'],
            [['remarks'], 'string'],
            [['last_update'], 'safe'],
            [['grade'], 'string', 'max' => 255],
            [['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicSessions::className(), 'targetAttribute' => ['session_id' => 'session_id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['student_id' => 'student_id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['subject_id' => 'subject_id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'result_id' => 'Result ID',
            'student_id' => 'Student ID',
            'session_id' => 'Session ID',
            'subject_id' => 'Subject ID',
            'marks_scored' => 'Marks Scored',
            'grade' => 'Grade',
            'remarks' => 'Remarks',
            'updated_by' => 'Updated By',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession()
    {
        return $this->hasOne(AcademicSessions::className(), ['session_id' => 'session_id']);
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
    public function getSubject()
    {
        return $this->hasOne(Subjects::className(), ['subject_id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
