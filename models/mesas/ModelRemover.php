<?php
session_start();
include ('../../config.php');

$qtd_mesas = $_POST['qtd_mesas'];

if ($_POST['instrucao'] == 'remover mesas'){

	try {


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

// PROGAMAR AINDA


}





