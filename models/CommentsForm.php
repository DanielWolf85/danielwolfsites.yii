<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Query;
use app\models\Comment;
use app\models\Article;

class CommentsForm extends Model
{
    public $name = "Аноним";
    public $surname = "Фаноним";
    public $email = "anonim@mail.com";
    public $content;
    public $avatar = "pic.jpg";
    public $status = '1';
    public $date = '2019-08-12';


    public function rules()
    {
        return [
            [['content'], 'required'],
            [['name', 'surname'], 'string', 'max' => 50],
            [['content'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['status'], 'default', 'value' => 1],
            [['avatar'], 'safe'],
            [['article_id'], 'safe'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'email' => 'Email',
            'content' => 'Комментарий',
            'avatar' => 'Ваше фото',
            'status' => 'Статус комментария',
            'date' => 'Дата',
        ];
    }

    // Запись комментария в базу
    public function commentPost()
    {
        if ($this->validate())
        // если проходит валидацию
        {
            $article_id = Yii::$app->request->get('id');

            $db = Yii::$app->db;
            // фильтрую данные
            $nameSafe = htmlspecialchars($this->name, ENT_QUOTES, 'UTF-8');
            $surnameSafe = htmlspecialchars($this->surname, ENT_QUOTES, 'UTF-8');
            $emailSafe = htmlspecialchars($this->email, ENT_QUOTES, 'UTF-8');
            $contentSafe = htmlspecialchars($this->content, ENT_QUOTES, 'UTF-8');
            $avatarSafe = htmlspecialchars($this->avatar, ENT_QUOTES, 'UTF-8');
            $statusSafe = htmlspecialchars($this->status, ENT_QUOTES, 'UTF-8');
            $dateSafe = htmlspecialchars($this->date, ENT_QUOTES, 'UTF-8');
            // использую метод createCommand
            $db->createCommand()->insert('comment', [
                'name' => $nameSafe,
                'surname' => $surnameSafe,
                'email' => $emailSafe,
                'content' => $contentSafe,
                'avatar' => $avatarSafe,
                'status' => $statusSafe,
                'date' => $dateSafe,
                'article_id' => $article_id,
            ])->execute();
            // возвращаю true
            return true;
        }
        // если не проходит валидацию, возвращаю false
        return false;
    }


    // public function mainCommentsCount()
    // {
    //     return (new Comment())::find()->count();
    // }

}
