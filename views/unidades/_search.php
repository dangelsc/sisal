<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UnidadesSeach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-unidades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_institucion') ?>

    <?= $form->field($model, 'descrip') ?>

    <?= $form->field($model, 'cite') ?>

    <?= $form->field($model, 'padre') ?>

    <?php // echo $form->field($model, 'nombre_cargo') ?>

    <?php // echo $form->field($model, 'categoria') ?>

    <?php // echo $form->field($model, 'haber_basico') ?>

    <?php // echo $form->field($model, 'estado_cargo') ?>

    <?php // echo $form->field($model, 'clasificacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
