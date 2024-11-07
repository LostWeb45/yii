<?php

/** @var yii\web\View $this */

use app\models\Role;


// $this->title = 'My Yii Application';

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<style>

</style>

<div class="body-content">
    <?php if (!empty($films)): ?>
        <h2>Новые сеансы</h2>
        <div id="filmsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $isActive = true;
                foreach (array_chunk($films, 3) as $chunk):  // Разделяем на группы по 3 фильма
                    $activeClass = $isActive ? ' active' : '';
                    $isActive = false;
                ?>
                    <div class="carousel-item<?= $activeClass ?>">
                        <div class="row justify-content-center">
                            <?php foreach ($chunk as $index => $film): ?>
                                <div class="col-lg-4 mb-3 carousel-item-film <?= $index === 1 ? 'center' : '' ?>">
                                    <div class="card">
                                        <img src="./images/<?= $film['img']; ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $film['title'] ?></h5>
                                            <p class="card-text"><?= $film['descr'] ?></p>
                                            <p><strong>Жанр: <?= $film['genre_name'] ?></strong></p>
                                            <a href="/web/films/view?id=<?= $film['id']; ?>" class="btn btn-primary">Подробнее &raquo;</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Контролы карусели -->
            <button class="carousel-control-prev" type="button" data-bs-target="#filmsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#filmsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
            </button>
        </div>
    <?php endif; ?>
</div>
<div class="body-content">
    <h2>О нас</h2>
    <div class="about-content">
        <p>
            Добро пожаловать в <strong>KinoProEvreev</strong> — лучший онлайн-кинотеатр для просмотра фильмов и сериалов без ограничений! Мы предлагаем огромную коллекцию кинофильмов и сериалов разных жанров, включая экшн, драму, комедию, ужасы и многое другое. В <strong>KinoProEvreev</strong> каждый найдет что-то для себя.
        </p>

        <div class="features">
            <h3>Наши особенности:</h3>
            <ul>
                <li><strong>Безопасность и конфиденциальность:</strong> Мы заботимся о вашей безопасности и конфиденциальности. Все транзакции защищены, а ваши личные данные находятся в безопасности.</li>
                <li><strong>Высокое качество видео:</strong> У нас вы найдете фильмы в самых популярных форматах, включая 4K и HDR, а также потоковое воспроизведение в высоком качестве.</li>
                <li><strong>Широкий выбор:</strong> Доступ к тысячам фильмов, сериалов, мультфильмов и эксклюзивных шоу, которые обновляются каждый месяц.</li>
                <li><strong>Удобный интерфейс:</strong> Легкий в использовании интерфейс с возможностью персонализировать вашу страницу и рекомендации на основе ваших предпочтений.</li>
                <li><strong>Поддержка всех устройств:</strong> Мы предлагаем поддержку для ПК, мобильных устройств, планшетов, смарт-ТВ и игровых консолей.</li>
            </ul>
        </div>

        <div class="subscription">
            <h3>Подписка на KinoProEvreev:</h3>
            <p>Подписавшись на <strong>KinoProEvreev</strong>, вы получаете неограниченный доступ ко всем фильмам и сериалам. С нашими гибкими тарифами вы можете выбрать подходящий для себя план, который даст вам возможность смотреть любимые фильмы в любое время и в любом месте.</p>
            <p>Наслаждайтесь просмотром без рекламы и без ограничений — только качественное кино!</p>
        </div>
    </div>
</div>



<div class="body-content">
    <h2>Все сеансы</h2>

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