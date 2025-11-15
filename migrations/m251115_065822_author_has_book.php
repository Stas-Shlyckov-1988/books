<?php

use yii\db\Migration;

class m251115_065822_author_has_book extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('author_has_book', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'book_id' => $this->integer(),
        ]);

        // add foreign key for table `author`
        $this->addForeignKey(
            'fk-post-author_id',
            'author_has_book',
            'author_id',
            'author',
            'id',
            'CASCADE'
        );

        // add foreign key for table `book`
        $this->addForeignKey(
            'fk-book-book_id',
            'author_has_book',
            'book_id',
            'book',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m251115_065822_author_has_book cannot be reverted.\n";

        $this->dropTable('author_has_book');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251115_065822_author_has_book cannot be reverted.\n";

        return false;
    }
    */
}
