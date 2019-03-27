<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property int $payment_id
 * @property int $payment_cat_id
 * @property double $amount_paid
 * @property double $balance
 * @property int $payee_id
 * @property string $payment_date
 * @property string $last_update
 * @property int $updated_by
 * @property string $reference_number
 * @property int $payment_method
 *
 * @property Students $payee
 * @property PaymentCategories $paymentCat
 * @property User $updatedBy
 * @property PaymentMethods $paymentMethod
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_cat_id', 'amount_paid', 'balance', 'payee_id', 'updated_by', 'reference_number', 'payment_method'], 'required'],
            [['payment_cat_id', 'payee_id', 'updated_by', 'payment_method'], 'integer'],
            [['amount_paid', 'balance'], 'number'],
            [['payment_date', 'last_update'], 'safe'],
            [['reference_number'], 'string', 'max' => 255],
            [['payee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['payee_id' => 'student_id']],
            [['payment_cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentCategories::className(), 'targetAttribute' => ['payment_cat_id' => 'payment_cat_id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['payment_method'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentMethods::className(), 'targetAttribute' => ['payment_method' => 'payment_method_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => 'Payment ID',
            'payment_cat_id' => 'Payment Cat ID',
            'amount_paid' => 'Amount Paid',
            'balance' => 'Balance',
            'payee_id' => 'Payee ID',
            'payment_date' => 'Payment Date',
            'last_update' => 'Last Update',
            'updated_by' => 'Updated By',
            'reference_number' => 'Reference Number',
            'payment_method' => 'Payment Method',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayee()
    {
        return $this->hasOne(Students::className(), ['student_id' => 'payee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentCat()
    {
        return $this->hasOne(PaymentCategories::className(), ['payment_cat_id' => 'payment_cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentMethod()
    {
        return $this->hasOne(PaymentMethods::className(), ['payment_method_id' => 'payment_method']);
    }
}
