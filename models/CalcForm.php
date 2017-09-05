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


    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->age = Age::getItemsFields();
        $this->open = Open::getItemsFields();
        $this->period = Period::getItemsFields();
        $this->power = Power::getItemsFields();
        $this->territory = Territory::getItemsFields();
    }

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

}