<?php

namespace app\models;

use yii\db\ActiveRecord;

class Author extends ActiveRecord
{
    public $id;
    public $name;
    public $birth_day;
    public $biography;

    public static function tableName()
    {
        return 'authors'; 
    }
}