<?php

namespace app\models;

use yii\base\Model;


class Login extends Model
{
    public $email;
    public $password;

    /**
     * Правила валидации
     * @return array
     */
    public function rules()
    {
        return [
            [['email','password'],'required'],
            ['email','email'],
            ['password','validatePassword']
        ];
    }

    /**
     * Обертка проверки пороля
     * @param $attribute
     * @param $params
     */
    public function validatePassword($attribute,$params)
    {
        if(!$this->hasErrors())
        {
            $user = $this->getUser();
            if(!$user || !$user->validatePassword($this->password))
            {
                $this->addError($attribute,'Пароль или имейл введены неверно');
            }
        }
    }

    /**
     * Возвращение пользователя по email
     * @return User
     */
    public function getUser()
    {
        return User::findOne(['email'=>$this->email]);
    }

}