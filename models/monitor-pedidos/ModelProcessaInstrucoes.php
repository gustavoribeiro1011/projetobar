<?php
/**
 *
 *	Model Processa Instruções
 *	
 */ 
session_start();
include ('../../config.php');


$instrucao = $_POST['instrucao'];

$num_pedido = $_POST['num_pedido'];

if ($instrucao == 'alterar status para concluido') {

$sql = "UPDATE pedidos SET status='concluido', finalizadoem=now() WHERE num_pedido=$num_pedido and status='pedido em processamento'";

if ($result=mysqli_query($conecta,$sql)){

	echo 'sucesso';

} else {

	echo 'falha';

}

} 