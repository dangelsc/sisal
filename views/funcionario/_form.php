<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TblPersona;

use yii\helpers\ArrayHelper;
use app\models\TblProfesiones;
use app\models\TblTipoempleo;
use app\models\TblUnidades;
use yii\helpers\Url;
use yii\web\View;



/* @var $this yii\web\View */
/* @var $model app\models\TblFuncionario */
/* @var $form yii\widgets\ActiveForm */
?>
<div ng-controller="Cfuncionario">
 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?php 
 echo $this->render('../persona/_form', [
                        'model' => $modelp,
                        'form' => $form,
                    ]) ?>
                    
<div class="col-md-5"  >
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" ng-init="profesion=<?php echo (isset($model->id_profesion)?$model->id_profesion:"1");?>">Nueva Funcionario</h3>
            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                
                <div class="tbl-funcionario-form">
                
                   
                    <div class="row">
                    <?php 
                    if($model->isNewRecord){?>
                        <div class="col-md-6"><?= $form->field($model, 'id_unidad')->dropDownList(
                                                                ArrayHelper::map(TblUnidades::find()->all(), 'id', 'descrip')
                                                                ,["class"=>"form-control",'ng-change'=>"onChangeUnidad()","ng-model"=>"unidad"]) ?></div>
                        <div class="col-md-6"><label class="control-label" >Item #:<div data-ng-bind-html='item'></div></label></div>
                      <?php }?>

                    </div>
                    <div class="row">
                        
                        <div class="col-md-6"><?= $form->field($model, 'fech_ingreso')->textInput(["data-inputmask="=>"'alias':'yyyy/mm/dd'"]) ?></div>
                        <div class="col-md-6"><?= $form->field($model, 'estado_bono')->checkbox(['1'=>'Activo']) ?></div>
                    </div>
                    <div class="row">
                        
                        
                    </div>
                    <div class="row">
                        
                        <div class="col-md-6"><?= $form->field($model, 'id_tipoempleado')->dropDownList(
                                                                ArrayHelper::map(TblTipoempleo::find()->all(), 'id', 'tipoempleo')
                                                                ,["class"=>"form-control"]) ?></div>
                        <div class="col-md-6"><?= $form->field($model, 'nit')->Input("number",['maxlength' => true,'min'=>666666]) ?></div>
                    </div>
                    <div class="row">
                        
                        
                    </div>
                   <?php  //$form->field($model, 'id_profesion')->dropDownList(
                             //                                   ArrayHelper::map(TblProfesiones::find()->all(), 'id', 'profesion')
                               //                                 )//->textInput() ?>
                    <div class="input-group input-group-sm">
                        <?= $form->field($model, 'id_profesion')->dropDownList(
                                                                ArrayHelper::map(TblProfesiones::find()->all(), 'id', 'profesion')
                                                                ,["class"=>"form-control",'ng-model'=>'profesion'])//->textInput() ?>
                        
                        <span class="input-group-btn" style="float:right;top:55px;right:0px;position:absolute" >
                          <button type="button"  ui-sref="state1" data-backdrop="static" 
                          data-keyboard="false" data-toggle="modal" data-target="#myModal" 
                          style="position: absolute;bottom: 0px;" class="btn btn-info btn-flat">+</button>
                        </span>
                  </div>
                    <?php 
                    if($model->isNewRecord){
                      echo $this->render('../site/signup', [
                        'model' => $modelu,
                        'form' => $form,
                      ]);
                    }
                    ?>
                    <br>

                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['ng-disabled'=>"activo",'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                    
              
               </div>
            </div>
           
          </div>
</div>



<?php ActiveForm::end(); ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" >Nueva Profesion</h4>
      </div>
      <div class="modal-body" ui-view id="modal_content_profesion" ng-bind-html-unsafe="salida"  >
        
        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" ng-click="save()" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
 <?php 
 
 $script= 
 "$(document).ready(function () {
  ".(isset($model->id_profesion)?"
    $('#tblfuncionario-id_profesion').val(".$model->id_profesion.");":"")."
  ".(isset($model->id_unidad)?"
    $('#tblfuncionario-id_unidad').val(".$model->id_unidad.");":"")."
    $('#tblfuncionario-fech_ingreso').datepicker({format:'yyyy/mm/dd'});
});";
 
 $this->registerJs($script);
 $this->registerJsFile(
    Url::to("@web/js/funcionario/appfuncionario.js"),
    ['depends' => [\yii\web\JqueryAsset::className()]]
  );
  $this->registerJsFile(Url::to("@web/js/angular/angular.min.js"));
  $this->registerJsFile(Url::to("@web/js/angular/angular-ui-router.js"));
  $this->registerJsFile(Url::to("@web/js/angular/angular-sanitize.js")); 
 
  ?>
 </div>