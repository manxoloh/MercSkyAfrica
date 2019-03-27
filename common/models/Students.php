<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property int $student_id
 * @property string $admission_no
 * @property string $first_name
 * @property string $last_name
 * @property int $class
 * @property int $stream
 * @property int $parent
 * @property string $gender
 * @property string $timestamp
 *
 * @property Streams $stream0
 * @property Parents $parent0
 * @property Classes $class0
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admission_no', 'first_name', 'last_name', 'class', 'stream'], 'required'],
            [['class', 'stream', 'parent'], 'integer'],
            [['timestamp'], 'safe'],
            [['admission_no', 'first_name', 'last_name'], 'string', 'max' => 255],
            [['student_id'], 'unique'],
            [['stream'], 'exist', 'skipOnError' => true, 'targetClass' => Streams::className(), 'targetAttribute' => ['stream' => 'stream_id']],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Parents::className(), 'targetAttribute' => ['parent' => 'parent_id']],
            [['class'], 'exist', 'skipOnError' => true, 'targetClass' => Classes::className(), 'targetAttribute' => ['class' => 'class_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'admission_no' => 'Admission No',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'class' => 'Class',
            'stream' => 'Stream',
            'parent' => 'Parent',
            'gender' => 'Gender',
            'timestamp' => 'Timestamp',
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
    public function getParent0()
    {
        return $this->hasOne(Parents::className(), ['parent_id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass0()
    {
        return $this->hasOne(Classes::className(), ['class_id' => 'class']);
    }
}
