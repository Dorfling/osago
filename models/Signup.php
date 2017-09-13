<?php

namespace app\models;

use yii\base\Model;

/**
 * Class Signup Модель регистрации
 * @package app\models
 */
class Signup extends Model
{

    /**
     * Количество секунд в году
     */
    const YEAR = 31536000;


    public $email;
    public $password;

    public $name;
    public $surname;
    public $patronymic;
    public $birth_date;
    public $sex;
    public $phone_num;

    /**
     * Правила валидации
     * @return array
     */
    public function rules()
    {
        return [
            [['email', 'password', 'name', 'surname', 'patronymic', 'birth_date', 'sex', 'phone_num'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User'],
            ['password', 'string', 'min' => 2, 'max' => 10],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 30],
            ['birth_date', 'dateValidate'],
            ['phone_num', 'string', 'max' => 20],
        ];
    }

    /**
     * Метод сохранения пользователя в БД
     */
    public function signup()
    {
        // Данные для входа
        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->save();

        // Данные профиля пользователя
        $profile = new Profile();
        $profile->name = $this->name;
        $profile->surname = $this->surname;
        $profile->patronymic = $this->patronymic;
        $profile->birth_date = $this->dateConversion($this->birth_date);
        $profile->sex = $this->sex;
        $profile->phone_num = $this->phone_num;
        $profile->user_id = $user->id;
        $profile->save();
    }

    /**
     * Надписи формы регитрации
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'password' => 'Пароль',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'birth_date' => 'Дата рождения',
            'sex' => 'Пол',
            'phone_num' => 'Номер телефона',
        ];
    }

    /**
     * Переформатирование даты из 25/03/1991(д/м/г) в 1991-03-25(г-м-д)
     * @param $date
     * @return string
     */
    private function dateConversion($date)
    {
        $day = substr($date, 0, 2);
        $month = substr($date, 3, 2);
        $year = substr($date, 6);
        return $year . '-' . $month . '-' . $day;
    }

    /**
     * Проверка валидности даты рождение
     * @param $attribute
     * @param $params
     */
    public function dateValidate($attribute, $params)
    {
        $day = (int)substr($this->$attribute, 0, 2);
        $month = (int)substr($this->$attribute, 3, 2);
        $year = (int)substr($this->$attribute, 6);

        if (!(
            $day > 0 && $day <= 31 &&
            $month > 0 && $month <= 12 &&
            $year > 1900 && $year <= getdate(time() - self::YEAR * 18)['year']
        )) {
            $this->addError($attribute, 'Не корректная дата рождения');
        }
    }

}