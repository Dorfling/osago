<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "territory".
 *
 * @property integer $id
 * @property string $territory_name
 * @property double $coefficient
 */
class Territory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'territory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['territory_name', 'coefficient'], 'required'],
            [['coefficient'], 'number'],
            [['territory_name'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'territory_name' => 'Territory Name',
            'coefficient' => 'Coefficient',
        ];
    }
}
