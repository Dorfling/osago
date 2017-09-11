<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_inf`.
 */
class m170911_111523_create_user_inf_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_inf', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30),
            'surname' => $this->string(30),
            'patronymic' => $this->string(30),
            'birth_date' => $this->date(),
            'sex' => $this->boolean(),
            'phone_num' => $this->string(20),
            'id_users' => $this->integer(11),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_inf');
    }
}
