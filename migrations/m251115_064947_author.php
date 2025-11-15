<?php

use yii\db\Schema;
use yii\db\Migration;

class m251115_064947_author extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('author', [
            'id' => Schema::TYPE_PK,
            'fio' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m251115_064947_author cannot be reverted.\n";

        $this->dropTable('author');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251115_064947_author cannot be reverted.\n";

        return false;
    }
    */
}
