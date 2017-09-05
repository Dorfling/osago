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
     * Возвращает массив для выпадающего списка
     * @return array массив вида ['id' => 'territory_name', ...]
     */
    public static function getItemsFields()
    {
        $items = Territory::find()->all();
        $result = [];
        foreach ($items as $item) {
            $result[$item['id']] = $item['territory_name'];
        }

        return $result;
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
