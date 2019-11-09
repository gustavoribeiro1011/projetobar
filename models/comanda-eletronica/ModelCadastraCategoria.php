<?php
/**
 *
 *	Model Cadastra Categoria
 *
 */ 
session_start();
include ('../../config.php');

$num_pedido = $_POST['num_pedido'];
$id_categoria= $_POST['id_categoria'];
$categoria= $_POST['categoria'];

$cadastraMesa = "INSERT INTO pedidos (num_pedido,origem,id_categoria,categoria,status,id_usuario,usuario,cadastro)
VALUES (
'".$num_pedido."',
'comanda eletronica',
'".$id_categoria."',
'".$categoria."',
'item cadastrado',
'". $_SESSION['id'.$app_token] ."',
'".$_SESSION['login_nome'.$app_token]." ".$_SESSION['sobrenome'.$app_token]."',
now()
) "; 

		if ($conecta->query($cadastraMesa) === TRUE) {
			echo "sucesso";
		} else {
			echo "falha";
		}




