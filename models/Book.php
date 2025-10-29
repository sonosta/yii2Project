<?php

namespace app\models;

use yii\db\ActiveRecord;

class Book extends ActiveRecord
{
    public $id;
    public $title;
    public $author_id;
    public $publish_year;
    public $isbn;
    public $description;

    public static function tableName()
    {
        return 'books'; 
    }
}