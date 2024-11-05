<?php

use app\models\Reqest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ReqestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Reqests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reqest-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Reqest', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_film',
            'id_user',
            'date_req',
            'id_status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Reqest $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
            'date_req',
            [
                'class' => ActionColumn::className(),
                'template' => '{cancel} {solve}',
                'buttons' => [
                    'cancel' => function ($url, $model) {
                        if ($model->id_status == '1') {
                            return Html::a('Отклонить', ['cancel', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data-method' => 'post', // Для безопасности
                            ]);
                        } else {
                            if ($model->id_status == '2') {
                                return Html::a('Подтверждена');
                            } else {
                                return Html::a('Отклонена');
                            }
                        }
                    },
                    'solve' => function ($url, $model) {
                        if ($model->id_status == '1') {
                            return Html::a('Подтвердить', ['solve', 'id' => $model->id], [
                                'class' => 'btn btn-success',
                                'data-method' => 'post', // Для безопасности
                            ]);
                        }
                    },
                ]
            ],
        ],



    ]); ?>


</div>