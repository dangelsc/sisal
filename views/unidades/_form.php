<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblUnidades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-unidades-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_institucion')->textInput() ?>

    <?= $form->field($model, 'descrip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cite')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'padre')->textInput() ?>

    <?= $form->field($model, 'nombre_cargo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'haber_basico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado_cargo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clasificacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
