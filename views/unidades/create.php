<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblUnidades */

$this->title = 'Create Tbl Unidades';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Unidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-unidades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
