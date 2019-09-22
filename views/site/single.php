<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\data\ArrayDataProvider;
use yii\widgets\ListView;


$this->title = $model->title;


?>

<div class="site-single">
	<section class="section-post text-center">
		<div class="container">
			<div class="row">
				<div class="post-area col-lg-12">

					<div class="post-title col-lg-12">
						<h2><?= $model->title; ?></h2>
					</div>
					<div class="post-image col-lg-12">
						<img src="/uploads/<?= $model->img; ?>" alt="post-photo">
					</div>
					<div class="post-date col-lg-12">
						<p>Опубликовано: <?= $model->date; ?> </p>
					</div>
					<div class="post-text col-lg-12">
						<p> <?= $model->content; ?> </p>
					</div>

				</div>
			</div>
			<div class="row">

				<div class="my-comment-title">
					<h2>Комментарии</h2>
				</div>

				<!-- comments
	================================================== -->
				<div class="container">
					<div class="comments-wrap">

						<div id="comments" class="row">
							<div class="col-full">

								<h3 class="h3">Комментариев: <?= $commentsCount ?></h3>

								<?php foreach($commentsArticle as $comment): ?>

								<div class="comment__content col-lg-12 col-md-12 col-xs-12">
									<div class="row">
											<div class="comment__avatar col-lg-3 col-md-3 col-xs-3">
												<img width="50" height="50" class="avatar" src="http://www.gravatar.com/avatar/<?=  md5($comment->email) . '.jpg?s=' . 80; ?>" alt="Фото">
											</div>
											<div class="comment__info col-lg-9 col-md-9 col-xs-9">
												<cite><?= $comment->name . ' ' . $comment->surname; ?></cite>

												<div class="comment__meta">
													<time class="comment__time"><?= $comment->date ?></time>
													
												</div>
											</div>
										</div>

										<div class="row">
											<div  class="comment__text col-lg-12 col-md-12 col-xs-12">
												<p><?=  $comment->content ?></p>
											</div>
										</div>
										<hr class="hr">
									</div>


								<?php endforeach; ?>


							<?php
							// 	$db = Yii::$app->db;
							// 	$comments = $db->createCommand('
							// 	SELECT * FROM `comment` ORDER BY `id` DESC;
							// ')->queryAll();


							// 	$provider = new ArrayDataProvider([
							// 		'allModels' => $comments,
							// 		'pagination' => [
							// 			'pageSize' => 10,
							// 		]
							// 	]);


							// 	echo ListView::widget([
							// 		'dataProvider' => $provider,
							// 		'itemView' => function ($commentsModel, $key, $index, $widget) {
							// 			return $this->renderDynamic('
							// 				echo 
											
							// 			\'
											
												

						 // 					<div class="comment__content col-lg-12 col-md-12 col-xs-12">
							// 						<div class="row">
							// 							<div class="comment__avatar col-lg-3 col-md-3 col-xs-3">
							// 								<img width="50" height="50" class="avatar" src="http://www.gravatar.com/avatar/' . md5($commentsModel['email']) . '.jpg?s=' . 80 . '" alt="Фото">
							// 							</div>

							// 							<div class="comment__info col-lg-9 col-md-9 col-xs-9">
							// 								<cite>' . $commentsModel['name'] . ' ' . $commentsModel['surname'] . '</cite>

							// 								<div class="comment__meta">
							// 									<time class="comment__time">' . $commentsModel['date'] . '</time>
																
							// 								</div>
							// 							</div>
							// 						</div>

							// 						<div class="row">
							// 							<div  class="comment__text col-lg-12 col-md-12 col-xs-12">
							// 								<p>' . $commentsModel['content'] . '</p>
							// 							</div>
							// 						</div>
							// 						<hr class="hr">
							// 					</div> -->
												
											
							// 			\';
											
											
											
							// 			');
							// 		},
							// 		'emptyText' => 'Нет пока комментариев. Будьте первым!',

							// 	])


								?>








								<!-- respond
				================================================== -->


								<div class="respond">

									<h3 class="h2">Добавить комментарий</h3>



									<?php $form = ActiveForm::begin([
										'id' => 'post-comment-form',
										'options' => ['class' => 'form-horizontal'],
										'fieldConfig' => [
											'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
											'labelOptions' => ['class' => 'col-lg-1 control-label'],
										],
									]);

									$field = $form->field($commentsModel, 'name', [
										'inputOptions' => [
											'placeholder' => $commentsModel->getAttributeLabel('name'),
										],
									])->label(false);

									echo $field;

									$field = $form->field($commentsModel, 'surname', [
										'inputOptions' => [
											'placeholder' => $commentsModel->getAttributeLabel('surname'),
										],
									])->label(false);

									echo $field;

									$field = $form->field($commentsModel, 'email', [
										'inputOptions' => [
											'placeholder' => $commentsModel->getAttributeLabel('email'),
										],
									])->label(false);

									echo $field;

									$field = $form->field($commentsModel, 'content', [
										'inputOptions' => [
											'placeholder' => $commentsModel->getAttributeLabel('content'),
										],
									])->label(false);
									$field->textArea([
										'rows' => '6'
									]);

									echo $field;


									echo '<div class="form-group">';
									echo '<div class="col-lg-11">';
									echo Html::submitButton('Отправить', ['class' => 'btn btn-success']);
									echo '</div>';
									echo '</div>';

									ActiveForm::end();


									?>


								</div> <!-- end respond -->

							</div> <!-- end col-full -->

						</div> <!-- end row comments -->
					</div> <!-- end comments-wrap -->
				</div>
			</div>
		</div>
	</section>
</div>