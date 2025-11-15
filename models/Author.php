<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string $fio
 *
 * @property AuthorHasBook[] $authorHasBooks
 */
class Author extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio'], 'required'],
            [['fio'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
        ];
    }

    /**
     * Gets query for [[AuthorHasBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorHasBooks()
    {
        return $this->hasMany(AuthorHasBook::class, ['author_id' => 'id']);
    }

}
