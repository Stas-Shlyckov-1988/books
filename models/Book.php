<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $title
 * @property string $year
 * @property resource|null $file
 *
 * @property AuthorHasBook[] $authorHasBooks
 */
class Book extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file'], 'default', 'value' => null],
            [['title', 'year'], 'required'],
            [['title'], 'unique'],
            [['file'], 'string'],
            [['title', 'year'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название книги',
            'year' => 'Год издания',
            'file' => 'Файл (Книга)',
        ];
    }

    /**
     * Gets query for [[AuthorHasBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorHasBooks()
    {
        return $this->hasMany(AuthorHasBook::class, ['book_id' => 'id']);
    }

    public function getAuthorsList() {
        $text = [];
        foreach($this->authorHasBooks as $model) {
            $text[] = $model->author->fio;
        }
        return implode(', ', $text);
    }

}
