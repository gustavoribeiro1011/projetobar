<?php
/**
 *
 *	Model Altera Status Mesa
 *
 */ 
session_start();
include ('../../config.php');

$instrucao = $_POST['instrucao'];
$num_mesa = $_POST['num_mesa'];


if ($instrucao == "disponivel"){

$alteraStatusMesa = "UPDATE mesas SET status='disponivel',modificado=now() WHERE num_mesa=$num_mesa";

if ( $conecta->query($alteraStatusMesa) === TRUE ) {
	echo "sucesso";
} else {
	echo "falha";
}


} else if ($instrucao == "indisponivel"){

$alteraStatusMesa = "UPDATE mesas SET status='indisponivel',modificado=now() WHERE num_mesa=$num_mesa";

if ( $conecta->query($alteraStatusMesa) === TRUE ) {
	echo "sucesso";
} else {
	echo "falha";
}

}


