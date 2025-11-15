<?php

/** @var yii\web\View $this */

$this->title = 'Книги';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Библиотека!</h1>

        <p class="lead">Выберите литература Вам понравившееся.</p>
    </div>

    <div class="body-content">

        <div class="row">
            <?php foreach($books as $book): ?>
            <div class="col-lg-4 mb-3">
                <h2><?= $book->title ?></h2>

                <p><?= $book->getAuthorsList() ?><br>
                <?= $book->year ?>.</p>

                <p>
                    <a class="btn btn-outline-secondary" href="/site/view?id=<?= $book->id ?>">Прочитать &raquo;</a>
                    <?php if(!\Yii::$app->user->isGuest): ?>
                        <a class="btn btn-outline-secondary" href="/site/admin?id=<?= $book->id ?>">Редактировать</a>
                    <?php endif; ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>
