<?php

namespace app\models;
use Yii;
use app\models\Author;
use yii\data\ActiveDataProvider;




class repAuthor extends Author
{

    public $new_id;
    public $new_name;

    public function rules()
    {
        return [
            [['name'], 'string'],
            [['id'], 'integer']
        ];
    }
    public function attributeLabels()
    {
        return [
            'name'=> 'Имя',
            'id'=> 'id'
        ];
    }

    public function search($params)
    {
        $query = Author::find()->joinWith('books');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['author.id' => $this->id]);
        $query->andFilterWhere(['like', 'author.name', $this->name]);

        return $dataProvider;
    }
}