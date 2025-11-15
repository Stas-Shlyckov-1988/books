<?php

/** @var yii\web\View $this */
/** @var app\models\Author $author */
/** @var app\models\Book $book */
/** @var ActiveForm $form */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

$this->title = 'Админ';
$this->params['breadcrumbs'][] = $this->title;



?>
<style>
    .help-block {
        color: red;
    }
</style>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Страница для заполнения и редактирования книг:
    </p>

    <div class="Admin">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?php if(!empty($book->authorHasBooks)): ?>
                <ul class="list-group">
                <?php foreach($book->authorHasBooks as $model): ?>
                    <li class="list-group-item"><?= $model->author->fio ?></li>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?= $form->field($author, 'fio') ?>

    </div><!-- Admin -->

    <div class="Book">

            <?= $form->field($book, 'file')->fileInput(['class'=>'form-control']) ?>
            <?= $form->field($book, 'title') ?>
            <?= $form->field($book, 'year')
                ->widget(DatePicker::className(),[
                'dateFormat' => 'yyyy-MM-dd',
                'clientOptions' => [
                //     'dateFormat' => 'yy-mm-dd',
                    
                ],
                'options' => ['class' => 'form-control'],
                ])  
            ?>
        
            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>

    </div><!-- Book -->

    <code><?= __FILE__ ?></code>
</div>
