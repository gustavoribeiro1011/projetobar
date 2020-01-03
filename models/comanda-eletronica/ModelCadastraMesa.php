<?php
/**
 *
 *	Model Cadastra Mesa
 */ 
session_start();
include ('../../config.php');
$instrucao = $_POST['instrucao'];
$num_pedido = $_POST['num_pedido'];
$num_mesa = $_POST['num_mesa'];


if ($instrucao == 'cadastra mesa'){

	// faz update na primeira linha principal alterando o numero da mesa de "0" para o numero novo.
	$pegaIdPrincipalPedido = "SELECT id,cadastro FROM pedidos WHERE num_pedido = '$num_pedido' AND status = 'pedido aberto' ";
	$result=mysqli_query($conecta,$pegaIdPrincipalPedido);
	$row=mysqli_fetch_assoc($result);
	$idPrincipalPedido = $row['id'];
	$cadastroPedido = $row['cadastro'];

//$cadastraMesa

	$updateMesaNaLinhaPrincipalPedido = "UPDATE pedidos SET mesa=$num_mesa WHERE id=$idPrincipalPedido";


	if ( $conecta->query($updateMesaNaLinhaPrincipalPedido) === TRUE) {
		echo "sucesso";
	} else {
		echo "falha";
	}

} else {


// faz update na primeira linha principal alterando o numero da mesa de "0" para o numero novo.
	$pegaIdPrincipalPedido = "SELECT id,cadastro FROM pedidos WHERE num_pedido = '$num_pedido' AND status = 'pedido aberto' ";
	$result=mysqli_query($conecta,$pegaIdPrincipalPedido);
	$row=mysqli_fetch_assoc($result);
	$idPrincipalPedido = $row['id'];
	$cadastroPedido = $row['cadastro'];

//$cadastraMesa

	$updateMesaNaLinhaPrincipalPedido = "UPDATE pedidos SET mesa=$num_mesa WHERE id=$idPrincipalPedido";


	if ( $conecta->query($updateMesaNaLinhaPrincipalPedido) === TRUE) {
		echo "sucesso";
	} else {
		echo "falha";
	}

    //valida para nao deixar cadastrar duas comandas para mesma mesa
	$validaComandaDuplicidade="SELECT * FROM comanda_eletronica WHERE mesa=$num_mesa AND fechado IS NULL";
	$result=mysqli_query($conecta,$validaComandaDuplicidade);
	$qtdRegistros = mysqli_num_rows($result);

	if ($qtdRegistros > 0) {
		
	}else{
		//abre uma comanda eetronica 
		$abreComandaEletronica = "insert comanda_eletronica (mesa,aberto) values ( $num_mesa, $cadastroPedido )";
		$conecta->query($abreComandaEletronica);
	}

}





