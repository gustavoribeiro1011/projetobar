<?php
session_start();
include ('../../config.php');

$qtd_mesas = $_POST['qtd_mesas'];


if ($_POST['instrucao'] == 'cadastrar mesa'){

	try {

		$limpaTodasAsMesas = mysqli_query($conecta, "DELETE FROM mesas"); 


		for($i = 1; $i<=$qtd_mesas; $i++) {
			$agora = date('Y-m-d H:i:s');

			$cadastrarMesa = mysqli_query($conecta, "INSERT INTO mesas (num_mesa,statususuario,cadastro) 
				VALUES (
					'$i',
					'disponivel',
					'".$_SESSION['id'.$app_token] ."',
					'$agora'
					) ") or die("falha");


		}

		echo "sucesso";

	} catch (Exception $e) {


		echo "falha";

	}

} else if ($_POST['instrucao'] =='cadastrar mais mesas') {

	try {


		$pegaUltimaMesa = "SELECT num_mesa FROM mesas ORDER BY id DESC LIMIT 1";
		$resultpegaUltimaMesa=mysqli_query($conecta,$pegaUltimaMesa);
		$ultimaMesa=mysqli_fetch_assoc($resultpegaUltimaMesa);
		$ultima_mesa_cadastrada = $ultimaMesa['num_mesa'];

		for($i = $ultima_mesa_cadastrada+1; $i<=($ultima_mesa_cadastrada+$qtd_mesas); $i++) {
$agora = date('Y-m-d H:i:s');

			$cadastrarMesa = mysqli_query($conecta, "INSERT INTO mesas (num_mesa,status,usuario,cadastro) 
				VALUES (
					'$i',
					'disponivel',
					'".$_SESSION['id'.$app_token] ."',
					'$agora'
					) ") or die("falha");


		}
		echo "sucesso";

	} catch (Exception $e) {


		echo "falha";

	}


}





