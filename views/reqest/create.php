<?php

use Symfony\Component\VarDumper\VarDumper;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Reqest $model */

$this->title = 'Create Reqest';
$this->params['breadcrumbs'][] = ['label' => 'Reqests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="reqest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,

    ]) ?>

</div>