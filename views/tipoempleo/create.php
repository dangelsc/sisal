<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\tblTipoempleo */

$this->title = 'Create Tbl Tipoempleo';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Tipoempleos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-tipoempleo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
