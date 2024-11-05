<?php

/** @var yii\web\View $this */

use app\models\Role;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Добро пожаловть<?= " " .
                                                    Yii::$app->user->identity->name;
                                                ?></h1>

        <p class="lead">Ваша роль <?= $role_name['name']; ?></p>

        <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">
        <? if (!empty($films)): ?>
            <div class="row">
                <? foreach ($films as $film): ?>
                    <div class="col-lg-4 mb-3">
                        <img src="./images/<?= $film['img']; ?>" alt="">
                        <h2><?= $film['title'] ?></h2>

                        <p><?= $film['descr'] ?></p>
                        <strong>Жанр: <?= $film['id_genre'] ?></strong>

                        <!-- <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p> -->
                    </div>
                <? endforeach; ?>

            </div>

        <? endif; ?>

    </div>
</div>