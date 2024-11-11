<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Films $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="films-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Обложка',
                'attribute' => 'img',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(
                        Yii::getAlias('@web') . '/images/' . $data->img,
                        ['width' => '700px']
                    );
                },
            ],
            'title',
            'descr:ntext',
            [
                'label' => 'Жанр',
                'value' => $model->genre->name,
            ],
        ],
    ]) ?>

    <div>
        <?= Html::button('Добавить в корзину', [
            'class' => 'btn btn-success',
            'onclick' => 'addToCart(' . $model->id . ');', // Здесь вы можете добавить функцию для обработки добавления в корзину
        ]) ?>
    </div>



</div>