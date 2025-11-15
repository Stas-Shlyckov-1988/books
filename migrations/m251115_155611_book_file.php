<?php

use yii\db\Migration;

class m251115_155611_book_file extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // ALTER TABLE `book` CHANGE COLUMN `file` `file` LONGBLOB NULL AFTER `year`;
        \Yii::$app->db->createCommand('ALTER TABLE `book` CHANGE COLUMN `file` `file` LONGBLOB NULL AFTER `year`;')
            ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m251115_155611_book_file cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251115_155611_book_file cannot be reverted.\n";

        return false;
    }
    */
}
