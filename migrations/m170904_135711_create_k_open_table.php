<?php

use yii\db\Migration;

/**
 * Handles the creation of table `k_open`.
 */
class m170904_135711_create_k_open_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('k_open' , [
            'id' => $this->primaryKey(),
            'open_name' => $this->string(20)->notNull(),
            'coefficient' => $this->float()->notNull(),
        ]);

        $this->insert('k_open', ['open_name' => 'Ограничен',    'coefficient' => 1]);
        $this->insert('k_open', ['open_name' => 'Не ограничен', 'coefficient' => 1.8]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->truncateTable('k_open');
        $this->dropTable('k_open');
    }
}
