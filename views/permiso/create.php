<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblPermiso */

$this->title = 'Create Tbl Permiso';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-permiso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
