<?php

use yii\db\Migration;

class m170912_145014_rename_column extends Migration
{
    public function safeUp()
    {
        return $this->renameColumn('profile', 'id_users', 'user_id');
    }

    public function safeDown()
    {
        return $this->renameColumn('profile', 'user_id', 'id_users');
    }
}
