<?php

use yii\db\Migration;

/**
 * Handles the creation of table `age`.
 */
class m170904_140012_create_age_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('age' , [
            'id' => $this->primaryKey(),
            'name_age' => $this->string(80)->notNull(),
            'coefficient' => $this->float()->notNull(),
        ]);

        $this->insert('age', [
            'name_age' => 'До 22 лет включительно со стажем вождения до 3 лет включительно',
            'coefficient' => 1.8
        ]);
        $this->insert('age', [
            'name_age' => 'Более 22 лет со стажем вождения до 3 лет включительно',
            'coefficient' => 1.7
        ]);
        $this->insert('age', [
            'name_age' => 'До 22 лет включительно со стажем вождения свыше 3 лет',
            'coefficient' => 1.6
        ]);
        $this->insert('age', [
            'name_age' => 'Более 22 лет со стажем вождения свыше 3 лет',
            'coefficient' => 1
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->truncateTable('age');
        $this->dropTable('age');
    }
}
