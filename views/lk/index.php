<?php

use app\models\Reqest;
use Symfony\Component\VarDumper\VarDumper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ReqestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reqest-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Написать заявление', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            // 'id',
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
        ],
    ]); ?>


</div>