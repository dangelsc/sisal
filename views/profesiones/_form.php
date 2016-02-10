<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblProfesiones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-profesiones-form">

    <?php $form = ActiveForm::begin(["options"=>["id"=>"formprofesion"]]); ?>

    <?= $form->field($model, 'profesion')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'abr')->textInput(['maxlength' => true]) ?>

    <?php if(!Yii::$app->request->isAjax){?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php }?>
    <?php ActiveForm::end(); ?>

</div>
