<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblUsuario */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-5" >
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nueva Funcionario</h3>
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<div class="tbl-usuario-form">


    <?php if(!isset($form)){?>
                        <?php $form = ActiveForm::begin(); ?>
                        <?php }?>

    <?= $form->field($model, 'nom_usuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contrasenia_usuario')->passwordInput() ?>
    <?= $form->field($model, 'password_repeat')->passwordInput() ?>
    
    <?php /*<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
*/?>
   <?php if(!isset($form)){?>
                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>

                    
                        <?php ActiveForm::end(); ?> 
                        <?php }?>

</div>
            </div>
        </div>
</div>
