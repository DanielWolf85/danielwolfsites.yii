<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">

    <div class="article-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Добавить статью', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model, $key, $index, $widget) {
                return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
            },
        ]) ?>


    </div>

</div>