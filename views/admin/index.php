<?php

use app\models\Reqest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ReqestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Панель администратора';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="request-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Заявки на просмотр', ['/reqest'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Управление Фильмами', ['/films'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Управление пользователями', ['/user'], ['class' => 'btn btn-success']) ?>
    </p>

</div>