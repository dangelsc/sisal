<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblFuncionario */

$this->title = 'Update Tbl Funcionario: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-funcionario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelp' => $modelp,
    ]) ?>

</div>
