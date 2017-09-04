<?php

use yii\db\Migration;

/**
 * Handles the creation of table `k_period`.
 */
class m170904_135101_create_k_period_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('k_period' , [
            'id' => $this->primaryKey(),
            'period_name' => $this->string(25)->notNull(),
            'coefficient' => $this->float()->notNull(),
        ]);

        $this->insert('k_period', ['period_name' => '3 месяца', 'coefficient' => 0.5]);
        $this->insert('k_period', ['period_name' => '4 месяца', 'coefficient' => 0.6]);
        $this->insert('k_period', ['period_name' => '5 месяцев', 'coefficient' => 0.65]);
        $this->insert('k_period', ['period_name' => '6 месяцев', 'coefficient' => 0.7]);
        $this->insert('k_period', ['period_name' => '7 месяцев', 'coefficient' => 0.8]);
        $this->insert('k_period', ['period_name' => '8 месяцев', 'coefficient' => 0.9]);
        $this->insert('k_period', ['period_name' => '9 месяцев', 'coefficient' => 0.95]);
        $this->insert('k_period', ['period_name' => '10 месяцев и более', 'coefficient' => 1]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->truncateTable('k_period');
        $this->dropTable('k_period');
    }
}
