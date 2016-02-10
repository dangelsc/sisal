<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PermisoSeach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-permiso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tipopermiso') ?>

    <?= $form->field($model, 'fechaini') ?>

    <?= $form->field($model, 'fechafin') ?>

    <?= $form->field($model, 'activo') ?>

    <?php // echo $form->field($model, 'id_funcionario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
