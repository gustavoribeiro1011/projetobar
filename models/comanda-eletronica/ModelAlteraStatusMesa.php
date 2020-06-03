<?php
/**
 *
 *	Model Altera Status Mesa
 *
 */ 
session_start();
include ('../../config.php');

$id_usuario = $_SESSION['id'.$app_token];

$instrucao = $_POST['instrucao'];
$num_mesa = $_POST['num_mesa'];
$num_pedido = $_POST['num_pedido'];
$data_hora_cadastro_pedido = $_POST['data_hora_cadastro_pedido'];
$num_comanda = $_POST['num_comanda'];


if ($instrucao == "disponivel"){

	//valida antes  se a mesa possui algum pedido, pois se tiver nao pode executar o $alteraStatusMesa
	$validaSeTemPedidosNaMesa = 
	"
	SELECT 
	ped.num_pedido
	FROM pedidos ped	
	WHERE 
	ped.mesa=$num_mesa
	AND STATUS NOT LIKE '%pedido aberto%'	
	";
	$result=mysqli_query($conecta,$validaSeTemPedidosNaMesa);
	$qtdRegistros = mysqli_num_rows($result);

	if ($qtdRegistros > 0) {

		echo "sucesso";
		
	} else {

		$alteraStatusMesa = "UPDATE mesas SET status='disponivel',usuario=0,modificado=now() WHERE num_mesa=$num_mesa";

		if ( $conecta->query($alteraStatusMesa) === TRUE ) {
			

			$excluiComanda = "DELETE FROM comanda_eletronica WHERE num_comanda =$num_comanda";

			if ( $conecta->query($excluiComanda) === TRUE ) {

				echo "sucesso";
			}

			
		} else {
			echo "falha";
		}

		

	}


} else if ($instrucao == "indisponivel"){

	$alteraStatusMesa = "UPDATE mesas SET status='indisponivel',usuario=$id_usuario,modificado=now() WHERE num_mesa=$num_mesa";

	if ( $conecta->query($alteraStatusMesa) === TRUE ) {


		$cadastraComanda = "INSERT INTO comanda_eletronica (mesa,data_hora_aberto,usuario) VALUES ( $num_mesa,'$data_hora_cadastro_pedido','".$_SESSION['id'.$app_token]."' )";
		if ( $conecta->query($cadastraComanda) === TRUE ) {
			$id_num_comanda = $conecta->insert_id;

			$cadastraIdComandaNaTbPedidos = "UPDATE pedidos SET num_comanda=$id_num_comanda WHERE num_pedido=$num_pedido";
			if ( $conecta->query($cadastraIdComandaNaTbPedidos) === TRUE ) {
				echo "sucesso";	
			}

		}

	} else {
		echo "falha";
	}

}


