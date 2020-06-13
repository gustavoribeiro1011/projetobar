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
$data_hora_mesa_aberto = $_POST['data_hora_mesa_aberto'];



$verificaPedidoNaoFinalizado = "SELECT COUNT(num_pedido) count FROM pedidos WHERE status = 'em produção' AND id_usuario = '$id_usuario' AND mesa=$num_mesa";
$result=mysqli_query($conecta,$verificaPedidoNaoFinalizado);
$row=mysqli_fetch_assoc($result);

	if ($row['count'] == 0) { // se nao tiver pedidos sem finalizar	
		
		
			$agora = date('Y-m-d H:i:s');
	
			$alteraStatusMesa = "UPDATE mesas SET status='disponivel',modificado='$agora' WHERE num_mesa=$num_mesa";
			
			if ( $conecta->query($alteraStatusMesa) === TRUE ) {
				$agora = date('Y-m-d H:i:s');				
				$alteraDataHoraFechado= "
				UPDATE comanda_eletronica SET data_hora_fechado = '$agora' 
				WHERE mesa=".$num_mesa." AND data_hora_aberto = '$data_hora_mesa_aberto'";
				
				if ($conecta->query($alteraDataHoraFechado) === TRUE) {
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

		if ( $row['count'] >1 ){
			$counPedidos = $row['count']. " pedidos em produção";
		} else {
			$counPedidos = $row['count']. " pedido em produção";
		}

		$array= array('msg'=>'tem pedido em aberto', 'qtdPedidosEmProducao'=> $counPedidos);
		echo json_encode($array);
	}









