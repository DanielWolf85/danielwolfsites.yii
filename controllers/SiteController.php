<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\controllers\MainController;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Article;
use app\models\CommentsForm;
use app\models\MailToAdmin;
use yii\data\Pagination;


class SiteController extends MainController
{
    
    public $layout = 'daniel';
 
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Article::find()->orderBy(['date' => SORT_DESC]);
        
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $recents = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $populars = Article::find()->orderBy(['views' => SORT_DESC])->limit(3)->all();

        return $this->render('index', compact('recents', 'pages', 'populars'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionSingle($id)
    {
        // присваиваю $id текущее значение id из массива GET
        $id = Yii::$app->request->get('id');

        $article = new Article();

        // обращаемся к методу увеличения просмотров viewsProcess, передаем туда $id
        $article->viewsProcess($id);

        // выбираю из базы в $model статью
        $model = Article::findOne($id);

        // присваиваю $commentsModel модель формы комментариев
        $commentsModel = new CommentsForm();

        // выбираю все комментарии по $id статьи
        $commentsArticle = $article->getComments($id);

        // получаю кол-во комментариев
        $commentsCount = count($commentsArticle);
        $mailToAdmin = new MailToAdmin();

        if ($commentsModel->load(Yii::$app->request->post()) && $commentsModel->commentPost() && $mailToAdmin->contact(Yii::$app->params['adminEmail']))
        {

            $mailToAdmin->contact('danielvolf1985@gmail.com');

            return $this->refresh();
            
        }

        return $this->render('single', compact('model', 'commentsModel', 'commentsCount', 'commentsArticle'));
    }



    public function actionPolicy()
    {
        return $this->render('policy');
    }
}
