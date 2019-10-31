<?php
session_start();
include ('../../config.php');

$qtd_mesas = $_POST['qtd_mesas'];



try {

$limpaTodasAsMesas = mysqli_query($conecta, "DELETE FROM mesas"); 


	for($i = 0; $i<$qtd_mesas; $i++) {

		$cadastrarMesa = mysqli_query($conecta, "INSERT INTO mesas (usuario,cadastro) 
			VALUES (
				'".$_SESSION['id'.$app_token] ."',
				now()
				) ") or die("falha");


	}

	echo "sucesso";

} catch (Exception $e) {


	echo "falha";

}







