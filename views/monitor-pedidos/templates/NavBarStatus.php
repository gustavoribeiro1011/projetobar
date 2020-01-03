<?php 
$sqlAberto = "SELECT count(id) as total_aberto FROM pedidos WHERE status = 'pedido em processamento'";

$resultAberto=mysqli_query($conecta,$sqlAberto);

$rowAberto=mysqli_fetch_assoc($resultAberto); ?>

<?php 
$sqlConcluido = "SELECT count(id) as total_concluido FROM pedidos WHERE status = 'concluido'";

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
		<a class="nav-link <?=$activeAberto;?>" href="<?=BASEURL;?>views/monitor-pedidos/index.php">Em aberto <?=$contAberto;?></a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?=$activeConcluido;?>" href="<?=BASEURL;?>views/monitor-pedidos/finalizados.php">Finalizados  <?=$contConcluido;?></a>
	</li>
</ul>
<br>