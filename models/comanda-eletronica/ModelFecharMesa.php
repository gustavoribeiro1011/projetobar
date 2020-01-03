<?php
/**
 *
 *	Model Fechar Mesa
 *  
 */ 
session_start();
include ('../../config.php');

$id_usuario = $_SESSION['id'.$app_token];
$num_mesa = $_POST['num_mesa'];
$data_hora_mesa_aberta = $_POST['data_hora_mesa_aberta'];



$verificaPedidoNaoFinalizado = "SELECT COUNT(num_pedido) count FROM pedidos WHERE status = 'pedido em processamento' AND id_usuario = '$id_usuario' AND mesa=$num_mesa";
$result=mysqli_query($conecta,$verificaPedidoNaoFinalizado);
$row=mysqli_fetch_assoc($result);

	if ($row['count'] == 0) { // se nao tiver pedidos sem finalizar	
		
		
		if ($conecta->query($fecharMesa) === TRUE) {
			
			$alteraStatusMesa = "UPDATE mesas SET status='disponivel',modificado=now() WHERE num_mesa=$num_mesa";
			
			if ( $conecta->query($alteraStatusMesa) === TRUE ) {
				
				$descartaPedido = "DELETE FROM pedidos WHERE num_pedido=".$num_pedido;
				
				if ($conecta->query($descartaPedido) === TRUE) {
					$array= array('msg'=>'sucesso');
					echo json_encode($array);
				} else {
					$array= array('msg'=>'falha');
					echo json_encode($array);
				}
				
			} else {
				$array= array('msg'=>'falha');
				echo json_encode($array);
			}
			
		} else {
			echo "falha";
		}
		

	} else {

		if ( $row['count'] >1 ){
			$counPedidos = $row['count']. " pedidos em produção";
		} else {
			$counPedidos = $row['count']. " pedido em produção";
		}

		$array= array('msg'=>'tem pedido em aberto', 'qtdPedidosEmProducao'=> $counPedidos);
		echo json_encode($array);
	}









