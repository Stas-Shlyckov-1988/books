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

// $this->registerJsFile(
//     '@web/node_modules/jqueryui/jquery-ui.min.js',
//     ['depends' => [\yii\web\JqueryAsset::class]]
// );

// $this->registerCssFile("@web/node_modules/jqueryui/jquery-ui.min.css", [
//     'depends' => [\yii\web\JqueryAsset::class],
//     'media' => 'print',
// ], 'css-print-theme');

// $this->registerCssFile("@web/node_modules/jqueryui/jquery-ui.theme.min.css", [
//     'depends' => [\yii\web\JqueryAsset::class],
//     'media' => 'print',
// ], 'css-print-theme');

// $this->registerJs(<<<JS
//     $( function() {
//         $( "#book-year" ).datepicker();
//     } );

// JS
// );

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Страница для заполнения и редактирования книг:
    </p>

    <div class="Admin">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

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
