<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblProfesiones */

$this->title = 'Update Tbl Profesiones: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Profesiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-profesiones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
