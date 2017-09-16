<?php

use yii\db\Migration;

/**
 * Handles the creation of table `policy`.
 */
class m170916_142903_create_policy_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('policy', [
            'id' => $this->primaryKey(),
            'brand' => $this->string(20)->notNull(),
            'model' => $this->string(20)->notNull(),
            'vin' => $this->string(17)->notNull(),
            'registr_plate' => $this->string(9)->notNull(),
            'pts_number' => $this->string(6)->notNull(),
            'pts_serial' => $this->string(4)->notNull(),
            'start_date' => $this->date()->notNull(),
            'end_date' => $this->date()->notNull(),
            'sum' => $this->integer(7)->notNull(),
            'id_user_inf' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('policy');
    }
}
