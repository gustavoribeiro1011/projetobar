<?php
session_start();
include ('../../config.php');



if ($_POST['instrucao'] == 'remover mesas'){


	try {

		$qtd_mesas = $_POST['qtd_mesas'];

		$pegaUltimaMesa = "SELECT num_mesa FROM mesas ORDER BY id DESC LIMIT 1";
		$resultpegaUltimaMesa=mysqli_query($conecta,$pegaUltimaMesa);
		$ultimaMesa=mysqli_fetch_assoc($resultpegaUltimaMesa);

		$ultima_mesa_cadastrada = $ultimaMesa['num_mesa'];
		$total = ($ultima_mesa_cadastrada+1)-$qtd_mesas;


		$removerMesas = mysqli_query($conecta, "DELETE FROM mesas 
			WHERE num_mesa BETWEEN $total AND $ultima_mesa_cadastrada") or die("falha");

		

		echo "sucesso";

	} catch (Exception $e) {


		echo "falha";

	}

} else if ($_POST['instrucao'] =='remover todas as mesas') {


		try {

		$verificaStatusMesas = "SELECT count(id) as total FROM mesas WHERE status='indisponivel'";
		$result=mysqli_query($conecta,$verificaStatusMesas);
	    $row=mysqli_fetch_assoc($result);

	    $total_mesas_indisponivel=$row['total'];

	    if ($total_mesas_indisponivel>0){

	    	echo "possui mesas indisponiveis";

	    } else {

				try {

					$removerTodasAsMesas = mysqli_query($conecta, "DELETE FROM mesas") or die("falha");
 					$removerTodosOsPedidosEmAberto = mysqli_query($conecta, "DELETE FROM pedidos WHERE status = 'pedido aberto'") or die("falha");

					echo "sucesso";


				} catch (Exception $e) {
					
					echo "falha";

					
				}


	    }

	


	} catch (Exception $e) {
		
		echo "falha";

		
	}





}




