<?php

namespace app\models;

use yii\db\ActiveRecord;

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
            [['publish_year'], 'date', 'format' => 'php:d-m-Y'],
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
}