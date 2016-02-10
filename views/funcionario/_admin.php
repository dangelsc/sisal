<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\Pjax ;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FuncionarioSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrador de funcionarios';
$this->params['breadcrumbs'][] = $this->title;
?>





     

            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
          
<?php Pjax::begin() ?>
            <?= GridView::widget([
                'id'=>'aaaa',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'rowOptions' => function ($model, $index, $widget, $grid){
                  return ['style'=>'background-color:'.($model->estado==0?"#f56954":"").';'];
                },
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'item',
                    [
                        'attribute' => 'ci',
                        'value'=>'idFuncionario.ci',
                    ], 
                    [
                        'attribute' => 'nombre',
                        'value'=>'FullName',
                    ],                    
                    
                    'fech_ingreso',
                    //'idUnidad.descrip',
                    //'idUnidad.nombre_cargo',
                    //'idTipoempleado.tipoempleo',


                    // 'antiguedad',
                    // 'estado',
                    // 'jefe_superior',
                    // 'estado_bono',
                    // 'subsidio',
                    // 'id_tipoempleado',
                    // 'controltratamiento',
                    // 'id_profesion',

                     [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {delete}  {link}',
                        'buttons' => [
                                'update' => function ($url,$model) {
                                        return ($model->estado==1?Html::a(
                                                '<span class="glyphicon glyphicon-user"></span>', 
                                                $url):"");
                                },
                                'link' => function ($url,$model,$key) {
                                                return Html::a('saaaa', $url);
                                },
                        ],],  
                ],
            ]); ?>

<?php Pjax::end() ?>
