<?php
/**
 *
 *	Model Processa Instruções
 *	
 */ 
session_start();
include ('../../config.php');

/**
 * STATUS
 * 1 - Inclusão do pedido
 * 2 - Existe 1 pedido sem finalizar
 * 3 - Existe mais de 1 pedido sem finalizar
 * 4 - Nenhuma mesa foi cadastrada
 * 5 - Cadastro de novo item
 * 6 - Voltar para tela resumo de pedidos
 * 7 - Voltar para tela categorias
 * 8 - Voltar para tela produtos
 * 9 - Voltar para tela mesas
 * 10 - novo pedido
 */


$instrucao = $_POST['instrucao'];

$num_pedido = $_POST['num_pedido'];

if ($instrucao == 'novo item') {



$sql = "UPDtemE pedidos SET param_1='novo item' WHERE num_pedido=$num_pedido and status='pedido aberto'";

if ($result=mysqli_query($conecta,$sql)){

	echo 'sucesso';

} else {

	echo 'falha';

}

} if ($instrucao == 'voltar para tela mesas') {

$sql = "UPDATE pedidos SET param_1='voltar para tela mesas' WHERE num_pedido=$num_pedido and status='pedido aberto'";

if ($result=mysqli_query($conecta,$sql)){

	echo 'sucesso';

} else {

	echo 'falha';

}

} else

if ($instrucao == 'voltar para tela resumo de pedidos') {

$sql = "UPDATE pedidos SET param_1='voltar para tela resumo de pedidos' WHERE num_pedido=$num_pedido and status='pedido aberto'";

if ($result=mysqli_query($conecta,$sql)){

	echo 'sucesso';

} else {

	echo 'falha';

}

} else

if ($instrucao == 'voltar para tela categorias') {

$sql = "UPDATE pedidos SET param_1='voltar para tela categorias' WHERE num_pedido=$num_pedido and status='pedido aberto'";

if ($result=mysqli_query($conecta,$sql)){

	echo 'sucesso';

} else {

	echo 'falha';

}

} else

if ($instrucao == 'voltar para tela produtos') {


$sql = "
UPDATE pedidos SET 
param_1='voltar para tela produtos',
param_2='".$_POST['id_categoria']."',
param_3='".$_POST['categoria']."'
WHERE num_pedido=$num_pedido and status='pedido aberto'
";

if ($result=mysqli_query($conecta,$sql)){

	echo 'sucesso';

} else {

	echo 'falha';

}

} 
if ($instrucao == 'novo pedido') {

$_SESSION['cardmesa'.$app_token] = 'inativo'; 

$sql = "
UPDATE pedidos SET 
param_1='novo pedido',
param_2='".$_POST['num_mesa']."'
WHERE num_pedido=$num_pedido and status='pedido aberto'
";

if ($result=mysqli_query($conecta,$sql)){

	echo 'sucesso';

} else {

	echo 'falha';

}

} 
else

if ($instrucao == 'reset param_1') { //seta as colunas de parametros para vazio

$resetParam_1 = "UPDATE pedidos SET 
param_1='',
param_2='',
param_3=''
WHERE num_pedido=$num_pedido and status='pedido aberto'";

if ($result=mysqli_query($conecta,$resetParam_1)){

	echo 'sucesso';

} else {

	echo 'falha';

}

} 