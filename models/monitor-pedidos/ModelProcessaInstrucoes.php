<?php
/**
 *
 *	Model Processa Instruções
 *	
 */ 
session_start();
include ('../../config.php');


$instrucao = $_POST['instrucao'];



if ($instrucao == 'alterar status para concluido') {
	$num_pedido = $_POST['num_pedido'];
	$agora = ('Y-m-d H:i:s');

	$sql = "UPDATE pedidos SET status='concluido', finalizadoem='$agora' WHERE num_pedido=$num_pedido and status='em produção'";

	if ($result=mysqli_query($conecta,$sql)){

		echo 'sucesso';

	} else {

		echo 'falha';

	}

} else if ($instrucao == 'periodoExibicao') {

	$periodoExibicao = 	$_POST['periodoExibicao'];

	if ($periodoExibicao == "todos"){

		$_SESSION['periodoExibicao'.$app_token] = $periodoExibicao;
		echo "sucesso";


	} else if ($periodoExibicao == "hoje"){

		$_SESSION['periodoExibicao'.$app_token] = $periodoExibicao;
		echo "sucesso";

	} else if ($periodoExibicao == "ontem"){

		$_SESSION['periodoExibicao'.$app_token] = $periodoExibicao;
		echo "sucesso";

	} else if ($periodoExibicao == "mes"){

		$_SESSION['periodoExibicao'.$app_token] = $periodoExibicao;
		echo "sucesso";

	} else if ($periodoExibicao == "personalizado"){

		$d1 = 	$_POST['d1'];
		$d2 = 	$_POST['d2'];
		$_SESSION['periodoExibicao'.$app_token] = $periodoExibicao;
		$_SESSION['periodoExibicaod1'.$app_token] = $d1;
		$_SESSION['periodoExibicaod2'.$app_token] = $d2;
		echo "sucesso";

	} else if ($periodoExibicao == "semana"){

		$_SESSION['periodoExibicao'.$app_token] = $periodoExibicao;
		echo "sucesso";

	} 



}