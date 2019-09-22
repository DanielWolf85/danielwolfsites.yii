<?php

/* @var $this yii\web\View */

use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Главная';
?>
<div class="site-index">
    <!-- recent -->
    <section class="section-recent">
        <div class="container">
            <div class="row">
                <div class="recent-title col-lg-8 col-lg-offset-2 text-center">
                    <h2>Последние посты</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
        </div class="row">
        <div class="recent-posts col-lg-12">
            <div class="container">
                <div class="row">

                <?php   foreach($recents as $recent): ?>


                    <a href="<?= Url::to(['site/single', 'id' => $recent->id]); ?>">
                        <div class="post col-lg-3 col-md-6 col-xs-12">
                            <h3><?= $recent->title ?></h3>
                            <div class="img">
                                <img class="col-lg-12 col-md-12 col-xs-12" src="/uploads/<?= $recent->img ?>" alt="Фото поста">
                            </div>
                            <div class="post-date col-lg-8">
                                <span>Опубликовано: <?= $recent->date ?></span>
                                <!-- <hr> -->
                            </div>
                            <div class="post-text col-lg-12">
                                <p>
                                    <?= mb_substr($recent->content, 0, 90) . '...'  ?>
                                </p>

                                <div class="views" title="Просмотры">
                                    &#128065;
                                    <?= $recent->views ?>
                                </div>

                            </div>
                        </div>
                    </a>

                <?php endforeach; ?>

                </div>
                <div class="link-pager">
                <?php

                    echo LinkPager::widget([
                        'pagination' => $pages,
                        'prevPageLabel' => '&laquo; назад',
                        'nextPageLabel' => 'далее &raquo;',
                    ]);

                ?>

                </div>
            </div>
        </div>
</div>
</section>
</div>

<!-- recent -->

<!-- popular -->
<section class="section-popular">
    <div class="container">
        <div class="row">
            <div class="popular-title col-lg-8 col-lg-offset-2 text-center">
                <h2>Популярные посты</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="popular-posts col-lg-12">
            <div class="container">
                <div class="row">



                    <?php foreach($populars as $popular): ?>

                    <a href="<?= Url::to(['site/single', 'id' => $popular->id]) ?>" title="">
                        <div class="post col-lg-4 col-md-6 col-xs-12">
                            <h3><?= $popular->title ?></h3>
                            <div class="img">
                                <img class="col-lg-12 col-md-12 col-xs-12" src="/uploads/<?= $popular->img ?>" alt="Фото поста">
                            </div>
                            <div class="post-date col-lg-8">
                                <span>Опубликовано: <?= $popular->date ?></span>
                                <hr>
                            </div>
                            <div class="post-text col-lg-12">
                                <p><?= mb_substr($popular->content, 0, 130) . '...' ?></p>
                            </div>
                        </div>
                    </a>

                    <?php endforeach; ?>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- popular -->


</div>