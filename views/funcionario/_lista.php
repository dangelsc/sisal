<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FuncionarioSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de funcionarios ';
$this->params['breadcrumbs'][] = $this->title;
?>




	
            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
          

             <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                ]); ?>
      