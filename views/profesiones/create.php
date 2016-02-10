<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblProfesiones */

$this->title = 'Create Tbl Profesiones';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Profesiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-profesiones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
