<?php 
use yii\helpers\Url;
/*	
	<div class="col-md-4">
		<div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?=$model->FullName();?></h3>
              <h5 class="widget-user-desc"><?=$model->idUnidad->nombre_cargo;?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="images/face/<?=$model->idFuncionario->dir_foto;?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">3,200</h5>
                    <span class="description-text">SALES</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">13,000</h5>
                    <span class="description-text">FOLLOWERS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">35</h5>
                    <span class="description-text">PRODUCTS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
       </div>

*/?>

	<div class="col-md-4"> 
			<div class="small-box bg-yellow widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                	<img class="img-circle" src="images/face/<?=$model->Foto;?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username" <?php echo (strlen($model->FullName)>18?' style="font-size:12px" ':"");?> ><?=$model->FullName;?></h3>
              <h5 class="widget-user-desc" style="font-size:10px;"><?=$model->UnidadCargo()->nombre_cargo;?></h5>
            </div>
            <a href="<?php echo Url::to(['view', 'id' => $model->id]);?>" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>

    </div>
