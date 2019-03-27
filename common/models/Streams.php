<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "streams".
 *
 * @property int $stream_id
 * @property int $class_id
 * @property string $stream_code
 * @property string $stream_name
 * @property string $created_at
 *
 * @property Classes $class
 * @property Students[] $students
 */
class Streams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'streams';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_id', 'stream_code', 'stream_name'], 'required'],
            [['class_id'], 'integer'],
            [['created_at'], 'safe'],
            [['stream_code', 'stream_name'], 'string', 'max' => 255],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => Classes::className(), 'targetAttribute' => ['class_id' => 'class_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'stream_id' => 'Stream',
            'class_id' => 'Class',
            'stream_code' => 'Stream Code',
            'stream_name' => 'Stream Name',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(Classes::className(), ['class_id' => 'class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['stream' => 'stream_id']);
    }
}
