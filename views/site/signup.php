<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model models\SignupForm */
if(!isset($form)){
  $p_="*";
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); 
        }
            ?>
                 <div class="col-md-6"><?= $form->field($model, 'username') ?></div>
                 <div class="col-md-6"><?= $form->field($model, 'email') ?></div>
                 <?php if($model->isNewRecord){?>

                 <div class="col-md-6"><?= $form->field($model, 'password')->passwordInput() ?></div>
                  <div class="col-md-6"><?= $form->field($model, 'repeatpassword')->passwordInput() ?></div>
                  <?php }?>
                <?php if(isset($p)){?>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
           
        </div>
    </div>
</div>
 <?php }?>
