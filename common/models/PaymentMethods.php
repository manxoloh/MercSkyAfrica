<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment_methods".
 *
 * @property int $payment_method_id
 * @property string $payment_method
 */
class PaymentMethods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_methods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_method'], 'required'],
            [['payment_method'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'payment_method_id' => 'Payment Method ID',
            'payment_method' => 'Payment Method',
        ];
    }
}
