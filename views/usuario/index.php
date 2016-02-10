<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nom_usuario',
            'contrasenia_usuario',
            'estado_usuario',
            'iduser',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
