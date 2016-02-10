<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnidadesSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Unidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-unidades-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Unidades', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_institucion',
            'descrip',
            'cite',
            'padre',
            // 'nombre_cargo',
            // 'categoria',
            // 'haber_basico',
            // 'estado_cargo',
            // 'clasificacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
