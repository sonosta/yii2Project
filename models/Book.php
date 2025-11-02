<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Author;


class Book extends ActiveRecord
{
    public $new_id;
    public $new_title;
    public $new_author_id;
    public $new_publish_year;
    public $new_isbn;
    public $new_description;

    public static function tableName()
    {
        return 'books'; 
    }

    public function rules()
    {
        return [
            [['title'], 'required', 'message' => 'Поле "Наименование" обязательно для заполнения.'],
            [['author_id'], 'required', 'message' => 'Поле "Автор" обязательно для заполнения.'],
            [['isbn'], 'required', 'message' => 'Поле "ISBN" обязательно для заполнения.'],
            [['publish_year', 'author_id'], 'integer'],
            [['title', 'description'], 'string'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title'=> 'Наименование',
            'author_id'=> 'Автор',
            'publish_year'=> 'Дата публикации',
            'isbn'=> 'ISBN',
            'description'=> 'Описание'
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->publish_year = $this->publish_year;
            $this->title = $this->title;
            $this->author_id = $this->author_id;
            $this->isbn = $this->isbn;
            $this->description = $this->description;
            return true;
        }
        return false;
    }
}