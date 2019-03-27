<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subscriptions".
 *
 * @property int $sub_id
 * @property int $owner
 * @property double $amount
 * @property int $sms_quantity
 * @property int $used_sms
 * @property int $remaining_sms
 * @property string $bought_on
 * @property string $lastly_updated
 *
 * @property User $owner0
 */
class Subscriptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscriptions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['owner', 'amount', 'sms_quantity', 'used_sms', 'remaining_sms'], 'required'],
            [['owner', 'sms_quantity', 'used_sms', 'remaining_sms'], 'integer'],
            [['amount'], 'number'],
            [['bought_on', 'lastly_updated'], 'safe'],
            [['owner'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['owner' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sub_id' => 'Sub ID',
            'owner' => 'Owner',
            'amount' => 'Amount',
            'sms_quantity' => 'Sms Quantity',
            'used_sms' => 'Used Sms',
            'remaining_sms' => 'Remaining Sms',
            'bought_on' => 'Bought On',
            'lastly_updated' => 'Lastly Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner0()
    {
        return $this->hasOne(User::className(), ['id' => 'owner']);
    }
}
