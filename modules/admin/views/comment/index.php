<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Комментарии';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
  
    <div class="comment-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?php // echo Html::a('Create Comment', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'surname',
                'email:email',
                //'avatar',
                //'status',
                //'date',
                'content:ntext',
                //'article_id',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
  
</div>
