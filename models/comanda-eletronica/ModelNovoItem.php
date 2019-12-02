<?php
/**
 *
 *	Model Novo Item
 *	
 */ 
session_start();
include ('../../config.php');


$instrucao = $_POST['instrucao'];
$num_pedido = $_POST['num_pedido'];

if($instrucao == 'novo item') {

$cadastraNovoItem = "UPDATE pedidos SET param_1='novo item' WHERE num_pedido=$num_pedido and status='pedido aberto'";

if ($result=mysqli_query($conecta,$cadastraNovoItem)){
	echo 'sucesso';
} else {
	echo 'falha';
}

} else if ($instrucao == 'reset param_1') {
//seta a coluna param_1 para vazio

$resetParam_1 = "UPDATE pedidos SET param_1='' WHERE num_pedido=$num_pedido and status='pedido aberto'";

if ($result=mysqli_query($conecta,$resetParam_1)){
	echo 'sucesso';
} else {
	echo 'falha';
}

}