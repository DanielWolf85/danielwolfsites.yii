<?php

namespace app\models;

use Yii;
use app\models\ImageUpload;
use yii\db\Expression;
use app\models\Comment;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $img
 * @property int $views
 * @property string $date
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['views'], 'default', 'value' => 0],
            [['title'], 'string', 'max' => 255],
            [['img', 'views'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'content' => 'Текст',
            'img' => 'Картинка',
            'views' => 'Просмотры',
            'date' => 'Дата публикации',
        ];
    }


    public function saveImage($filename)
    {
        $this->img = $filename;
        return $this->save(false);
    }


    public function getImage()
    {
        return ($this->img) ? '/uploads/' . $this->img : '/uploads/' . 'no-image.png';
    }


    protected function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->img);
    }

    // метод увеличения просмотров
    public function viewsProcess($id)
    {
        // обновляю поле views для определенной по полю id статьи и прибавляю ему +1 
        $this->updateAll(['views' => new Expression('views + 1')], ['id' => $id]);
    }


    public function getComments($id)
    {
        return Comment::find()->where(['article_id' => $id])->all();
    }


    public function getViewedArticleId()
    {
        // присваиваю $id текущее значение id из массива GET
        $id = Yii::$app->request->get('id');

        return $this->findOne($id);
    }



    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete();
    }
}
