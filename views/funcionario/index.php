<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FuncionarioSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Funcionarios';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row" ng-controller="Cindex">
    <div class="col-md-2">
        <p>
                <?= Html::a('Nuevo Funcionario', ['create'], ['class' => 'btn btn-primary btn-block margin-bottom']) ?>
        </p>
        <p>
            <?= Html::a('<i class="fa fa-inbox"> </i> Administrado', ['admin'], ['class' => 'btn btn-primary btn-block margin-bottom']) ?>
        </p>
        <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Opciones</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li >
                <?= Html::a('<i class="fa fa-inbox"> </i> Administrado <span class="label label-primary pull-right">12</span>', ['admin'], ['ui-sref'=>"state10"]) ?>
                    </li>
                
                <li class="active"><?= Html::a('<i class="fa fa-inbox"> </i> Lista <span class="label label-primary pull-right">12</span>', ['/funcionario'], ["ui-sref"=>"state11({search2: ''})"]) ?></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input id="buscar" ng-change="onChangeBuscar()" ng-model="search"  type="text"class="form-control input-sm" placeholder="Buscar funcionario">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" ui-view >


            <?php 

            echo $this->render("_admin",["searchModel"=>$searchModel,"dataProvider"=>$dataProvider]);?>
            

       
            </div>
        </div>




    </div>
</div>
<?php 

  $this->registerJs(
        '$("#buscar").change(function(){
            try{
                $("input[name*=\'nombre\']").val($(this).val());
                $("#aaaa").yiiGridView("applyFilter");
            }
            catch(e)
            {
                
            }
        });'

    );
  $this->registerJsFile(
    Url::to("@web/js/funcionario/appfuncionario.js"),
    ['depends' => [\yii\web\JqueryAsset::className()]]
  );
  $this->registerJsFile(Url::to("@web/js/angular/angular.min.js"));
  $this->registerJsFile(Url::to("@web/js/angular/angular-ui-router.js"));
  $this->registerJsFile(Url::to("@web/js/angular/angular-sanitize.js"));
  ?>
