<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property int $sender
 * @property int $recipient
 * @property string $title
 * @property string $message
 * @property string $context
 * @property int $status
 * @property string $timestamp
 *
 * @property User $recipient0
 * @property User $sender0
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sender', 'recipient', 'title', 'message', 'status'], 'required'],
            [['sender', 'status'], 'integer'],
            [['message', 'recipient', 'context'], 'string'],
            [['timestamp'], 'safe'],
            [['title'], 'string', 'max' => 255],
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
            'sender' => 'Sender',
            'recipient' => 'Recipient',
            'title' => 'Title',
            'message' => 'Message',
            'context' => 'Context',
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
    
    public static function sendMessage($to, $text){
        $check = Subscriptions::find()->where(['owner'=>\Yii::$app->user->identity->id])->andWhere(['>', 'remaining_sms', 0])->orderBy(['sub_id'=>SORT_DESC])->one();
        if ($check) {
            $basic  = new \Nexmo\Client\Credentials\Basic('83adfaa7', 'OwoOmVQJU5Tc6Qtn');
            $client = new \Nexmo\Client($basic);
            $client->message()->send([
                'to' => $to,
                'from' => 'Merc Sky Africa',
                'text' => $text,
            ]);
            
            return true;
        }else{
            return false;
        }
    }
}
