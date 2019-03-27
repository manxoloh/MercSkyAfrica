<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "business_contacts".
 *
 * @property int $contact_id
 * @property string $firstname
 * @property string $lastname
 * @property string $phone
 * @property string $email
 * @property string $created_at
 */
class BusinessContacts extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'business_contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'phone', 'email'], 'required'],
            [['created_at'], 'safe'],
            [['firstname', 'lastname', 'phone', 'email'], 'string', 'max' => 255],
            [['file'], 'file', 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'contact_id' => 'Contact ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'phone' => 'Phone',
            'email' => 'Email',
            'created_at' => 'Created At',
        ];
    }
}
