<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "open".
 *
 * @property integer $id
 * @property string $open_name
 * @property double $coefficient
 */
class Open extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'open';
    }

    /**
     * Возвращает массив для выпадающего списка
     * @return array массив вида ['id' => 'open_name', ...]
     */
    public static function getItemsFields()
    {
        $items = Open::find()->all();
        $result = [];
        foreach ($items as $item) {
            $result[$item['id']] = $item['open_name'];
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['open_name', 'coefficient'], 'required'],
            [['coefficient'], 'number'],
            [['open_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'open_name' => 'Open Name',
            'coefficient' => 'Coefficient',
        ];
    }
}
