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
            [['birth_date'], 'date', 'format' => 'php:Y-m-d'],
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

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->birth_date = Yii::$app->formatter->asDate($this->birth_date, 'php:Y-m-d');
            $this->name = $this->name;
            $this->biography = $this->biography;
            return true;
        }
        return false;
    }
}