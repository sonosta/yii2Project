<?php

namespace app\models;
use Yii;


class Author extends \yii\db\ActiveRecord
{
    public $new_id;
    public $new_name;
    public $new_birth_date;
    public $new_biography;

    public static function tableName()
    {
        return 'authors'; 
    }

    public function rules()
    {
        return [
            [['name'], 'required', 'message' => 'Поле "Имя" обязательно для заполнения.'],
            [['birth_date'], 'date', 'format' => 'php:d-m-Y'],
            [['biography', 'name'], 'string'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name'=> 'Имя',
            'birth_date'=> 'Дата рождения',
            'biography'=> 'Биография'
        ];
    }
}