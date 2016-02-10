<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\base\Widget;
use yii\jui\Widget;
use yii\jui\InputWidget; 
use yii\jui\DatePicker ;
use yii\helpers\ArrayHelper;
//yii\jui\DatePicker » yii\jui\InputWidget » yii\jui\Widget » yii\base\Widget » yii\base\Component » yii\base\Object
/* @var $this yii\web\View */
/* @var $model app\models\tblPersona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-5">
<div class="box box-primary ">
            <div class="box-header with-border">
              <h3 class="box-title">Datos Personales</h3>
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <div class="tbl-persona-form">
                    <?php if(!isset($form)){?>
                        <?php $form = ActiveForm::begin(); ?>
                        <?php }?>

                        <div class="row">
                            <div class="col-md-6"><?= $form->field($model, 'ci')->Input("number",['max' => 99999999,'min'=>666666,
                                                                        "ng-model"=>"ci_","ng-change"=>"onChangeCI()"]) ?></div>
                            <div class="col-md-6"><?= $form->field($model, 'ci_exp')->dropDownList(
                                                                ArrayHelper::map([["depto"=>"PT"],["depto"=>"LP"],["depto"=>"OR"],["depto"=>"CBBA"]], 'depto', 'depto')
                                                                ,["class"=>"form-control"])  ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><?= $form->field($model, 'nombres')->textInput(['maxlength' => true,'ng-model'=>'nombres']) ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><?= $form->field($model, 'ap_paterno')->textInput(['maxlength' => true,'ng-model'=>'paterno']) ?></div>
                            <div class="col-md-6"><?= $form->field($model, 'ap_materno')->textInput(['maxlength' => true,'ng-model'=>'materno']) ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><?= $form->field($model, 'fech_naci')->textInput(["data-inputmask="=>"'alias':'yyyy/mm/dd'",'ng-model'=>'naci',"data-mask"=>"","class"=>"form-control"]) ?></div>
                            <div class="col-md-6"><?= $form->field($model, 'genero')->radioList(['1'=>'Masculino', '0'=>'Femenino'],['itemOptions'=>['ng-model'=>'genero']]) //textInput(['maxlength' => true]) ?></div>
                        </div>
                        <?php if(isset($model->dir_foto)){?>
                        <div class="row">
                            <div class="col-md-6"><img src="<?php echo Yii::$app->homeUrl."images/face/".$model->dir_foto;?>"></div>
                        </div>
                        <?php }?>
                         <div class="row">
                            <div class="col-md-6">
                                <img  src="{{foto}}">
                            </div>
                        </div>
                        <?= $form->field($model, 'imageFile')->fileInput() ?>
            
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
 <?php 
 $script= <<< JS
$(document).ready(function () {  
    $( "#tblpersona-fech_naci" ).datepicker({format:'yyyy/mm/dd'});  
});
JS;
 $this->registerJs($script);
 ?>
