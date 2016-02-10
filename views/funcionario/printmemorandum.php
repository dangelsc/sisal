<style type="text/css">
p{
	font-size: 16px;
	text-align:justify;
}
.pie{
	font-size: 8px;
}
</style>
<?php  
$tr=date_create($model->fech_ingreso);
        ?><h1 style="width:800px;text-align:center;">MEMORANDUM</h1>
<table cellpadding="0" cellspacing="0">
	<tr>
		<td rowspan="2" style="border-bottom:4px solid black;border-right:4px solid black;width:400px;">Potosí, <?php echo date_format($tr,"d")." de ".Generales::$mes[date_format($tr,"m")]." de ". date_format($tr,"Y");?></td>
		<td style="width:400px;  text-align:right;">
			<div style="width:100px; text-align:right;"> Cite. Nº <?php ?></div>
		</td>
	</tr>
	<tr>
		<td style="border-bottom:4px solid black; padding:10px">
			<p>Señor<?php 
			$p=$model->idFuncionario;
			$p->genero==0?"a":""; ?>.-</p>
			<p><?php echo $model->idProfesion->abr." ".$p->nombres." ".$p->ap_paterno." ".$p->ap_materno;?></p>
			<p><?php echo "C.I. ".$p->ci."".$p->ci_exp."." ;?></p>
			<p>Presente.-</p>
		</td>
	</tr>
</table>
<h2>DESIGNACIÓN DE CARGO</h2>
<p>
	Por instrucciones de Presidencia a partir de la fecha se le designa a usted en el cargo de 
	<?php 
	$uni=$model->idUnidad;
	echo $uni->clasificacion."-".$uni->descrip;?> de la 
	<?php print_r(Generales::$institucion["nombre"]);?>, debiendo sus funciones enmarcarse estrictamente en las normas vigentes y bajo directa dependencia de su inmediato superior.
</p>
<p>La cancelacion de sus haberes mensuales se establece de acuerdo a la escala salarial vigente de nuestra institución con el 
<strong>Ítem Nº <?= $model->item;?>, nivel salarial Nº <?=$model->idUnidad->nivelsalarial;?>.<strong></p>
<p>Con este grado motivo y demandando de usted responsabilidad y eficiencia en sus funciones a desempeñar, saludo a usted.</p>
<p>Atentamente.</p>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<p class="pie">C/c Funcionario<br>
Cc/Arch.<br>
Cc/:File personal</p>

