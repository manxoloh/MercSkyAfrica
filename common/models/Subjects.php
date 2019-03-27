<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subjects".
 *
 * @property int $subject_id
 * @property string $subject_name
 * @property string $subject_code
 */
class Subjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subjects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_name', 'subject_code'], 'required'],
            [['subject_name', 'subject_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subject_id' => 'Subject ID',
            'subject_name' => 'Subject Name',
            'subject_code' => 'Subject Code',
        ];
    }
}
