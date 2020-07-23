<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);


        $this->createTable('{{%courses}}', [
            'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
            0 => 'PRIMARY KEY (`id`)',
            'title' => 'VARCHAR(255) NOT NULL',
            'description' => 'VARCHAR(255) NOT NULL',
            'duration' => 'SMALLINT(6) NOT NULL',
            'img_url' => 'VARCHAR(255) NOT NULL',
            'status' => 'SMALLINT(6) NOT NULL DEFAULT \'0\' COMMENT \'0 - not active, 1 active\'',
            'created_at' => 'INT(11) NOT NULL',
            'updated_at' => 'INT(11) NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%lessons}}', [
            'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
            0 => 'PRIMARY KEY (`id`)',
            'title' => 'VARCHAR(255) NOT NULL',
            'status' => 'SMALLINT(6) NOT NULL DEFAULT \'0\' COMMENT \'1 - free, 0 -not free\'',
            'created_at' => 'INT(11) NOT NULL',
            'updated_at' => 'INT(11) NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%payment}}', [
            'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
            0 => 'PRIMARY KEY (`id`)',
            'img' => 'VARCHAR(255) NOT NULL',
            'status' => 'SMALLINT(6) NULL DEFAULT \'0\' COMMENT \'0 - waiting, 1 active, 2  rejected \'',
            'created_by' => 'INT(11) NULL',
            'created_at' => 'INT(11) NULL',
            'updated_at' => 'INT(11) NULL',
        ], $tableOptions);

        $this->createTable('{{%sub_lessons}}', [
            'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
            0 => 'PRIMARY KEY (`id`)',
            'lesson_id' => 'INT(11) NOT NULL',
            'title' => 'VARCHAR(255) NOT NULL',
            'duration' => 'SMALLINT(6) NOT NULL',
            'file_url' => 'VARCHAR(255) NOT NULL',
            'file_type' => 'VARCHAR(255) NOT NULL',
            'status' => 'SMALLINT(6) NOT NULL DEFAULT \'0\' COMMENT \'1 -free, 0 - not free\'',
            'created_at' => 'INT(11) NOT NULL',
            'updated_at' => 'INT(11) NOT NULL',
        ], $tableOptions);


        $this->createIndex('idx_created_by_3237_00','payment','created_by',0);
        $this->createIndex('idx_UNIQUE_phone_326_01','user','phone',1);
        $this->createIndex('idx_UNIQUE_email_326_02','user','email',1);
        $this->createIndex('idx_UNIQUE_password_reset_token_326_03','user','password_reset_token',1);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_user_3233_00','{{%payment}}', 'created_by', '{{%user}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `courses`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `lessons`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `payment`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `sub_lessons`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `user`');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
