<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\tblPersonaSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-persona-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(['id' => 'gridData']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ci',
            'ci_exp',
            'nombres',
            'ap_paterno',
            // 'ap_materno',
            // 'fech_naci',
            // 'genero',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end() ?>
<?php

     ?> 
</div>
