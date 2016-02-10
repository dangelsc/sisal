<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblUsuario */

$this->title = 'Create Tbl Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-usuario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
