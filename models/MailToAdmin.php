<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Article;

/**
 * ContactForm is the model behind the contact form.
 */
class MailToAdmin extends Model
{
    public $name = 'Ваш сайт';
    public $email = 'user@mail.com';
    public $subject = 'У Вас новый комментарий!';
    public $body = 'Вашу запись прокомментировали';
    // public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            // ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        $article = new Article();
        $model = $article->getViewedArticleId();
        $post = Yii::$app->request->post();
        $commentAutor = $post['CommentsForm']['name'] . ' ' . $post['CommentsForm']['surname'];
        $autorEmail = $post['CommentsForm']['email'];
        $commentText = $post['CommentsForm']['content'];

        
        $this->body = '

           У Вашей статьи "' . $model->title . '" новый комментарий! 
           Комментирует ' . $commentAutor . ' (' . $autorEmail . ') :
            ' . $commentText . '

        ';

        // if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                // ->setReplyTo($this->email)
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        // }
        // return false;
    }


    
}
