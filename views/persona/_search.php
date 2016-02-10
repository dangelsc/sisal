<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tblPersonaSerch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-persona-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ci') ?>

    <?= $form->field($model, 'ci_exp') ?>

    <?= $form->field($model, 'nombres') ?>

    <?= $form->field($model, 'ap_paterno') ?>

    <?php // echo $form->field($model, 'ap_materno') ?>

    <?php // echo $form->field($model, 'fech_naci') ?>

    <?php // echo $form->field($model, 'genero') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
