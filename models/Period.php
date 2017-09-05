<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "period".
 *
 * @property integer $id
 * @property string $period_name
 * @property double $coefficient
 */
class Period extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'period';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['period_name', 'coefficient'], 'required'],
            [['coefficient'], 'number'],
            [['period_name'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'period_name' => 'Period Name',
            'coefficient' => 'Coefficient',
        ];
    }
}
