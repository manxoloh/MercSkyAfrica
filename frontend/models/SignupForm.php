<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $firstname;
    public $organization;
    public $lastname;
    public $phone;
    public $password;
    public $confirm_password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['organization', 'trim'],
            ['organization', 'required'],
            ['organization', 'string', 'min' => 2, 'max' => 255],
            
            
            ['firstname', 'trim'],
            ['firstname', 'required'],
            ['firstname', 'string', 'min' => 2, 'max' => 255],
            
            ['lastname', 'trim'],
            ['lastname', 'string', 'min' => 2, 'max' => 255],
            
            ['username', 'trim'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            
            ['phone', 'required'],
            ['phone', 'string', 'min' => 10, 'max'=>15],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            
            ['confirm_password', 'required'],
            ['confirm_password', 'compare', 'compareAttribute'=>'password']
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {        
        $user = new User();
        $user->user_type = "Organization";
        $user->organization = $this->organization;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->firstname = $this->organization;
        $user->lastname = $this->organization;
        $user->phone = $this->phone;
        $user->status = 0;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
