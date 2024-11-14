<?php

/** @var yii\web\View $this */

use app\models\Films;
use app\models\Reqest;
use app\models\Role;
use Symfony\Component\VarDumper\VarDumper;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\PjaxAsset;

// $this->title = 'My Yii Application';

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<style>

</style>




<div class="body-content">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'Обложка',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(
                        Yii::getAlias('@web') . '/images/' . $data->film->img,
                        ['width' => '70px']
                    );
                },
            ],
            [
                'attribute' => 'id_film',
                'filter' => Films::find()->select(['id', 'title'])->indexBy('id')->column(),
                'value' => function ($data) {
                    return $data->film ? $data->film->title : 'Нет данных';
                }
            ],
            [
                'attribute' => 'film.genre.id',
                'value' => 'film.genre.name'
            ],
            [
                'attribute' => 'descr',
                'value' => 'film.descr'
            ],
            'price',
            'date_pok',
            'cenz',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{cancel} {view}',
                'buttons' => [
                    'cancel' => function ($url, $model) {
                        return Html::button('Добавить в корзину', ['onclick' => 'sendBasket(' . $model->id . ')']);
                    },
                    'view' => function ($url, $model) {
                        return Html::a(
                            '<span class="btn-outline-secondary">Подробнее &raquo;</span>',
                            ['films/view', 'id' => $model->id],
                            ['class' => 'btn btn-outline-secondary']
                        );
                    }
                ],
            ],
        ],
    ]);



    ?>

</div>


</div>