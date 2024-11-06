<?php

use app\models\Genre;
use Symfony\Component\VarDumper\VarDumper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Films $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="films-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_genre')->dropDownList(ArrayHelper::map(Genre::find()->all(), 'id', 'name'))->label("Жанр") ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>