<?php

use yii\db\Schema;
use yii\db\Migration;

class m151213_031900_user extends Migration
{
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
        
            'id' => Schema::TYPE_PK,  
            'username' => Schema::TYPE_STRING . ' NOT NULL',  
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',    
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL', //密码  
            'password_reset_token' => Schema::TYPE_STRING,  
            'email' => Schema::TYPE_STRING . ' NOT NULL',  
            'role' => Schema::TYPE_INTEGER . ' NOT NULL',  
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',  
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',  
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL'
        ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}