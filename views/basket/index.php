<?php

use app\models\Basket;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BasketSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Baskets';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="basket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Create Basket', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    <? ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'Имя пользователя',
                'value' => 'user.name',
            ],
            [
                'attribute' => 'Название фильма',
                'value' => 'session.film.title',
            ],
            // 'id_session',
            [
                'attribute' => 'Колличество билетов',
                'value' => 'count',
            ],
            [
                'attribute' => 'Стоимость',
                'value' => 'session.price'
            ],

            [
                'header' => 'Управление количеством', // Заголовок для новой колонки
                'class' => 'yii\grid\DataColumn', // Тип колонки
                'format' => 'raw', // Позволяет использовать HTML
                'value' => function ($model) {
                    return Html::a('+', ['increase-quantity', 'id' => $model->id], [
                        'class' => 'btn btn-outline-success',
                        'data-method' => 'post',
                    ]) . ' ' .
                        Html::a('-', ['decrease-quantity', 'id' => $model->id], [
                            'class' => 'btn btn-outline-danger',
                            'data-method' => 'post',
                        ]);
                },
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{delete}',
                'urlCreator' => function ($action, Basket $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>



</div>