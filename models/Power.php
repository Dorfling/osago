<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "power".
 *
 * @property integer $id
 * @property string $power_name
 * @property double $coefficient
 */
class Power extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'power';
    }

    /**
     * Возвращает массив для выпадающего списка
     * @return array массив вида ['id' => 'power_name', ...]
     */
    public static function getItemsFields()
    {
        $items = Power::find()->all();
        $result = [];
        foreach ($items as $item) {
            $result[$item['id']] = $item['power_name'];
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['power_name', 'coefficient'], 'required'],
            [['coefficient'], 'number'],
            [['power_name'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'power_name' => 'Power Name',
            'coefficient' => 'Coefficient',
        ];
    }
}
