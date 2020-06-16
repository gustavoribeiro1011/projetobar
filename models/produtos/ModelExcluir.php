<?php
/**
 *
 *	Model Excluir Produto
 *
 */ 
session_start();

include ('../../config.php');

$instrucao = $_POST['instrucao']; // pega a instrucao passada via post

if ( $instrucao == 'remover produto' ){ // se caso nao vier nenhuma instrução 

$idproduto = $_POST['idproduto']; // pega o valor enviado via post

$excluirProduto = "DELETE FROM produtos WHERE id='".$idproduto."'"; // sql que executa a exclusao do produto 

$conecta->query($excluirPreco);

		if ($conecta->query($excluirProduto) === TRUE) {

			echo "sucesso";

		} else {

			echo "falha";
		}

}