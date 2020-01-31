<?php


include('../../models/monitor-pedidos/ModelPeriodoExibicao.php');

$sessionPeriodoExibicao = isset($_SESSION['periodoExibicao'.$app_token] ) ? 'S' : 'N'; 

if ($sessionPeriodoExibicao == 'S'){

	if($_SESSION['periodoExibicao'.$app_token] == 'personalizado'){
			
		$dt1 =  date("d/m/Y", strtotime($_SESSION['periodoExibicaod1'.$app_token]));
		$dt2 = date("d/m/Y", strtotime($_SESSION['periodoExibicaod2'.$app_token]));
	
	    $txtPeriodo =  ucfirst($_SESSION['periodoExibicao'.$app_token]) . ": ".$dt1." a ".$dt2;
		

	} else{
	$txtPeriodo =  ucfirst($_SESSION['periodoExibicao'.$app_token]);}



}else{$txtPeriodo="Todos";}

?>

<p>
	Período exibido: 
	<a class="btn btn-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
		<?=$txtPeriodo;?>
	</a>

</p>
<div class="collapse" id="collapseExample">
	<div class="card card-body">


		<form class="form-inline">
			<div class="form-group">
				<a href="javascript:void(0)" class="periodoExibicao" periodoExibicao="todos">Exibir todos</a>
			</div>	
		</form>

		<form class="form-inline">
			<div class="form-group">
				<a href="javascript:void(0)" class="periodoExibicao" periodoExibicao="hoje">Hoje</a>		
			</div>	
		</form>

		<form class="form-inline">
			<div class="form-group">
				<a href="javascript:void(0)" class="periodoExibicao" periodoExibicao="ontem">Ontem</a>		
			</div>	
		</form>


		<form class="form-inline">
			<div class="form-group">
				<a href="javascript:void(0)" class="periodoExibicao" periodoExibicao="semana">Essa semana</a>	
			</div>
		</form>


		<form class="form-inline">
			<div class="form-group">
				<a href="javascript:void(0)" class="periodoExibicao" periodoExibicao="mes">Esse mês</a>	
			</div>	
		</form>

		<form class="form-inline" id="formPeriodoExibicao" method="get" action="#">
			
			<div class="input-group mb-3">
				<label style="margin-right: 5px;">Personalizado</label>
			</div>	


			<div class="input-group mb-3">
				<input type="date" id="d1" class="form-control" style="margin-right: 5px;" required width="10px"> 
			</div>

			a 
			<div class="input-group mb-3">
				<input type="date" id="d2"class="form-control" style="margin-left: 5px;margin-right: 5px;" required>
			</div>		

			<div class="input-group mb-3">
				<button type="submit" class="btn btn-primary ">Confirmar</button>
			</div>	
		</form>

		


	</div>
</div>



<?php 


$sqlAberto = "SELECT count(id) as total_aberto FROM pedidos WHERE status = 'em produção' $periodoExibicao;
";

$resultAberto=mysqli_query($conecta,$sqlAberto);

$rowAberto=mysqli_fetch_assoc($resultAberto); ?>

<?php 
$sqlConcluido = "SELECT count(id) as total_concluido FROM pedidos WHERE status = 'concluido' $periodoExibicao;
";

$resultConcluido=mysqli_query($conecta,$sqlConcluido);

$rowConcluido=mysqli_fetch_assoc($resultConcluido);

if ($app_page_status=="pedidos em aberto"){$activeAberto="active";$activeConcluido="";} else
if ($app_page_status=="pedidos concluidos"){$activeAberto="";$activeConcluido="active";} 

if ($rowAberto['total_aberto'] > 0){
	$contAberto= '<span class="badge badge-warning">'. $rowAberto['total_aberto'] . '</span>';
} else {$contAberto="";}

if ($rowConcluido['total_concluido'] > 0){
	$contConcluido= '<span class="badge badge-success">'. $rowConcluido['total_concluido'] . '</span>';
} else {$contConcluido="";}

?>

<ul class="nav nav-tabs">
	<li class="nav-item">
		<a class="nav-link <?=$activeAberto;?>" href="<?=BASEURL;?>views/monitor-pedidos/aberto.php">Em aberto <?=$contAberto;?></a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?=$activeConcluido;?>" href="<?=BASEURL;?>views/monitor-pedidos/finalizado.php">Finalizados  <?=$contConcluido;?></a>
	</li>
</ul>


<br>