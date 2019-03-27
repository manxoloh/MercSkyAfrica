<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment_categories".
 *
 * @property int $payment_cat_id
 * @property string $payment_title
 * @property string $payment_decription
 * @property double $amount
 * @property string $last_update
 *
 * @property Payments[] $payments
 */
class PaymentCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_title', 'payment_decription', 'amount'], 'required'],
            [['payment_decription'], 'string'],
            [['amount'], 'number'],
            [['last_update'], 'safe'],
            [['payment_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'payment_cat_id' => 'Payment Cat ID',
            'payment_title' => 'Payment Title',
            'payment_decription' => 'Payment Decription',
            'amount' => 'Amount',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::className(), ['payment_cat_id' => 'payment_cat_id']);
    }
}
