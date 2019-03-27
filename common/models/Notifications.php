<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notifications".
 *
 * @property int $id
 * @property int $recipient
 * @property int $sender
 * @property string $type
 * @property string $title
 * @property string $notication
 * @property int $status
 * @property string $timestamp
 *
 * @property User $recipient0
 * @property User $sender0
 */
class Notifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipient', 'sender', 'type', 'title', 'notication', 'status'], 'required'],
            [['recipient', 'sender', 'status'], 'integer'],
            [['notication'], 'string'],
            [['timestamp'], 'safe'],
            [['type', 'title'], 'string', 'max' => 255],
            [['recipient'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['recipient' => 'id']],
            [['sender'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['sender' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recipient' => 'Recipient',
            'sender' => 'Sender',
            'type' => 'Type',
            'title' => 'Title',
            'notication' => 'Notication',
            'status' => 'Status',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipient0()
    {
        return $this->hasOne(User::className(), ['id' => 'recipient']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSender0()
    {
        return $this->hasOne(User::className(), ['id' => 'sender']);
    }
}
