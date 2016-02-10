<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblUnidades */

$this->title = 'Update Tbl Unidades: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Unidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-unidades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
