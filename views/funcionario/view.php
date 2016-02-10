<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TblFuncionario */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-funcionario-view">

 <div class="col-md-2">
         <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Opciones</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
            <?= Html::a('Memorandum', ['printmemorandum', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
              <ul class="nav nav-pills nav-stacked">
              </ul>
            </div>
        </div>
    </div>

    

    
<div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detalles - <?= Html::encode($this->title) ?></h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" ui-view >
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label'=>'Foto',
                'format' => 'html',
                'value'=>('<img src =' .Yii::$app->homeUrl.'../images/face/' . $model->idFuncionario->dir_foto . ' height="100" width="100"' .   '>')
            ],
            'item',
            'idUnidad.descrip',
            'idUnidad.nombre_cargo',
            'idFuncionario.ci',
            'idProfesion.profesion',
            'FullName',
            'idTipoempleado.tipoempleo',
            'fech_ingreso',
        ],
    ]) ?>
        </div>
    </div>
</div>

</div>
