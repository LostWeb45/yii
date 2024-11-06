<?php

use app\models\Films;
use Symfony\Component\VarDumper\VarDumper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Reqest $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reqest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_film')->dropDownList(ArrayHelper::map(Films::find()->all(), 'id', 'title'))->label("Название фильма")
    ?>

    <?= $form->field($model, 'id_user')->dropDownList(ArrayHelper::map($users, 'id', 'name'))->label('Имя пользователя');
    ?>

    <?= $form->field($model, 'date_req')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>