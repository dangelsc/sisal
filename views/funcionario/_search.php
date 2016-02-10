<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FuncionarioSeach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-funcionario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_unidad') ?>

    <?= $form->field($model, 'item') ?>

    <?= $form->field($model, 'nit') ?>

    <?= $form->field($model, 'fech_ingreso') ?>

    <?php // echo $form->field($model, 'antiguedad') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'jefe_superior') ?>

    <?php // echo $form->field($model, 'estado_bono') ?>

    <?php // echo $form->field($model, 'subsidio') ?>

    <?php // echo $form->field($model, 'id_tipoempleado') ?>

    <?php // echo $form->field($model, 'controltratamiento') ?>

    <?php // echo $form->field($model, 'id_profesion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
