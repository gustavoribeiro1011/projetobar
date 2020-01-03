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

		//valida antes  se a mesa possui algum pedido, pois se tiver nao pode executar o $alteraStatusMesa
	$validaSeTemPedidosNaMesa = 
	"
	SELECT 
	ped.num_pedido
	--ped.mesa, ped.status, com.aberto, com.fechado, SUM( ped.preco ) total_pedido
	FROM pedidos ped
	LEFT JOIN comanda_eletronica com ON com.mesa = ped.mesa
	AND NOT com.fechado
	WHERE ped.mesa=$num_mesa
	AND STATUS NOT LIKE '%pedido aberto%'
	GROUP BY ped.num_pedido
	";
	$result=mysqli_query($conecta,$validaSeTemPedidosNaMesa);
	$qtdRegistros = mysqli_num_rows($result);

	if ($qtdRegistros > 0) {

echo "sucesso";
		
	} else {

		$alteraStatusMesa = "UPDATE mesas SET status='disponivel',modificado=now() WHERE num_mesa=$num_mesa";

		if ( $conecta->query($alteraStatusMesa) === TRUE ) {
			echo "sucesso";
		} else {
			echo "falha";
		}

		

	}


} else if ($instrucao == "indisponivel"){

$alteraStatusMesa = "UPDATE mesas SET status='indisponivel',modificado=now() WHERE num_mesa=$num_mesa";

if ( $conecta->query($alteraStatusMesa) === TRUE ) {
	echo "sucesso";
} else {
	echo "falha";
}

}


