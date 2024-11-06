<?php

/** @var yii\web\View $this */

use app\models\Role;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Добро пожаловать,
            <?= Yii::$app->user->identity->name ?? 'Гость'; ?>
        </h1>

        <p class="lead">Ваша роль:
            <?= !Yii::$app->user->isGuest
                ? $role_name['name']
                : 'гость'; ?>
        </p>

        <!-- <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>
    <? if (!empty($films)): ?>
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">

                <? foreach ($films as $film): ?>
                    <div class="carousel-item active">
                        <img src="./images/<?= $film['img']; ?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?= $film['title'] ?></h5>
                            <p><?= $film['descr'] ?></p>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
            </button>
        </div>
    <? endif; ?>

    <div class="body-content">
        <? if (!empty($films)): ?>
            <div class="row">
                <? foreach ($films as $film): ?>
                    <div class="col-lg-4 mb-3">
                        <img src="./images/<?= $film['img']; ?>" alt="">
                        <h2><?= $film['title'] ?></h2>

                        <p><?= $film['descr'] ?></p>
                        <strong>Жанр: <?= $film['genre_name'] ?></strong>

                        <p><a class="btn btn-outline-secondary" href="/web/films/view?id=<?= $film['id']; ?>">Подробнее &raquo;</a></p>
                    </div>
                <? endforeach; ?>

            </div>

        <? endif; ?>

    </div>
</div>