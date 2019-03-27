<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "classes".
 *
 * @property int $class_id
 * @property string $class_code
 * @property string $class_name
 * @property string $created_at
 *
 * @property Streams[] $streams
 * @property Students[] $students
 */
class Classes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_code', 'class_name'], 'required'],
            [['created_at'], 'safe'],
            [['class_code', 'class_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'class_id' => 'Class',
            'class_code' => 'Class Code',
            'class_name' => 'Class Name',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStreams()
    {
        return $this->hasMany(Streams::className(), ['class_id' => 'class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['class' => 'class_id']);
    }
}
