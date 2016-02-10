<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tblPersona */

$this->title = 'Update Tbl Persona: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-persona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
