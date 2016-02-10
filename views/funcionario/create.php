<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblFuncionario */

$this->title = 'Nuevo Funcionario';
$this->params['breadcrumbs'][] = ['label' => 'Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-funcionario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'  => $model,
        'modelp' => $modelp,
        'modelu' => $modelu,
    ]) ?>

</div>
