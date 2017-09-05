<?php

namespace app\models;

use yii\base\Model;


class CalcForm extends Model
{
    public $age;
    public $open;
    public $period;
    public $power;
    public $territory;


    public function rules()
    {
        return [
            [[ 'open', 'age', 'territory', 'power', 'period'], 'required' ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'open' => 'Неограниченный полис',
            'age' => 'Возраст/Стаж',
            'territory' => 'Город',
            'power' => 'Можность двигателя',
            'period' => 'Срок страхования',
        ];
    }

    /**
     * Расчет стоимости ОСАГО
     * @return bool|int
     */
    public function calculate()
    {
        if (!empty($this->age) || !empty($this->open) || !empty($this->period) || !empty($this->power) || !empty($this->territory)) {
            // Получение коэфицентов
            $k_age = Age::findOne($this->age)->coefficient;
            $k_open = Open::findOne($this->open)->coefficient;
            $k_period = Period::findOne($this->period)->coefficient;
            $k_power = Power::findOne($this->power)->coefficient;
            $k_territory = Territory::findOne($this->territory)->coefficient;

            $sum = 3432 * $k_age * $k_open * $k_period * $k_power * $k_territory;
            return (int) $sum;
        }
        return false;
    }

}