<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tblTipoempleo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-tipoempleo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipoempleo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
