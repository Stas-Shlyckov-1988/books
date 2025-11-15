<?php

use yii\db\Schema;
use yii\db\Migration;

class m251115_065213_book extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('book', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'year' => Schema::TYPE_STRING . ' NOT NULL',
            'file' => Schema::TYPE_BINARY
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m251115_065213_book cannot be reverted.\n";

        $this->dropTable('book');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251115_065213_book cannot be reverted.\n";

        return false;
    }
    */
}
