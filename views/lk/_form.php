<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use app\models\Films;
use yii\models\Reqest;

/** @var yii\web\View $this */
/** @var app\models\Reqest $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reqest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_film')->dropDownList(ArrayHelper::map(Films::find()->all(), 'id', 'title'))->label("Название фильма")
    ?>

    <?= $form->field($model, 'id_user')->textInput(['readonly' => true]) ?>

    <? // $form->field($model, 'date_req')->textInput() 
    ?>

    <? //$form->field($model, 'id_status')->textInput() 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>