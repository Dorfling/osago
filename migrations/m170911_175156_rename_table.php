<?php

use yii\db\Migration;

class m170911_175156_rename_table extends Migration
{
    public function safeUp()
    {
        $this->renameTable('user_inf', 'profile');
    }

    public function safeDown()
    {
        $this->renameTable('profile', 'user_inf');
    }
}
