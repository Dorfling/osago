<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "age".
 *
 * @property integer $id
 * @property string $name_age
 * @property double $coefficient
 */
class Age extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'age';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_age', 'coefficient'], 'required'],
            [['coefficient'], 'number'],
            [['name_age'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_age' => 'Name Age',
            'coefficient' => 'Coefficient',
        ];
    }

}
