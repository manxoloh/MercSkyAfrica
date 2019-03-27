<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "parents".
 *
 * @property int $parent_id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property string $gender
 * @property string $relationship
 * @property string $timestamp
 *
 * @property Students[] $students
 */
class Parents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone', 'relationship'], 'required'],
            [['timestamp'], 'safe'],
            [['first_name', 'last_name', 'phone', 'relationship'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'parent_id' => 'Parent ID',
            'first_name' => 'Guardian First Name',
            'last_name' => 'Guardian Last Name',
            'phone' => 'Guardian Phone',
            'email' => 'Guardian Email',
            'gender' => 'Guardian Gender',
            'relationship' => 'Relationship',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['parent' => 'parent_id']);
    }
}
