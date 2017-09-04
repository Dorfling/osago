<?php

use yii\db\Migration;

/**
 * Handles the creation of table `k_power`.
 */
class m170904_134039_create_k_power_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('k_power' , [
            'id' => $this->primaryKey(),
            'power_name' => $this->string(40)->notNull(),
            'coefficient' => $this->float()->notNull(),
        ]);

        $this->insert('k_power', ['power_name' => 'До 50 включительно',             'coefficient' =>  0.6]);
        $this->insert('k_power', ['power_name' => 'Свыше 50 до 70 включительно',    'coefficient' =>  1]);
        $this->insert('k_power', ['power_name' => 'Свыше 70 до 100 включительно',   'coefficient' =>  1.1]);
        $this->insert('k_power', ['power_name' => 'Свыше 100 до 120 включительно',  'coefficient' =>  1.2]);
        $this->insert('k_power', ['power_name' => 'Свыше 120 до 150 включительно',  'coefficient' =>  1.4]);
        $this->insert('k_power', ['power_name' => 'Свыше 150',                      'coefficient' =>  1.6]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->truncateTable('k_power');
        $this->dropTable('k_power');
    }
}
